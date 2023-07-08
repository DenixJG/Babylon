<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ShowGenresFixture
 */
class ShowGenresFixture extends TestFixture
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
                'show_id' => 1,
            ],
        ];
        parent::init();
    }
}
