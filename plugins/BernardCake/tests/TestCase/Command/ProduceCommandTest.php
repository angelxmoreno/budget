<?php

namespace BernardCake\Test\TestCase\Command;

use Cake\TestSuite\ConsoleIntegrationTestCase;

/**
 * BernardCake\Command\ProduceCommand Test Case
 */
class ProduceCommandTest extends ConsoleIntegrationTestCase
{

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->useCommandRunner();
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
