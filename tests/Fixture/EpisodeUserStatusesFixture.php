<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EpisodeUserStatusesFixture
 */
class EpisodeUserStatusesFixture extends TestFixture
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
                'user_id' => 1,
                'episode_id' => 1,
                'status_id' => 1,
            ],
        ];
        parent::init();
    }
}
