<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PermitsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PermitsTable Test Case
 */
class PermitsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PermitsTable
     */
    public $Permits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.permits',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Permits') ? [] : ['className' => PermitsTable::class];
        $this->Permits = TableRegistry::getTableLocator()->get('Permits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Permits);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
