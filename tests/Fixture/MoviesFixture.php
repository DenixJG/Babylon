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
                'created' => '2023-07-12 11:41:40',
                'modified' => '2023-07-12 11:41:40',
            ],
        ];
        parent::init();
    }
}
