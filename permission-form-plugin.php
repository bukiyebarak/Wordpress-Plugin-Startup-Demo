<?php
/**
 * Permission Form Plugin
 *
 * @package           PermissionFormPlugin
 * @author            Your Name
 * @copyright         2019 Your Name or Company Name
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Annual Permission Form
 * Plugin URI:        https://example.com/plugin-name
 * Description:       Description of the plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      8.0
 * Author:            Your Name
 * Author URI:        https://example.com
 * Text Domain:       permission-form-plugin
 * Domain Path:       /languages
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://example.com/my-plugin/
 */

#region --- for plugin security-----

//if this file is called firectly, abort!!!
defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');
#endregion

//Require once the Composer Autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once('vendor/autoload.php');
}
/**
*The code that runs during plugin activation
 */
function activate_permit_form_plugin(): void
{
    \Inc\Base\Activate::activate();

}
register_activation_hook(__FILE__, 'activate_permit_form_plugin');

/**
 *The code that runs during plugin de  activation
 */
function deactivate_permit_form_plugin(): void
{
    \Inc\Base\Deactivate::deactivate();
}

register_deactivation_hook(__FILE__, 'deactivate_permit_form_plugin');

if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}