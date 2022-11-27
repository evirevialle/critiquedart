<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChapitresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChapitresTable Test Case
 */
class ChapitresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChapitresTable
     */
    protected $Chapitres;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Chapitres',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Chapitres') ? [] : ['className' => ChapitresTable::class];
        $this->Chapitres = $this->getTableLocator()->get('Chapitres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Chapitres);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ChapitresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
