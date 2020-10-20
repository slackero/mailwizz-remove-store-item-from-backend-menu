<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * RemoveStoreItemFromBackendMenu Extension
 *
 * @package MailWizz EMA
 * @subpackage RemoveStoreItemFromBackendMenuExt
 * @author Oliver Georgi <slackero@gmail.com>
 * @link http://github.com/slackero/
 * @copyright 2020 MailWizz EMA (http://www.mailwizz.com)
 * @license http://www.mailwizz.com/license/
 */

class RemoveStoreItemFromBackendMenuExt extends ExtensionInit
{
    // name of the extension as shown in the backend panel
    public $name = 'Remove Store Link Item From Backend Menu';

    // description of the extension as shown in backend panel
    public $description = 'Remove the store link item from the backend menu';

    // current version of this extension
    public $version = '1.0.1';

    // minimum app version
    public $minAppVersion = '1.3.6.2';

    // the author name
    public $author = 'Oliver Georgi';

    // author website
    public $website = 'http://github.com/slackero/';

    // contact email address
    public $email = 'slackero@gmail.com';

    /**
     * in which apps this extension is allowed to run
     * '*' means all apps
     * available apps: customer, backend, frontend, api, console
     * so you can use any variation,
     * like: array('backend', 'customer'); or array('frontend');
     */
    public $allowedApps = array('backend');

    /**
     * The run method is the entry point of the extension.
     * This method is called by mailwizz at the right time to run the extension.
     */
    public function run()
    {
        // hook into the menu generation filter
        Yii::app()->hooks->addFilter('backend_left_navigation_menu_items', function($menuItems){
            // unset the given menu item
            unset($menuItems['store']);

            // and return the rest of items
            return $menuItems;
        });
    }
}
