<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrefacesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrefacesTable Test Case
 */
class PrefacesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PrefacesTable
     */
    protected $Prefaces;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Prefaces',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Prefaces') ? [] : ['className' => PrefacesTable::class];
        $this->Prefaces = $this->getTableLocator()->get('Prefaces', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Prefaces);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PrefacesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
