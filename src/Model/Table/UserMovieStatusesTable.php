<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserMovieStatuses Model
 *
 * @property \App\Model\Table\UserMoviesTable&\Cake\ORM\Association\HasMany $UserMovies
 *
 * @method \App\Model\Entity\UserMovieStatus newEmptyEntity()
 * @method \App\Model\Entity\UserMovieStatus newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\UserMovieStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserMovieStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserMovieStatus findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\UserMovieStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserMovieStatus[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserMovieStatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserMovieStatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserMovieStatus[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserMovieStatus[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserMovieStatus[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserMovieStatus[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UserMovieStatusesTable extends Table
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

        $this->setTable('user_movie_statuses');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('UserMovies', [
            'foreignKey' => 'user_movie_status_id',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
