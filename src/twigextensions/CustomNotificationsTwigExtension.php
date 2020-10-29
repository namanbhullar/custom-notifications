<?php
/**
 * Custom Notifications plugin for Craft CMS 3.x
 *
 * Custom Notifications
 *
 * @link      https://www.bookitlist.co/
 * @copyright Copyright (c) 2020 Harpreet Singh
 */

namespace bookitlist\customnotifications\twigextensions;

use bookitlist\customnotifications\CustomNotifications;

use Craft;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * @author    Harpreet Singh
 * @package   CustomNotifications
 * @since     1
 */
class CustomNotificationsTwigExtension extends AbstractExtension
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'CustomNotifications';
    }

    /**
     * @inheritdoc
     */
    public function getFilters()
    {
        return [
            new TwigFilter('someFilter', [$this, 'someInternalFunction']),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('someFunction', [$this, 'someInternalFunction']),
        ];
    }

    /**
     * @param null $text
     *
     * @return string
     */
    public function someInternalFunction($text = null)
    {
        $result = $text . " in the way";

        return $result;
    }
}
