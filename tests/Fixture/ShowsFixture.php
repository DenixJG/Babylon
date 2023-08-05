<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ShowsFixture
 */
class ShowsFixture extends TestFixture
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
                'status_id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'original_name' => 'Lorem ipsum dolor sit amet',
                'tmdb_id' => 1,
                'first_air_date' => '2023-08-05',
                'last_air_date' => '2023-08-05',
                'overview' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'is_deleted' => 1,
                'deleted_date' => '2023-08-05 17:47:22',
                'created' => '2023-08-05 17:47:22',
                'modified' => '2023-08-05 17:47:22',
            ],
        ];
        parent::init();
    }
}
