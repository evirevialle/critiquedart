<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OuvrageTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OuvrageTable Test Case
 */
class OuvrageTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OuvrageTable
     */
    protected $Ouvrage;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Ouvrage',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Ouvrage') ? [] : ['className' => OuvrageTable::class];
        $this->Ouvrage = $this->getTableLocator()->get('Ouvrage', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Ouvrage);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OuvrageTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
