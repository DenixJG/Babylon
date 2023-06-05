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
                'title' => 'Lorem ipsum dolor sit amet',
                'status_id' => 1,
                'release_date' => '2023-06-05',
                'created' => '2023-06-05 21:13:13',
                'modified' => '2023-06-05 21:13:13',
            ],
        ];
        parent::init();
    }
}
