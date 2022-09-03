<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ParticipationcollectifTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ParticipationcollectifTable Test Case
 */
class ParticipationcollectifTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ParticipationcollectifTable
     */
    protected $Participationcollectif;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Participationcollectif',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Participationcollectif') ? [] : ['className' => ParticipationcollectifTable::class];
        $this->Participationcollectif = $this->getTableLocator()->get('Participationcollectif', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Participationcollectif);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ParticipationcollectifTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
