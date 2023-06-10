<?php

declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\User;
use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Event\EventInterface;
use Cake\Log\Log;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Ramsey\Uuid\Rfc4122\UuidV4;
use Ramsey\Uuid\Uuid;

/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable&\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\EpisodeNotesTable&\Cake\ORM\Association\HasMany $EpisodeNotes
 * @property \App\Model\Table\EpisodeUserStatusesTable&\Cake\ORM\Association\HasMany $EpisodeUserStatuses
 * @property \App\Model\Table\LastWatchedEpisodesTable&\Cake\ORM\Association\HasMany $LastWatchedEpisodes
 * @property \App\Model\Table\NotesTable&\Cake\ORM\Association\HasMany $Notes
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('EpisodeNotes', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('EpisodeUserStatuses', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('LastWatchedEpisodes', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Notes', [
            'foreignKey' => 'user_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('username')
            ->maxLength('username', 50)
            ->requirePresence('username', 'create')
            ->notEmptyString('username')
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->integer('role_id')
            ->notEmptyString('role_id');

        $validator
            ->boolean('active')
            ->allowEmptyString('active');

        $validator
            ->scalar('hash')
            ->maxLength('hash', 255)
            ->allowEmptyString('hash');

        return $validator;
    }

    public function beforeSave(EventInterface $event, User $entity, ArrayObject $options)
    {
        if ($entity->isDirty('email')) {
            $entity->hash = Uuid::uuid5(env('APP_UUID_NAMESPACE'), $entity->email)->toString();
        }
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['username']), ['errorField' => 'username']);
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->existsIn('role_id', 'Roles'), ['errorField' => 'role_id']);

        return $rules;
    }
    
    /**
     * Get user by id with optional contain associations
     *
     * @param int $id User id
     * @param array $contain Associations
     * @return User|null User entity or null if not found
     */
    public function getById(int $id, array $contain = []): ?User
    {
        return $this->find()
            ->contain($contain)
            ->where(['Users.id' => $id])
            ->first();            
    }    

    public function findForList(Query $query, array $options)
    {
        $query->select($this)->enableAutoFields(true);

        // Set query conditions
        if (!empty($options['conditions'])) {
            $query->where($options['conditions']);
        }

        // Set query associations
        if (!empty($options['contain'])) {
            $query->contain($options['contain']);
        }

        // Set query order
        if (!empty($options['order'])) {
            $query->order($options['order']);
        }

        // Group by Users.id
        $query->group('Users.id');

        return $query;
    }
}