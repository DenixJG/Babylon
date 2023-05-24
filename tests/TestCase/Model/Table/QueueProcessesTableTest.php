<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QueueProcessesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QueueProcessesTable Test Case
 */
class QueueProcessesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QueueProcessesTable
     */
    protected $QueueProcesses;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.QueueProcesses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('QueueProcesses') ? [] : ['className' => QueueProcessesTable::class];
        $this->QueueProcesses = $this->getTableLocator()->get('QueueProcesses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->QueueProcesses);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\QueueProcessesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\QueueProcessesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
