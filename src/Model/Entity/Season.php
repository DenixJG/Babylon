<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Season Entity
 *
 * @property int $id
 * @property int $show_id
 * @property int|null $tmdb_id
 * @property int $number
 * @property string $name
 * @property int|null $episode_count
 * @property string|null $overview
 * @property \Cake\I18n\FrozenDate|null $air_date
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Show $show
 * @property \App\Model\Entity\Episode[] $episodes
 */
class Season extends Entity
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
        'show_id' => true,
        'tmdb_id' => true,
        'number' => true,
        'name' => true,
        'episode_count' => true,
        'overview' => true,
        'air_date' => true,
        'created' => true,
        'modified' => true,
        'show' => true,
        'episodes' => true,
    ];
}
