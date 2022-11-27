<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CritiquesDeCollectifTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CritiquesDeCollectifTable Test Case
 */
class CritiquesDeCollectifTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CritiquesDeCollectifTable
     */
    protected $CritiquesDeCollectif;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CritiquesDeCollectif',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CritiquesDeCollectif') ? [] : ['className' => CritiquesDeCollectifTable::class];
        $this->CritiquesDeCollectif = $this->getTableLocator()->get('CritiquesDeCollectif', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CritiquesDeCollectif);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CritiquesDeCollectifTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
