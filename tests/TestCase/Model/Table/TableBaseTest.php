<?php
namespace Axm\Budget\Test\TestCase\Model\Table;

use Axm\Budget\Model\Table\TableBase;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Axm\Budget\Model\Table\TableBase Test Case
 */
class TableBaseTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Axm\Budget\Model\Table\TableBase
     */
    public $TableBase;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.base'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Base') ? [] : ['className' => TableBase::class];
        $this->TableBase = TableRegistry::getTableLocator()->get('Base', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TableBase);

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
     * Test findLastModified method
     *
     * @return void
     */
    public function testFindLastModified()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test findLastModifiedDate method
     *
     * @return void
     */
    public function testFindLastModifiedDate()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getLastModified method
     *
     * @return void
     */
    public function testGetLastModified()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test findRandom method
     *
     * @return void
     */
    public function testFindRandom()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
