<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MoviesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MoviesTable Test Case
 */
class MoviesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MoviesTable
     */
    protected $Movies;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Movies',
        'app.MovieStatuses',
        'app.MovieDirectors',
        'app.MovieGenres',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Movies') ? [] : ['className' => MoviesTable::class];
        $this->Movies = $this->getTableLocator()->get('Movies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Movies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MoviesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MoviesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getById method
     *
     * @return void
     * @uses \App\Model\Table\MoviesTable::getById()
     */
    public function testGetById(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getByTmdbId method
     *
     * @return void
     * @uses \App\Model\Table\MoviesTable::getByTmdbId()
     */
    public function testGetByTmdbId(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test parseDataToEntity method
     *
     * @return void
     * @uses \App\Model\Table\MoviesTable::parseDataToEntity()
     */
    public function testParseDataToEntity(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
