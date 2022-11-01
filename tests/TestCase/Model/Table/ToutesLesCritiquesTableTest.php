<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ToutesLesCritiquesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ToutesLesCritiquesTable Test Case
 */
class ToutesLesCritiquesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ToutesLesCritiquesTable
     */
    protected $ToutesLesCritiques;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ToutesLesCritiques',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ToutesLesCritiques') ? [] : ['className' => ToutesLesCritiquesTable::class];
        $this->ToutesLesCritiques = $this->getTableLocator()->get('ToutesLesCritiques', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ToutesLesCritiques);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ToutesLesCritiquesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
