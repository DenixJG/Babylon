<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Episodes Model
 *
 * @property \App\Model\Table\SeasonsTable&\Cake\ORM\Association\BelongsTo $Seasons
 * @property \App\Model\Table\EpisodeNotesTable&\Cake\ORM\Association\HasMany $EpisodeNotes
 * @property \App\Model\Table\EpisodeUserStatusesTable&\Cake\ORM\Association\HasMany $EpisodeUserStatuses
 * @property \App\Model\Table\LastWatchedEpisodesTable&\Cake\ORM\Association\HasMany $LastWatchedEpisodes
 *
 * @method \App\Model\Entity\Episode newEmptyEntity()
 * @method \App\Model\Entity\Episode newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Episode[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Episode get($primaryKey, $options = [])
 * @method \App\Model\Entity\Episode findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Episode patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Episode[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Episode|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Episode saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Episode[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Episode[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Episode[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Episode[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EpisodesTable extends Table
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

        $this->setTable('episodes');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Seasons', [
            'foreignKey' => 'season_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('EpisodeNotes', [
            'foreignKey' => 'episode_id',
        ]);
        $this->hasMany('EpisodeUserStatuses', [
            'foreignKey' => 'episode_id',
        ]);
        $this->hasMany('LastWatchedEpisodes', [
            'foreignKey' => 'episode_id',
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
            ->integer('number')
            ->requirePresence('number', 'create')
            ->notEmptyString('number');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->integer('season_id')
            ->notEmptyString('season_id');

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
        $rules->add($rules->existsIn('season_id', 'Seasons'), ['errorField' => 'season_id']);

        return $rules;
    }
}
