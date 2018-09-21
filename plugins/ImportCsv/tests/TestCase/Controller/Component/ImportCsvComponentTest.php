<?php
namespace ImportCsv\Test\TestCase\Controller\Component;

use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;
use ImportCsv\Controller\Component\ImportCsvComponent;

/**
 * ImportCsv\Controller\Component\ImportCsvComponent Test Case
 */
class ImportCsvComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \ImportCsv\Controller\Component\ImportCsvComponent
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
        $registry = new ComponentRegistry();
        $this->ImportCsv = new ImportCsvComponent($registry);
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
