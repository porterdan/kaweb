<?php
/**
 * Plugin Name: Wally's Widget
 * Description: Inform WW Staff on how many packs to send.
 * Version:     1.0.0
 * Date:        10th March 2022
 * Author:		 Dan Porter
 * Author URI:  https://kaweb.onlinedan.co.uk
 * Text Domain: wallys-widgets
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'WW_VERSION' ) ) {
	define( 'WW_VERSION', '1.0.0' );
}

if ( ! defined( 'WW_DIR' ) ) {
	define( 'WW_DIR', untrailingslashit( dirname( __FILE__ ) ) );
}

if ( ! defined( 'WW_BASENAME' ) ) {
	define( 'WW_BASENAME', plugin_basename( __FILE__ ) );
}

if ( ! defined( 'WW_URL' ) ) {
	define( 'WW_URL', untrailingslashit( plugins_url( '', __FILE__ ) ) );
}


if ( ! class_exists( 'Wallys_Widget' ) ) {
	class Wallys_Widget {

		/**
		 * @var     Wallys_Widget   $instance  The only instance of Wallys_Widget
		 * @since   1.0
		 */

		private static $instance;
		public $packs;


		public static function instance() {			

			if ( ! self::$instance ) {

				self::$instance = new Wallys_Widget();
				self::$instance->ww_includes();
				self::$instance->ww_hooks();

			}

			return self::$instance;
		} // instance()

		/**
		 * Enqueue JS & CSS
		 *
		 * @since   1.0
		 */

		public static function ww_enqueue(){

			// Include Javascript to return calculation results
			wp_enqueue_script('ww-process', WW_URL.'/js/process.js', array('jquery'), '', true);

			// Send wwvars params to ww-process script
			wp_localize_script('ww-process', 'wwvars', array(
				'ajaxurl' => admin_url('admin-ajax.php')
			));

			// Include Plugin CSS
			wp_enqueue_style('ww-main', WW_URL.'/css/main.min.css', true);
		}

		/**
		 * Required files & classes
		 *
		 * @since   1.0
		 */

		public static function ww_includes(){
			require_once( WW_DIR.'/classes/pack.class.php' );
		}

		/**
 		 * Builds the shortcode [pack-calculator]
 		 * 
 		 * @since   1.0
 		 */

		public static function ww_shortcode( $content=null ) {
			ob_start();
			include( WW_DIR .'/templates/widget.php');
			return ob_get_clean();
		}


		/**
		 * Hooks
		 *
		 * @since   1.0
		 */

		public function ww_hooks() {

			$pack = new Packs();

			add_action( 'wp_enqueue_scripts', array( __CLASS__, 'ww_enqueue' ) );
			add_shortcode('pack-calculator', array( __CLASS__, 'ww_shortcode') );

			if (is_user_logged_in()){
				add_action('wp_ajax_pack_calculate', $pack->ww_packcalculate());
			} else {
				add_action('wp_ajax_nopriv_pack_calculate', $pack->ww_packcalculate());
			}
		} // hooks


	}

}

/**
 * Runs the instance
 *
 * @since  1.0
 */

function WW_Plugin() {
	return Wallys_Widget::instance();
} // WW_Plugin
add_action( 'plugins_loaded', 'WW_Plugin' );