<?php
namespace Axm\Budget\Test\TestCase\Model\Entity;

use Axm\Budget\Model\Entity\EntityBase;
use Cake\TestSuite\TestCase;

/**
 * Axm\Budget\Model\Entity\EntityBase Test Case
 */
class EntityBaseTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Axm\Budget\Model\Entity\EntityBase
     */
    public $EntityBase;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->EntityBase = new EntityBase();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EntityBase);

        parent::tearDown();
    }

    /**
     * Test _getDisplayField method
     *
     * @return void
     */
    public function testGetDisplayField()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
