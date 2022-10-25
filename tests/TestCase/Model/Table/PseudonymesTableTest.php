<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PseudonymesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PseudonymesTable Test Case
 */
class PseudonymesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PseudonymesTable
     */
    protected $Pseudonymes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Pseudonymes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Pseudonymes') ? [] : ['className' => PseudonymesTable::class];
        $this->Pseudonymes = $this->getTableLocator()->get('Pseudonymes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Pseudonymes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PseudonymesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
