<?php

namespace Auth\Test\TestCase\Model\Entity;

use Auth\Model\Entity\AuthEntityTrait;
use Cake\TestSuite\TestCase;

/**
 * Auth\Model\Entity\AuthEntityTrait Test Case
 */
class AuthEntityTraitTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Auth\Model\Entity\AuthEntityTrait
     */
    public $AuthEntityTrait;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->AuthEntityTrait = new AuthEntityTrait();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuthEntityTrait);

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
