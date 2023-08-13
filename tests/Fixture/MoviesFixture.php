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
                'original_title' => 'Lorem ipsum dolor sit amet',
                'release_date' => '2023-08-13',
                'is_deleted' => 1,
                'created' => '2023-08-13 18:43:54',
                'modified' => '2023-08-13 18:43:54',
                'deleted_date' => '2023-08-13 18:43:54',
            ],
        ];
        parent::init();
    }
}
