<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Show Entity
 *
 * @property int $id
 * @property string $title
 * @property int $status_id
 *
 * @property \App\Model\Entity\ShowStatus $show_status
 * @property \App\Model\Entity\Season[] $seasons
 * @property \App\Model\Entity\ShowDirector[] $show_directors
 */
class Show extends Entity
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
        'title' => true,
        'status_id' => true,
        'show_status' => true,
        'seasons' => true,
        'show_directors' => true,
    ];
}
