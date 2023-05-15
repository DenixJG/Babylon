<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MovieDirectorsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MovieDirectorsTable Test Case
 */
class MovieDirectorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MovieDirectorsTable
     */
    protected $MovieDirectors;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.MovieDirectors',
        'app.Movies',
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
        $config = $this->getTableLocator()->exists('MovieDirectors') ? [] : ['className' => MovieDirectorsTable::class];
        $this->MovieDirectors = $this->getTableLocator()->get('MovieDirectors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MovieDirectors);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MovieDirectorsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MovieDirectorsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
