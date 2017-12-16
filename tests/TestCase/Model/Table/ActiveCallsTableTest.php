<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActiveCallsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActiveCallsTable Test Case
 */
class ActiveCallsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ActiveCallsTable
     */
    public $ActiveCalls;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.active_calls',
        'app.calls',
        'app.support_groups',
        'app.active_calls_calls',
        'app.users',
        'app.active_calls_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ActiveCalls') ? [] : ['className' => 'App\Model\Table\ActiveCallsTable'];
        $this->ActiveCalls = TableRegistry::get('ActiveCalls', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ActiveCalls);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
