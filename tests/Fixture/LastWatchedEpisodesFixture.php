<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LastWatchedEpisodesFixture
 */
class LastWatchedEpisodesFixture extends TestFixture
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
                'user_id' => 1,
                'episode_id' => 1,
            ],
        ];
        parent::init();
    }
}
