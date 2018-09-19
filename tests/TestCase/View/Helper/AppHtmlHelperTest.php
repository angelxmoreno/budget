<?php
namespace Axm\Budget\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Axm\Budget\View\Helper\AppHtmlHelper;

/**
 * Axm\Budget\View\Helper\AppHtmlHelper Test Case
 */
class AppHtmlHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Axm\Budget\View\Helper\AppHtmlHelper
     */
    public $AppHtmlHelper;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->AppHtmlHelper = new AppHtmlHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AppHtmlHelper);

        parent::tearDown();
    }

    /**
     * Test activeLiLink method
     *
     * @return void
     */
    public function testActiveLiLink()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test userLink method
     *
     * @return void
     */
    public function testUserLink()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test locationLink method
     *
     * @return void
     */
    public function testLocationLink()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test projectLink method
     *
     * @return void
     */
    public function testProjectLink()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test talentLink method
     *
     * @return void
     */
    public function testTalentLink()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test talentTags method
     *
     * @return void
     */
    public function testTalentTags()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test locationPopUp method
     *
     * @return void
     */
    public function testLocationPopUp()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
