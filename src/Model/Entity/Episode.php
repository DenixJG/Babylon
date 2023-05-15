<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Episode Entity
 *
 * @property int $id
 * @property int $number
 * @property string $title
 * @property int $season_id
 *
 * @property \App\Model\Entity\Season $season
 * @property \App\Model\Entity\EpisodeNote[] $episode_notes
 * @property \App\Model\Entity\EpisodeUserStatus[] $episode_user_statuses
 * @property \App\Model\Entity\LastWatchedEpisode[] $last_watched_episodes
 */
class Episode extends Entity
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
        'number' => true,
        'title' => true,
        'season_id' => true,
        'season' => true,
        'episode_notes' => true,
        'episode_user_statuses' => true,
        'last_watched_episodes' => true,
    ];
}
