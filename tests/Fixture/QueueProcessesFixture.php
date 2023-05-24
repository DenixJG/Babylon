<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QueueProcessesFixture
 */
class QueueProcessesFixture extends TestFixture
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
                'pid' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-05-24 16:27:38',
                'modified' => '2023-05-24 16:27:38',
                'terminate' => 1,
                'server' => 'Lorem ipsum dolor sit amet',
                'workerkey' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
