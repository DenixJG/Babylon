<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EpisodeUserStatuses Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\EpisodesTable&\Cake\ORM\Association\BelongsTo $Episodes
 * @property \App\Model\Table\EpisodeStatusesTable&\Cake\ORM\Association\BelongsTo $EpisodeStatuses
 *
 * @method \App\Model\Entity\EpisodeUserStatus newEmptyEntity()
 * @method \App\Model\Entity\EpisodeUserStatus newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\EpisodeUserStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EpisodeUserStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\EpisodeUserStatus findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\EpisodeUserStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EpisodeUserStatus[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EpisodeUserStatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EpisodeUserStatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EpisodeUserStatus[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EpisodeUserStatus[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\EpisodeUserStatus[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EpisodeUserStatus[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EpisodeUserStatusesTable extends Table
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

        $this->setTable('episode_user_statuses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Episodes', [
            'foreignKey' => 'episode_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('EpisodeStatuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER',
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
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('episode_id')
            ->notEmptyString('episode_id');

        $validator
            ->integer('status_id')
            ->notEmptyString('status_id');

        return $validator;
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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('episode_id', 'Episodes'), ['errorField' => 'episode_id']);
        $rules->add($rules->existsIn('status_id', 'EpisodeStatuses'), ['errorField' => 'status_id']);

        return $rules;
    }
}
