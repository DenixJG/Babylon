<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShowGenre Entity
 *
 * @property int $id
 * @property int $genre_id
 * @property int $show_id
 *
 * @property \App\Model\Entity\Genre $genre
 * @property \App\Model\Entity\Show $show
 */
class ShowGenre extends Entity
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
        'genre_id' => true,
        'show_id' => true,
        'genre' => true,
        'show' => true,
    ];
}
