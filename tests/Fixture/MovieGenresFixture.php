<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MovieGenresFixture
 */
class MovieGenresFixture extends TestFixture
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
                'genre_id' => 1,
                'movie_id' => 1,
            ],
        ];
        parent::init();
    }
}
