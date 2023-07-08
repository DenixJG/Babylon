<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'username' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'role_id' => 1,
                'active' => 1,
                'hash' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-07-08 14:27:09',
                'modified' => '2023-07-08 14:27:09',
            ],
        ];
        parent::init();
    }
}
