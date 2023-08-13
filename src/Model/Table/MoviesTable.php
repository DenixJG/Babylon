<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\I18n\FrozenDate;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Movies Model
 *
 * @property \App\Model\Table\MovieStatusesTable&\Cake\ORM\Association\BelongsTo $MovieStatuses
 * @property \App\Model\Table\MovieDirectorsTable&\Cake\ORM\Association\HasMany $MovieDirectors
 * @property \App\Model\Table\MovieGenresTable&\Cake\ORM\Association\HasMany $MovieGenres
 * @property \App\Model\Table\UserMoviesTable&\Cake\ORM\Association\HasMany $UserMovies
 *
 * @method \App\Model\Entity\Movie newEmptyEntity()
 * @method \App\Model\Entity\Movie newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Movie[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Movie get($primaryKey, $options = [])
 * @method \App\Model\Entity\Movie findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Movie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Movie[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Movie|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Movie saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Movie[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Movie[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Movie[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Movie[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MoviesTable extends Table
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

        $this->setTable('movies');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MovieStatuses', [
            'foreignKey' => 'status_id',
            'joinType'   => 'INNER',
        ]);
        $this->hasMany('MovieDirectors', [
            'foreignKey' => 'movie_id',
        ]);
        $this->hasMany('MovieGenres', [
            'foreignKey' => 'movie_id',
        ]);
        $this->hasMany('UserMovies', [
            'foreignKey' => 'movie_id',
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
            ->integer('tmdb_id')
            ->allowEmptyString('tmdb_id');

        $validator
            ->integer('status_id')
            ->notEmptyString('status_id');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('original_title')
            ->maxLength('original_title', 255)
            ->allowEmptyString('original_title');

        $validator
            ->date('release_date')
            ->requirePresence('release_date', 'create')
            ->notEmptyDate('release_date');

        $validator
            ->scalar('overview')
            ->allowEmptyString('overview');

        $validator
            ->boolean('is_deleted')
            ->allowEmptyString('is_deleted');

        $validator
            ->dateTime('deleted_date')
            ->allowEmptyDateTime('deleted_date');

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
        $rules->add($rules->existsIn('status_id', 'MovieStatuses'), ['errorField' => 'status_id']);

        return $rules;
    }

    /**
     * Get a movie by id with associations if needed
     *
     * @param int $id Movie id
     * @param array|null $contain Associations to include
     * 
     * @return \App\Model\Entity\Movie|null
     */
    public function getById(int $id, array $contain = null)
    {
        $query = $this->find()
            ->where(['Movies.id' => $id]);

        if ($contain) {
            $query->contain($contain);
        }

        return $query->first();
    }

    /**
     * Get a movie by tmdb id with associations if needed
     *     
     * Is posible to find a movie by id and not by tmdb id because
     * the id is the primary key and the tmdb id is set when the movie
     * is added to the database from the tmdb api client.
     *
     * @param integer $tmdbId Tmdb id
     * @param array|null $contain Associations to include
     * 
     * @return \App\Model\Entity\Movie|null
     */
    public function getByTmdbId(int $tmdbId, array $contain = null)
    {
        $query = $this->find()
            ->where(['Movies.tmdb_id' => $tmdbId]);

        if ($contain) {
            $query->contain($contain);
        }

        return $query->first();
    }

    /**
     * Parse remote data to local entity data
     *
     * @param array $remote_data Remote data array
     * @return \App\Model\Entity\Movie|null
     */
    public function parseDataToEntity(array $remote_data)
    {
        $movie = $this->newEmptyEntity();

        if (empty($remote_data['title']) && empty($remote_data['original_title'])) {
            return null;
        }

        $movie->tmdb_id        = $remote_data['id'];
        $movie->title          = $remote_data['title'];
        $movie->original_title = $remote_data['original_title'] ?? null;
        $movie->overview       = $remote_data['overview'] ?? null;

        try {
            $movie->release_date = FrozenDate::parse($remote_data['release_date']);
        } catch (\Exception $e) {
            \Cake\Log\Log::error(print_r('Error parsing date: ' . $remote_data['release_date'], true));
        }

        $movie_status     = $this->MovieStatuses->getDynamicStatus($remote_data['release_date']);
        $movie->status_id = $movie_status->id;

        return $movie;
    }
}