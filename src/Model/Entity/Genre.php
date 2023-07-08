<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Genre Entity
 *
 * @property int $id
 * @property int|null $tmdb_id
 * @property string $name
 *
 * @property \App\Model\Entity\MovieGenre[] $movie_genres
 * @property \App\Model\Entity\ShowGenre[] $show_genres
 */
class Genre extends Entity
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
        'tmdb_id' => true,
        'name' => true,
        'movie_genres' => true,
        'show_genres' => true,
    ];
}
