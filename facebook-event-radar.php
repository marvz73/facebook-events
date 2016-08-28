<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.facebook.com/mjavascript
 * @since             1.0.0
 * @package           Facebook_Event_Radar
 *
 * @wordpress-plugin
 * Plugin Name:       Facebook Event Radar
 * Plugin URI:        http://
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Marvin Aya-ay
 * Author URI:        https://www.facebook.com/mjavascript
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       facebook-event-radar
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-facebook-event-radar-activator.php
 */
function activate_facebook_event_radar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-facebook-event-radar-activator.php';
	Facebook_Event_Radar_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-facebook-event-radar-deactivator.php
 */
function deactivate_facebook_event_radar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-facebook-event-radar-deactivator.php';
	Facebook_Event_Radar_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_facebook_event_radar' );
register_deactivation_hook( __FILE__, 'deactivate_facebook_event_radar' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-facebook-event-radar.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_facebook_event_radar() {

	$plugin = new Facebook_Event_Radar();
	$plugin->run();

}
run_facebook_event_radar();
