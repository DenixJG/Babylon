<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShowDirectorsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShowDirectorsTable Test Case
 */
class ShowDirectorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ShowDirectorsTable
     */
    protected $ShowDirectors;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ShowDirectors',
        'app.Shows',
        'app.Directors',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ShowDirectors') ? [] : ['className' => ShowDirectorsTable::class];
        $this->ShowDirectors = $this->getTableLocator()->get('ShowDirectors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ShowDirectors);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ShowDirectorsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ShowDirectorsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
