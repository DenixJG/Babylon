<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\I18n\FrozenDate;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShowStatuses Model
 *
 * @method \App\Model\Entity\ShowStatus newEmptyEntity()
 * @method \App\Model\Entity\ShowStatus newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ShowStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ShowStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\ShowStatus findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ShowStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ShowStatus[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ShowStatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShowStatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShowStatus[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ShowStatus[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ShowStatus[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ShowStatus[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ShowStatusesTable extends Table
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

        $this->setTable('show_statuses');
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
     * Get the ShowStatus based on the status name
     * 
     * @param string $status_name The status name, e.g. 'Released'
     * 
     * @return \App\Model\Entity\ShowStatus|null
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
     * @param string $release_date The release date, e.g. '2020-12-25'
     * 
     * @return \App\Model\Entity\ShowStatus|null
     */
    public function getDynamicStatus(string $release_date)
    {
        // TODO: For shows status, we need to check if the show is still running or not
        // for this we need to check the last episode air date and compare it to today's date
        // or we can use the status from the API if it's available

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
            return $this->getByStatusName('Finished');
        }

        // If we get here, the release date is today, so return the default status
        return $this->getByStatusName('On Air');
    }

}