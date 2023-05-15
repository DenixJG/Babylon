<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LastWatchedEpisodes Model
 *
 * @property \App\Model\Table\EpisodesTable&\Cake\ORM\Association\BelongsTo $Episodes
 *
 * @method \App\Model\Entity\LastWatchedEpisode newEmptyEntity()
 * @method \App\Model\Entity\LastWatchedEpisode newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\LastWatchedEpisode[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LastWatchedEpisode get($primaryKey, $options = [])
 * @method \App\Model\Entity\LastWatchedEpisode findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\LastWatchedEpisode patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LastWatchedEpisode[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\LastWatchedEpisode|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LastWatchedEpisode saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LastWatchedEpisode[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LastWatchedEpisode[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\LastWatchedEpisode[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LastWatchedEpisode[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LastWatchedEpisodesTable extends Table
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

        $this->setTable('last_watched_episodes');
        $this->setDisplayField('user_id');
        $this->setPrimaryKey('user_id');

        $this->belongsTo('Episodes', [
            'foreignKey' => 'episode_id',
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
            ->integer('episode_id')
            ->notEmptyString('episode_id');

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
        $rules->add($rules->existsIn('episode_id', 'Episodes'), ['errorField' => 'episode_id']);

        return $rules;
    }
}
