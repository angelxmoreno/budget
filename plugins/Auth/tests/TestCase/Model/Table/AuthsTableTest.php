<?php

namespace Auth\Test\TestCase\Model\Table;

use Auth\Model\Table\AuthsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Auth\Model\Table\AuthsTable Test Case
 */
class AuthsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Auth\Model\Table\AuthsTable
     */
    public $AuthsTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.auth.auths'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Auths') ? [] : ['className' => AuthsTable::class];
        $this->AuthsTable = TableRegistry::getTableLocator()->get('Auths', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuthsTable);

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
