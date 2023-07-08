<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Shows Model
 *
 * @property \App\Model\Table\ShowStatusesTable&\Cake\ORM\Association\BelongsTo $ShowStatuses
 * @property \App\Model\Table\SeasonsTable&\Cake\ORM\Association\HasMany $Seasons
 * @property \App\Model\Table\ShowDirectorsTable&\Cake\ORM\Association\HasMany $ShowDirectors
 * @property \App\Model\Table\ShowGenresTable&\Cake\ORM\Association\HasMany $ShowGenres
 *
 * @method \App\Model\Entity\Show newEmptyEntity()
 * @method \App\Model\Entity\Show newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Show[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Show get($primaryKey, $options = [])
 * @method \App\Model\Entity\Show findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Show patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Show[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Show|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Show saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Show[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Show[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Show[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Show[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ShowsTable extends Table
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

        $this->setTable('shows');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('ShowStatuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Seasons', [
            'foreignKey' => 'show_id',
        ]);
        $this->hasMany('ShowDirectors', [
            'foreignKey' => 'show_id',
        ]);

        $this->hasMany('ShowGenres', [
            'foreignKey' => 'show_id',
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
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

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
        $rules->add($rules->existsIn('status_id', 'ShowStatuses'), ['errorField' => 'status_id']);

        return $rules;
    }
}
