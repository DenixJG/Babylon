<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QueuedJob Entity
 *
 * @property int $id
 * @property string $job_task
 * @property string|null $data
 * @property string|null $job_group
 * @property string|null $reference
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $notbefore
 * @property \Cake\I18n\FrozenTime|null $fetched
 * @property \Cake\I18n\FrozenTime|null $completed
 * @property float|null $progress
 * @property int $failed
 * @property string|null $failure_message
 * @property string|null $workerkey
 * @property string|null $status
 * @property int $priority
 */
class QueuedJob extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'job_task' => true,
        'data' => true,
        'job_group' => true,
        'reference' => true,
        'created' => true,
        'notbefore' => true,
        'fetched' => true,
        'completed' => true,
        'progress' => true,
        'failed' => true,
        'failure_message' => true,
        'workerkey' => true,
        'status' => true,
        'priority' => true,
    ];
}
