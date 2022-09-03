<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PeriodiqueTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PeriodiqueTable Test Case
 */
class PeriodiqueTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PeriodiqueTable
     */
    protected $Periodique;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Periodique',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Periodique') ? [] : ['className' => PeriodiqueTable::class];
        $this->Periodique = $this->getTableLocator()->get('Periodique', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Periodique);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PeriodiqueTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
