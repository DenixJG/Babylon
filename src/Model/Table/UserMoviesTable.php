<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserMovies Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\MoviesTable&\Cake\ORM\Association\BelongsTo $Movies
 * @property \App\Model\Table\UserMovieStatusesTable&\Cake\ORM\Association\BelongsTo $UserMovieStatuses
 *
 * @method \App\Model\Entity\UserMovie newEmptyEntity()
 * @method \App\Model\Entity\UserMovie newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\UserMovie[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserMovie get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserMovie findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\UserMovie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserMovie[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserMovie|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserMovie saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserMovie[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserMovie[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserMovie[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserMovie[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UserMoviesTable extends Table
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

        $this->setTable('user_movies');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Movies', [
            'foreignKey' => 'movie_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('UserMovieStatuses', [
            'foreignKey' => 'user_movie_status_id',
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
            ->integer('movie_id')
            ->notEmptyString('movie_id');

        $validator
            ->integer('user_movie_status_id')
            ->notEmptyString('user_movie_status_id');

        $validator
            ->allowEmptyString('rated');

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
        $rules->add($rules->existsIn('movie_id', 'Movies'), ['errorField' => 'movie_id']);
        $rules->add($rules->existsIn('user_movie_status_id', 'UserMovieStatuses'), ['errorField' => 'user_movie_status_id']);

        return $rules;
    }
}
