<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MonographiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MonographiesTable Test Case
 */
class MonographiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MonographiesTable
     */
    protected $Monographies;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Monographies',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Monographies') ? [] : ['className' => MonographiesTable::class];
        $this->Monographies = $this->getTableLocator()->get('Monographies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Monographies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MonographiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
