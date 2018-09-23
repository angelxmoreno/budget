<?php
namespace Axm\Budget\Test\TestCase\Model\Table;

use Axm\Budget\Model\Table\UploadsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Axm\Budget\Model\Table\UploadsTable Test Case
 */
class UploadsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Axm\Budget\Model\Table\UploadsTable
     */
    public $Uploads;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.uploads',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Uploads') ? [] : ['className' => UploadsTable::class];
        $this->Uploads = TableRegistry::getTableLocator()->get('Uploads', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Uploads);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
