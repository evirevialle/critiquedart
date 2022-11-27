<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SecondaireTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SecondaireTable Test Case
 */
class SecondaireTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SecondaireTable
     */
    protected $Secondaire;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Secondaire',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Secondaire') ? [] : ['className' => SecondaireTable::class];
        $this->Secondaire = $this->getTableLocator()->get('Secondaire', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Secondaire);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SecondaireTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
