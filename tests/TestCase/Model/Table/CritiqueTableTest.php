<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CritiqueTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CritiqueTable Test Case
 */
class CritiqueTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CritiqueTable
     */
    protected $Critique;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Critique',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Critique') ? [] : ['className' => CritiqueTable::class];
        $this->Critique = $this->getTableLocator()->get('Critique', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Critique);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CritiqueTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
