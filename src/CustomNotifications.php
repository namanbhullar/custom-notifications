<?php
/**
 * Custom Notifications plugin for Craft CMS 3.x
 *
 * Custom Notifications
 *
 * @link      https://www.bookitlist.co/
 * @copyright Copyright (c) 2020 Harpreet Singh
 */

namespace bookitlist\customnotifications;

use bookitlist\customnotifications\services\CustomNotifications as CustomNotificationsService;
use bookitlist\customnotifications\twigextensions\CustomNotificationsTwigExtension;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\UrlManager;
use craft\events\RegisterUrlRulesEvent;

use yii\base\Event;

use craft\web\twig\variables\Cp;

/**
 * Class CustomNotifications
 *
 * @author    Harpreet Singh
 * @package   CustomNotifications
 * @since     1
 *
 * @property  CustomNotificationsService $customNotifications
 */
class CustomNotifications extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var CustomNotifications
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1';

    /**
     * @var bool
     */
    public $hasCpSettings = false;

    /**
     * @var bool
     */
    public $hasCpSection = false;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Craft::$app->view->registerTwigExtension(new CustomNotificationsTwigExtension());

        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                $event->rules['siteActionTrigger1'] = 'custom-notifications/custom-notifications';
            }
        );

        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_CP_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                $event->rules['cpActionTrigger1'] = 'custom-notifications/custom-notifications/do-something';
            }
        );

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'custom-notifications',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );



        Event::on(
            Cp::class,
            Cp::EVENT_REGISTER_CP_NAV_ITEMS,
            function(RegisterCpNavItemsEvent $event) {
                $event->navItems[] = [
                    'url' => 'custom-notifications',
                    'label' => 'Notifications',
                    'badge' => 20,
                    'icon' => 'bookitlist\customnotifications/icon.svg',
                ];
            }
        );

    }

    // Protected Methods
    // =========================================================================

}
