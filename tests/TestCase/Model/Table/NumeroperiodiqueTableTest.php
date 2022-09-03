<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NumeroperiodiqueTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NumeroperiodiqueTable Test Case
 */
class NumeroperiodiqueTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NumeroperiodiqueTable
     */
    protected $Numeroperiodique;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Numeroperiodique',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Numeroperiodique') ? [] : ['className' => NumeroperiodiqueTable::class];
        $this->Numeroperiodique = $this->getTableLocator()->get('Numeroperiodique', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Numeroperiodique);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\NumeroperiodiqueTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
