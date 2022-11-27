<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompositionsignatureTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompositionsignatureTable Test Case
 */
class CompositionsignatureTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CompositionsignatureTable
     */
    protected $Compositionsignature;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Compositionsignature',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Compositionsignature') ? [] : ['className' => CompositionsignatureTable::class];
        $this->Compositionsignature = $this->getTableLocator()->get('Compositionsignature', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Compositionsignature);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CompositionsignatureTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
