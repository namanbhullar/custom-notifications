<?php
/**
 * Custom Notifications plugin for Craft CMS 3.x
 *
 * Custom Notifications
 *
 * @link      https://www.bookitlist.co/
 * @copyright Copyright (c) 2020 Harpreet Singh
 */

namespace bookitlist\customnotifications\controllers;

use bookitlist\customnotifications\CustomNotifications;

use Craft;
use craft\web\Controller;

/**
 * @author    Harpreet Singh
 * @package   CustomNotifications
 * @since     1
 */
class CustomNotificationsController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['index', 'do-something'];

    // Public Methods
    // =========================================================================

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $result = 'Welcome to the CustomNotificationsController actionIndex() method';

        return $result;
    }

    /**
     * @return mixed
     */
    public function actionDoSomething()
    {
        $result = 'Welcome to the CustomNotificationsController actionDoSomething() method';

        return $result;
    }
}
