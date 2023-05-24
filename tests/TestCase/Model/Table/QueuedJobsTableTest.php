<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QueuedJobsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QueuedJobsTable Test Case
 */
class QueuedJobsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QueuedJobsTable
     */
    protected $QueuedJobs;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.QueuedJobs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('QueuedJobs') ? [] : ['className' => QueuedJobsTable::class];
        $this->QueuedJobs = $this->getTableLocator()->get('QueuedJobs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->QueuedJobs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\QueuedJobsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
