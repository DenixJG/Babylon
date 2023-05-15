<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LastWatchedEpisodesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LastWatchedEpisodesTable Test Case
 */
class LastWatchedEpisodesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LastWatchedEpisodesTable
     */
    protected $LastWatchedEpisodes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.LastWatchedEpisodes',
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
        $config = $this->getTableLocator()->exists('LastWatchedEpisodes') ? [] : ['className' => LastWatchedEpisodesTable::class];
        $this->LastWatchedEpisodes = $this->getTableLocator()->get('LastWatchedEpisodes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->LastWatchedEpisodes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LastWatchedEpisodesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LastWatchedEpisodesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
