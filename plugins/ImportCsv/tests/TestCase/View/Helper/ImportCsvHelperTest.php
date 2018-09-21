<?php
namespace ImportCsv\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use ImportCsv\View\Helper\ImportCsvHelper;

/**
 * ImportCsv\View\Helper\ImportCsvHelper Test Case
 */
class ImportCsvHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \ImportCsv\View\Helper\ImportCsvHelper
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
        $view = new View();
        $this->ImportCsv = new ImportCsvHelper($view);
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
