<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SeasonsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SeasonsTable Test Case
 */
class SeasonsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SeasonsTable
     */
    protected $Seasons;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Seasons',
        'app.Shows',
        'app.Episodes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Seasons') ? [] : ['className' => SeasonsTable::class];
        $this->Seasons = $this->getTableLocator()->get('Seasons', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Seasons);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SeasonsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SeasonsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getByTmdbId method
     *
     * @return void
     * @uses \App\Model\Table\SeasonsTable::getByTmdbId()
     */
    public function testGetByTmdbId(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test parseDataToEntity method
     *
     * @return void
     * @uses \App\Model\Table\SeasonsTable::parseDataToEntity()
     */
    public function testParseDataToEntity(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
