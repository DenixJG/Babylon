<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\I18n\FrozenDate;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Seasons Model
 *
 * @property \App\Model\Table\ShowsTable&\Cake\ORM\Association\BelongsTo $Shows
 * @property \App\Model\Table\EpisodesTable&\Cake\ORM\Association\HasMany $Episodes
 *
 * @method \App\Model\Entity\Season newEmptyEntity()
 * @method \App\Model\Entity\Season newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Season[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Season get($primaryKey, $options = [])
 * @method \App\Model\Entity\Season findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Season patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Season[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Season|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Season saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Season[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Season[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Season[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Season[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SeasonsTable extends Table
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

        $this->setTable('seasons');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Shows', [
            'foreignKey' => 'show_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Episodes', [
            'foreignKey' => 'season_id',
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
            ->integer('tmdb_id')
            ->allowEmptyString('tmdb_id');

        $validator
            ->integer('number')
            ->requirePresence('number', 'create')
            ->notEmptyString('number');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('episode_count')
            ->allowEmptyString('episode_count');

        $validator
            ->scalar('overview')
            ->allowEmptyString('overview');

        $validator
            ->date('air_date')
            ->allowEmptyDate('air_date');

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

        return $rules;
    }

    /**
     * Get a season by tmdb id with associations if needed
     *     
     * Is posible to find a season by id and not by tmdb id because
     * the id is the primary key and the tmdb id is set when the season
     * is added to the database from the tmdb api client.
     *
     * @param integer $tmdbId Tmdb id
     * @param array|null $contain Associations to include
     * 
     * @return \App\Model\Entity\Season|null
     */
    public function getByTmdbId(int $tmdbId, array $contain = null)
    {
        $query = $this->find()
            ->where(['Seasons.tmdb_id' => $tmdbId]);

        if ($contain) {
            $query->contain($contain);
        }

        return $query->first();
    }

    /**
     * Parse remote data to entity object
     *
     * @param array $remote_data Data to parse
     * 
     * @return \App\Model\Entity\Season|null
     */
    public function parseDataToEntity($remote_data)
    {
        $season = $this->newEmptyEntity();

        try {
            $season->tmdb_id       = $remote_data['id'] ?? null;
            $season->number        = $remote_data['season_number'] ?? null;
            $season->name          = $remote_data['name'] ?? null;
            $season->episode_count = $remote_data['episode_count'] ?? null;
            $season->overview      = $remote_data['overview'] ?? null;
            $season->air_date      = isset($remote_data['air_date']) ? FrozenDate::createFromFormat('Y-m-d', $remote_data['air_date']) : null;
        } catch (\Exception $e) {
            \Cake\Log\Log::error(print_r($e->getMessage(), true));
            return null;
        }

        return $season;
    }
}
