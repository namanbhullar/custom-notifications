<?php
/**
 * Custom Notifications plugin for Craft CMS 3.x
 *
 * Custom Notifications
 *
 * @link      https://www.bookitlist.co/
 * @copyright Copyright (c) 2020 Harpreet Singh
 */

namespace bookitlist\customnotificationstests\unit;

use Codeception\Test\Unit;
use UnitTester;
use Craft;
use bookitlist\customnotifications\CustomNotifications;

/**
 * ExampleUnitTest
 *
 *
 * @author    Harpreet Singh
 * @package   CustomNotifications
 * @since     1
 */
class ExampleUnitTest extends Unit
{
    // Properties
    // =========================================================================

    /**
     * @var UnitTester
     */
    protected $tester;

    // Public methods
    // =========================================================================

    // Tests
    // =========================================================================

    /**
     *
     */
    public function testPluginInstance()
    {
        $this->assertInstanceOf(
            CustomNotifications::class,
            CustomNotifications::$plugin
        );
    }

    /**
     *
     */
    public function testCraftEdition()
    {
        Craft::$app->setEdition(Craft::Pro);

        $this->assertSame(
            Craft::Pro,
            Craft::$app->getEdition()
        );
    }
}
