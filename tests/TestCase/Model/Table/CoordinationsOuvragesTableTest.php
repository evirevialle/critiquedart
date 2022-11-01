<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CoordinationsOuvragesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CoordinationsOuvragesTable Test Case
 */
class CoordinationsOuvragesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CoordinationsOuvragesTable
     */
    protected $CoordinationsOuvrages;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CoordinationsOuvrages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CoordinationsOuvrages') ? [] : ['className' => CoordinationsOuvragesTable::class];
        $this->CoordinationsOuvrages = $this->getTableLocator()->get('CoordinationsOuvrages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CoordinationsOuvrages);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CoordinationsOuvragesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
