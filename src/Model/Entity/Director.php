<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Director Entity
 *
 * @property int $id
 * @property string $name
 *
 * @property \App\Model\Entity\MovieDirector[] $movie_directors
 * @property \App\Model\Entity\ShowDirector[] $show_directors
 */
class Director extends Entity
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
        'name' => true,
        'movie_directors' => true,
        'show_directors' => true,
    ];
}
