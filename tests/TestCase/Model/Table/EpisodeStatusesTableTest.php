<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EpisodeStatusesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EpisodeStatusesTable Test Case
 */
class EpisodeStatusesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EpisodeStatusesTable
     */
    protected $EpisodeStatuses;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.EpisodeStatuses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('EpisodeStatuses') ? [] : ['className' => EpisodeStatusesTable::class];
        $this->EpisodeStatuses = $this->getTableLocator()->get('EpisodeStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EpisodeStatuses);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EpisodeStatusesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
