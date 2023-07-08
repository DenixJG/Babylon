<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MovieGenres Model
 *
 * @property \App\Model\Table\GenresTable&\Cake\ORM\Association\BelongsTo $Genres
 * @property \App\Model\Table\MoviesTable&\Cake\ORM\Association\BelongsTo $Movies
 *
 * @method \App\Model\Entity\MovieGenre newEmptyEntity()
 * @method \App\Model\Entity\MovieGenre newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MovieGenre[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MovieGenre get($primaryKey, $options = [])
 * @method \App\Model\Entity\MovieGenre findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MovieGenre patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MovieGenre[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MovieGenre|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MovieGenre saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MovieGenre[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MovieGenre[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MovieGenre[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MovieGenre[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MovieGenresTable extends Table
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

        $this->setTable('movie_genres');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Genres', [
            'foreignKey' => 'genre_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Movies', [
            'foreignKey' => 'movie_id',
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
            ->integer('movie_id')
            ->notEmptyString('movie_id');

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
        $rules->add($rules->existsIn('movie_id', 'Movies'), ['errorField' => 'movie_id']);

        return $rules;
    }
}
