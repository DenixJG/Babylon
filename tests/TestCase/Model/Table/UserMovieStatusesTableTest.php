<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserMovieStatusesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserMovieStatusesTable Test Case
 */
class UserMovieStatusesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserMovieStatusesTable
     */
    protected $UserMovieStatuses;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.UserMovieStatuses',
        'app.UserMovies',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UserMovieStatuses') ? [] : ['className' => UserMovieStatusesTable::class];
        $this->UserMovieStatuses = $this->getTableLocator()->get('UserMovieStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->UserMovieStatuses);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UserMovieStatusesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
