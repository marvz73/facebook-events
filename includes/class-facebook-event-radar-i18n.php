<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.facebook.com/mjavascript
 * @since      1.0.0
 *
 * @package    Facebook_Event_Radar
 * @subpackage Facebook_Event_Radar/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Facebook_Event_Radar
 * @subpackage Facebook_Event_Radar/includes
 * @author     Marvin Aya-ay <marvz73@gmail.com>
 */
class Facebook_Event_Radar_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'facebook-event-radar',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
