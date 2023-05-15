<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EpisodeNote Entity
 *
 * @property int $id
 * @property int $episode_id
 * @property int $user_id
 * @property string $note
 *
 * @property \App\Model\Entity\Episode $episode
 * @property \App\Model\Entity\User $user
 */
class EpisodeNote extends Entity
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
        'episode_id' => true,
        'user_id' => true,
        'note' => true,
        'episode' => true,
        'user' => true,
    ];
}
