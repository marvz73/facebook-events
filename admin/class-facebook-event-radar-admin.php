<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.facebook.com/mjavascript
 * @since      1.0.0
 *
 * @package    Facebook_Event_Radar
 * @subpackage Facebook_Event_Radar/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Facebook_Event_Radar
 * @subpackage Facebook_Event_Radar/admin
 * @author     Marvin Aya-ay <marvz73@gmail.com>
 */
class Facebook_Event_Radar_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Facebook_Event_Radar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Facebook_Event_Radar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/facebook-event-radar-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Facebook_Event_Radar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Facebook_Event_Radar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/facebook-event-radar-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the settings menu for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function _init(){

		//Settings Menu
		add_menu_page(
	        'Facebook Event Radar',                              // The title to be displayed on the corresponding page for this menu
	        'Event Radar',                              // The text to be displayed for this actual menu item
	        'administrator',                                // Which type of users can see this menu
	        'donation-payment',                                // The unique ID - that is, the slug - for this menu item
	        array( $this, '_settings_page' ),    // The name of the function to call when rendering the menu for this page
	       	'dashicons-facebook',						        // The icon for this menu.
	        '83.7'                                          // The position in the menu order this menu should appear
	    );

	    
	}


	/**
	 * Settings display for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function _settings_page(){

		if(isset($_POST['action']) && $_POST['action'] == 'save_settings')
		{	
			update_option('er_settings',array(
				'google_key'		=>	$_POST['google_key'],
				'facebook_appId'	=>	$_POST['facebook_appId'],
				'facebook_secret'		=>	$_POST['facebook_secret']
				)
			);
		}

		$settings = get_option('er_settings');

		require_once('partials/facebook-event-radar-admin-display.php');
	}
	
}
