<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property int $role_id
 * @property bool|null $active
 * @property string|null $hash
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\EpisodeNote[] $episode_notes
 * @property \App\Model\Entity\EpisodeUserStatus[] $episode_user_statuses
 * @property \App\Model\Entity\LastWatchedEpisode[] $last_watched_episodes
 * @property \App\Model\Entity\Note[] $notes
 */
class User extends Entity
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
        'username' => true,
        'email' => true,
        'password' => true,
        'role_id' => true,
        'active' => true,
        'hash' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'episode_notes' => true,
        'episode_user_statuses' => true,
        'last_watched_episodes' => true,
        'notes' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];

    protected $_virtual = ['is_admin', 'is_user'];

    protected function _getIsAdmin(): bool
    {
        return $this->role_id === 1;
    }

    protected function _getIsUser(): bool
    {
        return $this->role_id === 2;
    }

    protected function _setPassword(string $password): string
    {
        return (new DefaultPasswordHasher())->hash($password);
    }
}