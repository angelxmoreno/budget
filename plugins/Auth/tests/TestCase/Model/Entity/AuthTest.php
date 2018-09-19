<?php
namespace Auth\Test\TestCase\Model\Entity;

use Auth\Model\Entity\Auth;
use Cake\TestSuite\TestCase;

/**
 * Auth\Model\Entity\Auth Test Case
 */
class AuthTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Auth\Model\Entity\Auth
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
        $this->Auth = new Auth();
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
