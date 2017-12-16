<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SupportGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SupportGroupsTable Test Case
 */
class SupportGroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SupportGroupsTable
     */
    public $SupportGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.support_groups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SupportGroups') ? [] : ['className' => 'App\Model\Table\SupportGroupsTable'];
        $this->SupportGroups = TableRegistry::get('SupportGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SupportGroups);

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
}
