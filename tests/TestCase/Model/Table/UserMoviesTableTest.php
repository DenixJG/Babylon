<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserMoviesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserMoviesTable Test Case
 */
class UserMoviesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserMoviesTable
     */
    protected $UserMovies;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.UserMovies',
        'app.Users',
        'app.Movies',
        'app.UserMovieStatuses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UserMovies') ? [] : ['className' => UserMoviesTable::class];
        $this->UserMovies = $this->getTableLocator()->get('UserMovies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->UserMovies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UserMoviesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UserMoviesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
