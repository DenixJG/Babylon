<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShowDirectors Model
 *
 * @property \App\Model\Table\ShowsTable&\Cake\ORM\Association\BelongsTo $Shows
 * @property \App\Model\Table\DirectorsTable&\Cake\ORM\Association\BelongsTo $Directors
 *
 * @method \App\Model\Entity\ShowDirector newEmptyEntity()
 * @method \App\Model\Entity\ShowDirector newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ShowDirector[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ShowDirector get($primaryKey, $options = [])
 * @method \App\Model\Entity\ShowDirector findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ShowDirector patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ShowDirector[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ShowDirector|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShowDirector saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShowDirector[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ShowDirector[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ShowDirector[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ShowDirector[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ShowDirectorsTable extends Table
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

        $this->setTable('show_directors');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Shows', [
            'foreignKey' => 'show_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Directors', [
            'foreignKey' => 'director_id',
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
            ->integer('show_id')
            ->notEmptyString('show_id');

        $validator
            ->integer('director_id')
            ->notEmptyString('director_id');

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
        $rules->add($rules->existsIn('show_id', 'Shows'), ['errorField' => 'show_id']);
        $rules->add($rules->existsIn('director_id', 'Directors'), ['errorField' => 'director_id']);

        return $rules;
    }
}
