<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EpisodeUserStatus Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $episode_id
 * @property int $status_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Episode $episode
 * @property \App\Model\Entity\EpisodeStatus $episode_status
 */
class EpisodeUserStatus extends Entity
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
        'user_id' => true,
        'episode_id' => true,
        'status_id' => true,
        'user' => true,
        'episode' => true,
        'episode_status' => true,
    ];
}
