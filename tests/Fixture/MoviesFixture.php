<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MoviesFixture
 */
class MoviesFixture extends TestFixture
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
                'tmdb_id' => 1,
                'status_id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'release_date' => '2023-07-12',
                'is_deleted' => 1,
                'created' => '2023-07-12 20:31:21',
                'modified' => '2023-07-12 20:31:21',
            ],
        ];
        parent::init();
    }
}
