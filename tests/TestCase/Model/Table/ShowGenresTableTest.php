<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShowGenresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShowGenresTable Test Case
 */
class ShowGenresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ShowGenresTable
     */
    protected $ShowGenres;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ShowGenres',
        'app.Genres',
        'app.Shows',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ShowGenres') ? [] : ['className' => ShowGenresTable::class];
        $this->ShowGenres = $this->getTableLocator()->get('ShowGenres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ShowGenres);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ShowGenresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ShowGenresTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
