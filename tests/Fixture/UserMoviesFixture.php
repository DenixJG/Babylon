<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserMoviesFixture
 */
class UserMoviesFixture extends TestFixture
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
                'user_id' => 1,
                'movie_id' => 1,
                'user_movie_status_id' => 1,
                'rated' => 1,
            ],
        ];
        parent::init();
    }
}
