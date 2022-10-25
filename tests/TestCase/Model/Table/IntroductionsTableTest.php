<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IntroductionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IntroductionsTable Test Case
 */
class IntroductionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IntroductionsTable
     */
    protected $Introductions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Introductions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Introductions') ? [] : ['className' => IntroductionsTable::class];
        $this->Introductions = $this->getTableLocator()->get('Introductions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Introductions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\IntroductionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
