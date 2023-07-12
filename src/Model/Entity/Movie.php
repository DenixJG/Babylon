<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Movie Entity
 *
 * @property int $id
 * @property int|null $tmdb_id
 * @property int $status_id
 * @property string $title
 * @property \Cake\I18n\FrozenDate $release_date
 * @property bool|null $is_deleted
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\MovieStatus $movie_status
 * @property \App\Model\Entity\MovieDirector[] $movie_directors
 * @property \App\Model\Entity\MovieGenre[] $movie_genres
 * @property \App\Model\Entity\UserMovie[] $user_movies
 */
class Movie extends Entity
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
        'status_id' => true,
        'title' => true,
        'release_date' => true,
        'is_deleted' => true,
        'created' => true,
        'modified' => true,
        'movie_status' => true,
        'movie_directors' => true,
        'movie_genres' => true,
        'user_movies' => true,
    ];
}
