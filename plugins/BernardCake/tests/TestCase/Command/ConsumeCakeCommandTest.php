<?php
namespace Axm\BernardCake\Test\TestCase\Command;

use Axm\BernardCake\Command\ConsumeCakeCommand;
use Cake\TestSuite\ConsoleIntegrationTestCase;

/**
 * Axm\BernardCake\Command\ConsumeCakeCommand Test Case
 */
class ConsumeCakeCommandTest extends ConsoleIntegrationTestCase
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
     * Test buildOptionParser method
     *
     * @return void
     */
    public function testBuildOptionParser()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test execute method
     *
     * @return void
     */
    public function testExecute()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
