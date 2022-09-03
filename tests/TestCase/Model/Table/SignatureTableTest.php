<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SignatureTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SignatureTable Test Case
 */
class SignatureTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SignatureTable
     */
    protected $Signature;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Signature',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Signature') ? [] : ['className' => SignatureTable::class];
        $this->Signature = $this->getTableLocator()->get('Signature', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Signature);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SignatureTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
