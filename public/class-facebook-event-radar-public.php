<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.facebook.com/mjavascript
 * @since      1.0.0
 *
 * @package    Facebook_Event_Radar
 * @subpackage Facebook_Event_Radar/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Facebook_Event_Radar
 * @subpackage Facebook_Event_Radar/public
 * @author     Marvin Aya-ay <marvz73@gmail.com>
 */



class Facebook_Event_Radar_Public {

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



	private $options;
	private $facebook;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		if(session_id() == ''){
     		session_start();
		}

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->options = get_option('er_settings');
		$this->facebook = new Facebook\Facebook([
		  'app_id' => $this->options['facebook_appId'],
		  'app_secret' => $this->options['facebook_secret'],
		  'default_graph_version' => 'v2.5',
		]);

		if(isset($_SESSION['facebook_session']) && !empty($_SESSION['facebook_session'])){
			$this->facebook->setDefaultAccessToken($_SESSION['facebook_session']);
		}
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/facebook-event-radar-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		// Google Map lib
		wp_enqueue_script( 'googlemap', 'https://maps.googleapis.com/maps/api/js?key='.$this->options['google_key'].'', array(), $this->version, false );

		// ReactJS lib and dependencies
		wp_enqueue_script( $this->plugin_name . '-react', plugin_dir_url( __FILE__ ) . 'js/react.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '-react-dom', plugin_dir_url( __FILE__ ) . 'js/react-dom.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '-browser', plugin_dir_url( __FILE__ ) . 'js/browser.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '-ajaxPostReact', plugin_dir_url( __FILE__ ) . 'js/ajaxPostReact.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '-textToLink', plugin_dir_url( __FILE__ ) . 'js/textToLink.js', array( 'jquery' ), $this->version, false );
	    
	    // Localize variable
	    wp_localize_script( $this->plugin_name . '-react', '_global',
	        array( 
	            'ajaxurl' 	=>	 admin_url( 'admin-ajax.php' ),
	            'homeurl' 	=>	 home_url(),
	            'nonce'		=>	 time()
	        )
	    );

		// Plugin App.js
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/facebook-event-radar-public.js', array( 'jquery' ), $this->version, false );


	}

	/**
	 * Add custom attribute to javascript tag in order the google map to work.
	 *
	 * @since    1.0.0
	 */
	public  function _script_attribute( $tag, $handle ) {
		if('googlemap' != $handle){
			return $tag;
		}
	    return str_replace( ' src', ' async defer src', $tag );
	}

	/**
	 * Display the event radar for the public side of the site.
	 *
	 * @since    1.0.0
	 */
	public function _event_radar_display(){

		$helper = $this->facebook->getRedirectLoginHelper();

		if(isset($_GET['code']) && $_GET['code'] != '')
		{
			try {
			  $accessToken = $helper->getAccessToken();
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
			  // When Graph returns an error
			  die('Graph returned an error: ' . $e->getMessage());
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			  // When validation fails or other local issues
			  die('Facebook SDK returned an error: ' . $e->getMessage());
			}
			
			if (isset($accessToken)) {

				// Exchanges a short-lived access token for a long-lived one
				$oAuth2Client = $this->facebook->getOAuth2Client();
				$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
				$_SESSION['facebook_session'] = (string) $longLivedAccessToken;
			}
		}
		else
		{
			$permissions = ['email', 'public_profile']; // optional
			$loginUrl = $helper->getLoginUrl('http://localhost/eventradar/', $permissions);

		}

		require_once('partials/facebook-event-radar-public-display.php');
	}

	function getEvents(){

		$location = $_POST['location'];

		$resp = $this->facebook->get('/search?type=event&q='. urldecode($location) .'&fields=id,attending_count,category,cover,description,start_time,end_time,name,place,type');
		$graph = $resp->getDecodedBody();

		die(json_encode($graph));
	}

	function getEventsMore(){

		$location = $_POST['location'];
		$after = $_POST['after'];

		$resp = $this->facebook->get('/search?type=event&q='.$location.'&after='.$after);
		$graph = $resp->getDecodedBody();

		die(json_encode($graph));
	}


}
