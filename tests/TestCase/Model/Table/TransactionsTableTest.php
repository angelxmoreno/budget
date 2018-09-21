<?php
namespace Axm\Budget\Test\TestCase\Model\Table;

use Axm\Budget\Model\Table\TransactionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Axm\Budget\Model\Table\TransactionsTable Test Case
 */
class TransactionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Axm\Budget\Model\Table\TransactionsTable
     */
    public $Transactions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.transactions',
        'app.accounts',
        'app.users',
        'app.tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Transactions') ? [] : ['className' => TransactionsTable::class];
        $this->Transactions = TableRegistry::getTableLocator()->get('Transactions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Transactions);

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

    /**
     * Test createUuid method
     *
     * @return void
     */
    public function testCreateUuid()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
