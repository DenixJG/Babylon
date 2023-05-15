<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DirectorsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DirectorsTable Test Case
 */
class DirectorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DirectorsTable
     */
    protected $Directors;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Directors',
        'app.MovieDirectors',
        'app.ShowDirectors',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Directors') ? [] : ['className' => DirectorsTable::class];
        $this->Directors = $this->getTableLocator()->get('Directors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Directors);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DirectorsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
