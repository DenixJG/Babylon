<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\I18n\FrozenDate;
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
            ->integer('status_id')
            ->notEmptyString('status_id');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('original_name')
            ->maxLength('original_name', 255)
            ->allowEmptyString('original_name');

        $validator
            ->integer('tmdb_id')
            ->allowEmptyString('tmdb_id');

        $validator
            ->date('first_air_date')
            ->allowEmptyDate('first_air_date');

        $validator
            ->date('last_air_date')
            ->allowEmptyDate('last_air_date');

        $validator
            ->scalar('overview')
            ->allowEmptyString('overview');

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

    /**
     * Get a show by tmdb id with associations if needed
     *     
     * Is posible to find a show by id and not by tmdb id because
     * the id is the primary key and the tmdb id is set when the show
     * is added to the database from the tmdb api client.
     *
     * @param integer $tmdbId Tmdb id
     * @param array|null $contain Associations to include
     * 
     * @return \App\Model\Entity\Show|null
     */
    public function getByTmdbId(int $tmdbId, array $contain = null)
    {
        $query = $this->find()
            ->where(['Shows.tmdb_id' => $tmdbId]);

        if ($contain) {
            $query->contain($contain);
        }

        return $query->first();
    }

    /**
     * Parse remote data to entity object
     * 
     * This method will parse the data from the remote API to an entity object also
     * saving the related data (seasons) if needed.
     * 
     * @param array $data Data to parse
     * @param bool $parseSeason If true, parse seasons too
     * 
     * @return \App\Model\Entity\Show|null
     */
    public function parseDataToEntity(array $data, $parseSeason = true)
    {
        \Cake\Log\Log::error(print_r('================== DATA TO PARSE ==================', true));
        \Cake\Log\Log::error(print_r($data, true));

        $show = $this->newEmptyEntity();

        if (empty($data['name']) && empty($data['original_name'])) {
            return null;
        }

        $show->title         = $data['name'] ?? $data['original_name'] ?? null;
        $show->original_name = $data['original_name'] ?? null;
        $show->tmdb_id       = $data['id'] ?? null;
        $show_status         = $this->ShowStatuses->getDynamicStatus($data['first_air_date'] ?? null);
        $show->status_id     = !empty($show_status) ? $show_status->id : null;

        try {
            $show->first_air_date = isset($data['first_air_date']) ? FrozenDate::createFromFormat('Y-m-d', $data['first_air_date']) : null;
            $show->last_air_date  = isset($data['last_air_date']) ? FrozenDate::createFromFormat('Y-m-d', $data['last_air_date']) : null;
        } catch (\Exception $e) {
            \Cake\Log\Log::error(print_r($e->getMessage(), true));
        }

        $show->overview = $data['overview'] ?? null;

        // Check if $data seasons exists
        if (isset($data['seasons']) && is_array($data['seasons']) && $parseSeason) {
            $seasons = [];
            foreach ($data['seasons'] as $season) {
                $seasons[] = $this->Seasons->parseDataToEntity($season);
            }

            // Set seasons
            $show->seasons = $seasons;
        }

        return $show;
    }
}