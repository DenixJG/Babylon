<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShowGenres Model
 *
 * @property \App\Model\Table\GenresTable&\Cake\ORM\Association\BelongsTo $Genres
 * @property \App\Model\Table\ShowsTable&\Cake\ORM\Association\BelongsTo $Shows
 *
 * @method \App\Model\Entity\ShowGenre newEmptyEntity()
 * @method \App\Model\Entity\ShowGenre newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ShowGenre[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ShowGenre get($primaryKey, $options = [])
 * @method \App\Model\Entity\ShowGenre findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ShowGenre patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ShowGenre[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ShowGenre|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShowGenre saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShowGenre[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ShowGenre[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ShowGenre[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ShowGenre[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ShowGenresTable extends Table
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

        $this->setTable('show_genres');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Genres', [
            'foreignKey' => 'genre_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Shows', [
            'foreignKey' => 'show_id',
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
            ->integer('genre_id')
            ->notEmptyString('genre_id');

        $validator
            ->integer('show_id')
            ->notEmptyString('show_id');

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
        $rules->add($rules->existsIn('genre_id', 'Genres'), ['errorField' => 'genre_id']);
        $rules->add($rules->existsIn('show_id', 'Shows'), ['errorField' => 'show_id']);

        return $rules;
    }
}
