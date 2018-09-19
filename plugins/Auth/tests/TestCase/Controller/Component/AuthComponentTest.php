<?php
namespace Auth\Test\TestCase\Controller\Component;

use Auth\Controller\Component\AuthComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * Auth\Controller\Component\AuthComponent Test Case
 */
class AuthComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Auth\Controller\Component\AuthComponent
     */
    public $AuthComponent;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->AuthComponent = new AuthComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuthComponent);

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
