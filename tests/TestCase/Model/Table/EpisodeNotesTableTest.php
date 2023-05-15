<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EpisodeNotesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EpisodeNotesTable Test Case
 */
class EpisodeNotesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EpisodeNotesTable
     */
    protected $EpisodeNotes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.EpisodeNotes',
        'app.Episodes',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('EpisodeNotes') ? [] : ['className' => EpisodeNotesTable::class];
        $this->EpisodeNotes = $this->getTableLocator()->get('EpisodeNotes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EpisodeNotes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EpisodeNotesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EpisodeNotesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
