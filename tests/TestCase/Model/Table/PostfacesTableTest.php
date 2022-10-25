<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PostfacesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PostfacesTable Test Case
 */
class PostfacesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PostfacesTable
     */
    protected $Postfaces;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Postfaces',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Postfaces') ? [] : ['className' => PostfacesTable::class];
        $this->Postfaces = $this->getTableLocator()->get('Postfaces', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Postfaces);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PostfacesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
