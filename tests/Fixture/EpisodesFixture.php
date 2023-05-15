<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EpisodesFixture
 */
class EpisodesFixture extends TestFixture
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
                'number' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'season_id' => 1,
            ],
        ];
        parent::init();
    }
}
