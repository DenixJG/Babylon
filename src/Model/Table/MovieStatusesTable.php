<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\I18n\FrozenDate;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MovieStatuses Model
 *
 * @method \App\Model\Entity\MovieStatus newEmptyEntity()
 * @method \App\Model\Entity\MovieStatus newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MovieStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MovieStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\MovieStatus findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MovieStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MovieStatus[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MovieStatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MovieStatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MovieStatus[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MovieStatus[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MovieStatus[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MovieStatus[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MovieStatusesTable extends Table
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

        $this->setTable('movie_statuses');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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

    /**
     * Get the MovieStatus based on the status name
     * 
     * @param string $status_name The status name, e.g. 'Released'
     * 
     * @return \App\Model\Entity\MovieStatus|null
     */
    public function getByStatusName(string $status_name)
    {
        $status = $this->find()
            ->where(['name' => $status_name])
            ->first();

        return $status;
    }

    /**
     * Get the MovieStatus based on release date
     * 
     * - If the release date is empty, return the default is 'Unknown'
     * - If the release date is in the future, return the default is 'Coming Soon'
     * - If the release date is in the past, return the default is 'Released'
     * - If the release date is today, return the default is 'Released'
     * 
     * @param string $release_date
     * 
     * @return \App\Model\Entity\MovieStatus
     */
    public function getDynamicStatus(string $release_date)
    {
        // Check if the release date is empty and return the default status
        if (empty($release_date)) {
            return $this->getByStatusName('Unknown');
        }

        // Convert the release date to a FrozenDate object
        $release_date = new FrozenDate($release_date);

        // Check if the release date is in the future and return the default status
        if ($release_date->isFuture()) {
            return $this->getByStatusName('Coming Soon');
        }

        // Check if the release date is in the past and return the default status
        if ($release_date->isPast()) {
            return $this->getByStatusName('Released');
        }

        // If we get here, the release date is today, so return the default status
        return $this->getByStatusName('Released');
    }
}