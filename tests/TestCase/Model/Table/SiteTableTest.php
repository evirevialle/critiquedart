<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SiteTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SiteTable Test Case
 */
class SiteTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SiteTable
     */
    protected $Site;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Site',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Site') ? [] : ['className' => SiteTable::class];
        $this->Site = $this->getTableLocator()->get('Site', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Site);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SiteTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
