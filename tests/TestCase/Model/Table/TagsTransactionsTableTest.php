<?php
namespace Axm\Budget\Test\TestCase\Model\Table;

use Axm\Budget\Model\Table\TagsTransactionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Axm\Budget\Model\Table\TagsTransactionsTable Test Case
 */
class TagsTransactionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Axm\Budget\Model\Table\TagsTransactionsTable
     */
    public $TagsTransactions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tags_transactions',
        'app.tags',
        'app.transactions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TagsTransactions') ? [] : ['className' => TagsTransactionsTable::class];
        $this->TagsTransactions = TableRegistry::getTableLocator()->get('TagsTransactions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TagsTransactions);

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
