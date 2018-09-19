<?php
namespace Axm\Budget\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Axm\Budget\View\Helper\AuthHelper;

/**
 * Axm\Budget\View\Helper\AuthHelper Test Case
 */
class AuthHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Axm\Budget\View\Helper\AuthHelper
     */
    public $AuthHelper;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->AuthHelper = new AuthHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuthHelper);

        parent::tearDown();
    }

    /**
     * Test isLoggedIn method
     *
     * @return void
     */
    public function testIsLoggedIn()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test user method
     *
     * @return void
     */
    public function testUser()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
