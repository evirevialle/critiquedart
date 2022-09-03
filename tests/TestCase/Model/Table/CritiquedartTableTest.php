<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CritiquedartTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CritiquedartTable Test Case
 */
class CritiquedartTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CritiquedartTable
     */
    protected $Critiquedart;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Critiquedart',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Critiquedart') ? [] : ['className' => CritiquedartTable::class];
        $this->Critiquedart = $this->getTableLocator()->get('Critiquedart', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Critiquedart);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CritiquedartTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
