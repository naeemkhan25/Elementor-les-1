<?php
/**
 * Plugin Name: Elementor Test Addon
 * Description: Custom Elementor addon.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-test-addon
 * 
 * Elementor tested up to: 3.7.1
 * Elementor Pro tested up to: 3.7.1
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if (!defined('TEST_BASE_PATH')) {
    define('TEST_BASE_PATH', plugin_dir_path(__FILE__));
}

function elementor_test_addon() {

	// Load plugin file
	require_once( __DIR__ . '/includes/plugin.php' );

	// Run the plugin
	\Elementor_Test_Addon\Pluginss::instance();

}
add_action( 'plugins_loaded', 'elementor_test_addon' );
