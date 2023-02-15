<?php
/**
 * @wordpress-plugin
 * Plugin Name: Infinite Scroll for Genesis
 * Plugin URI: https://ikvaesolutions.com/
 * Description: Adds infinite scroll on front page, blog, archives and search results for themes running on Genesis Framework.
 * Version: 1.0.1
 * Author: Amar Ilindra
 * Author URI: https://www.geekdashboard.com/
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}


global $ikva_infinite_scroll_for_wp_settings;

define('ikva_infinite_scroll_for_wp_settings', 'ikva_infinite_scroll_for_wp_settings');

define('ikva_infinite_scroll_for_wp_PLUGIN_NAME', 'Infinite Scroll for Genesis');
define('ikva_infinite_scroll_for_wp_SETTINGS_SLUG', 'infinite-scroll-for-wp');
define('ikva_infinite_scroll_for_wp_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('ikva_infinite_scroll_for_wp_ASSETS', plugin_dir_url(__FILE__) . 'assets');

//Getting the plugin settings
$ikva_infinite_scroll_for_wp_settings = ikva_infinite_scroll_for_wp_get_settings();

//UI Helper to generate the plugin settings fields easily
include_once(ikva_infinite_scroll_for_wp_PLUGIN_DIR . '/includes/helpers/ui-helper.php');

//Animation Helper to provide the HTML and CSS for animations
include_once(ikva_infinite_scroll_for_wp_PLUGIN_DIR . '/includes/helpers/animation-helper.php');

//Adding the plugin settings Menu inside default WordPress settings
include_once(ikva_infinite_scroll_for_wp_PLUGIN_DIR . '/includes/menu/menus.php');

//Fetching Plugin Settings as JSON Object from wp_options table
function ikva_infinite_scroll_for_wp_get_settings()
{
    return get_option(ikva_infinite_scroll_for_wp_settings, array());
}

//Saving Plugin Settings as JSON Object in wp_options table and re-assigning the new settings to global $ikva_infinite_scroll_for_wp_settings array
function ikva_infinite_scroll_for_wp_save_settings($settings)
{
    if (update_option(ikva_infinite_scroll_for_wp_settings, $settings)) {
        global $ikva_infinite_scroll_for_wp_settings;
        $ikva_infinite_scroll_for_wp_settings = $settings;
    }
}


//Finally loading the infinite scroll logic on the front end depending on plugin configuration
require_once(ikva_infinite_scroll_for_wp_PLUGIN_DIR . '/includes/front/infinite-scroll.php');