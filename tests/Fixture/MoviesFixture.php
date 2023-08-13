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
                'overview' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'is_deleted' => 1,
                'created' => '2023-08-13 20:45:23',
                'modified' => '2023-08-13 20:45:23',
                'deleted_date' => '2023-08-13 20:45:23',
            ],
        ];
        parent::init();
    }
}
