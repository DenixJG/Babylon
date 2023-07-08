<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MovieGenresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MovieGenresTable Test Case
 */
class MovieGenresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MovieGenresTable
     */
    protected $MovieGenres;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.MovieGenres',
        'app.Genres',
        'app.Movies',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MovieGenres') ? [] : ['className' => MovieGenresTable::class];
        $this->MovieGenres = $this->getTableLocator()->get('MovieGenres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MovieGenres);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MovieGenresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MovieGenresTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
