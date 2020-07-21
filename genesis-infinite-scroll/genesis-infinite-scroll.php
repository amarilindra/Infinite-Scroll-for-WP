<?php
/**
 * @wordpress-plugin
 * Plugin Name: Genesis Infinite Scroll
 * Plugin URI: https://ikvaesolutions.com/
 * Description: Adds infinite scroll on front page, blog, archives and search results for themes running on Genesis Framework.
 * Version: 1.0
 * Author: Amar Ilindra
 * Author URI: https://www.geekdashboard.com/
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}


global $ikva_genesis_infinite_scroll_settings;

define('ikva_genesis_infinite_scroll_settings', 'ikva_genesis_infinite_scroll_settings');

define('ikva_genesis_infinite_scroll_PLUGIN_NAME', 'Genesis Infinite Scroll');
define('ikva_genesis_infinite_scroll_SETTINGS_SLUG', 'genesis-infinite-scroll');
define('ikva_genesis_infinite_scroll_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('ikva_genesis_infinite_scroll_ASSETS', plugin_dir_url(__FILE__) . 'assets');

//Getting the plugin settings
$ikva_genesis_infinite_scroll_settings = ikva_genesis_infinite_scroll_get_settings();

//UI Helper to generate the plugin settings fields easily
include_once(ikva_genesis_infinite_scroll_PLUGIN_DIR . '/includes/helpers/ui-helper.php');

//Animation Helper to provide the HTML and CSS for animations
include_once(ikva_genesis_infinite_scroll_PLUGIN_DIR . '/includes/helpers/animation-helper.php');

//Adding the plugin settings Menu inside default WordPress settings
include_once(ikva_genesis_infinite_scroll_PLUGIN_DIR . '/includes/menu/menus.php');

//Fetching Plugin Settings as JSON Object from wp_options table
function ikva_genesis_infinite_scroll_get_settings()
{
    return get_option(ikva_genesis_infinite_scroll_settings, array());
}

//Saving Plugin Settings as JSON Object in wp_options table and re-assigning the new settings to global $ikva_genesis_infinite_scroll_settings array
function ikva_genesis_infinite_scroll_save_settings($settings)
{
    if (update_option(ikva_genesis_infinite_scroll_settings, $settings)) {
        global $ikva_genesis_infinite_scroll_settings;
        $ikva_genesis_infinite_scroll_settings = $settings;
    }
}

//Finally loading the infinite scroll logic on the front end depending on plugin configuration
require_once(ikva_genesis_infinite_scroll_PLUGIN_DIR . '/includes/front/infinite-scroll.php');




function ikva_genesis_infinite_scroll_closing_tag_1() {
    echo "<div>ikva_genesis_infinite_scroll_closing_tag_1";
}

function ikva_genesis_infinite_scroll_opening_tag_1() {
    echo "</div>";
}