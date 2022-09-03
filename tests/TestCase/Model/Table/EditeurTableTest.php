<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EditeurTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EditeurTable Test Case
 */
class EditeurTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EditeurTable
     */
    protected $Editeur;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Editeur',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Editeur') ? [] : ['className' => EditeurTable::class];
        $this->Editeur = $this->getTableLocator()->get('Editeur', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Editeur);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EditeurTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
