<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PseudonymeTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PseudonymeTable Test Case
 */
class PseudonymeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PseudonymeTable
     */
    protected $Pseudonyme;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Pseudonyme',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Pseudonyme') ? [] : ['className' => PseudonymeTable::class];
        $this->Pseudonyme = $this->getTableLocator()->get('Pseudonyme', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Pseudonyme);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PseudonymeTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
