<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Show Entity
 *
 * @property int $id
 * @property int $status_id
 * @property string $title
 * @property string|null $original_name
 * @property int|null $tmdb_id
 * @property \Cake\I18n\FrozenDate|null $first_air_date
 * @property \Cake\I18n\FrozenDate|null $last_air_date
 * @property string|null $overview
 *
 * @property \App\Model\Entity\ShowStatus $show_status
 * @property \App\Model\Entity\Season[] $seasons
 * @property \App\Model\Entity\ShowDirector[] $show_directors
 * @property \App\Model\Entity\ShowGenre[] $show_genres
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
        'status_id' => true,
        'title' => true,
        'original_name' => true,
        'tmdb_id' => true,
        'first_air_date' => true,
        'last_air_date' => true,
        'overview' => true,
        'show_status' => true,
        'seasons' => true,
        'show_directors' => true,
        'show_genres' => true,
    ];
}
