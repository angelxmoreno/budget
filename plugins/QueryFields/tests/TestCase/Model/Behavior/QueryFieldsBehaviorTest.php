<?php
namespace QueryFields\Test\TestCase\Model\Behavior;

use Cake\TestSuite\TestCase;
use QueryFields\Model\Behavior\QueryFieldsBehavior;

/**
 * QueryFields\Model\Behavior\QueryFieldsBehavior Test Case
 */
class QueryFieldsBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \QueryFields\Model\Behavior\QueryFieldsBehavior
     */
    public $QueryFields;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->QueryFields = new QueryFieldsBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->QueryFields);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
