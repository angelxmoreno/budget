<?php
namespace ImportCsv\Test\TestCase\Model\Behavior;

use Cake\TestSuite\TestCase;
use ImportCsv\Model\Behavior\ImportCsvBehavior;

/**
 * ImportCsv\Model\Behavior\ImportCsvBehavior Test Case
 */
class ImportCsvBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \ImportCsv\Model\Behavior\ImportCsvBehavior
     */
    public $ImportCsv;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->ImportCsv = new ImportCsvBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ImportCsv);

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
