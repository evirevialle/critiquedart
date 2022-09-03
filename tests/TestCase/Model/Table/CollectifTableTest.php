<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CollectifTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CollectifTable Test Case
 */
class CollectifTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CollectifTable
     */
    protected $Collectif;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Collectif',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Collectif') ? [] : ['className' => CollectifTable::class];
        $this->Collectif = $this->getTableLocator()->get('Collectif', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Collectif);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CollectifTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
