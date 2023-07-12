<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserMovie Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $movie_id
 * @property int $user_movie_status_id
 * @property int|null $rated
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Movie $movie
 * @property \App\Model\Entity\UserMovieStatus $user_movie_status
 */
class UserMovie extends Entity
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
        'movie_id' => true,
        'user_movie_status_id' => true,
        'rated' => true,
        'user' => true,
        'movie' => true,
        'user_movie_status' => true,
    ];
}
