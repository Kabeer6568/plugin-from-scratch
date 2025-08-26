<?php 
/*
 * Plugin Name:       My Basics Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Kabeer Ali Alvi
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 */

if (! defined('ABSPATH')) {
    exit; // Exit if access directly
}

if (! defined('MY_PLUGIN_VERSION')) {
    define('MY_PLUGIN_VERSION' , '1.0.0');
}

if (! defined('MY_PLUGIN_DIR_PATH')){
    define('MY_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
}

if (! defined ('MY_PLUGIN_DIR_URL')) {
    define('MY_PLUGIN_DIR_URL' , plugin_dir_url(__FILE__));
}



require_once MY_PLUGIN_DIR_PATH . 'inc/plugin.php';

