<?php
namespace Auth\Test\TestCase\Model\Behavior;

use Auth\Model\Behavior\AuthBehavior;
use Cake\TestSuite\TestCase;

/**
 * Auth\Model\Behavior\AuthBehavior Test Case
 */
class AuthBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Auth\Model\Behavior\AuthBehavior
     */
    public $Auth;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Auth = new AuthBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Auth);

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
