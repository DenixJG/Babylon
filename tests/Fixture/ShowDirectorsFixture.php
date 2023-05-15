<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ShowDirectorsFixture
 */
class ShowDirectorsFixture extends TestFixture
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
                'show_id' => 1,
                'director_id' => 1,
            ],
        ];
        parent::init();
    }
}
