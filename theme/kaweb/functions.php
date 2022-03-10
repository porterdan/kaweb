<?php
/**
* Kaweb Theme Functions
*
* Enqueue scripts & styles.
*/

function kaweb_scripts_enqueue(){

	// Register & Enqueue jQuery
	wp_register_script('jquery','//code.jquery.com/jquery-3.6.0.min.js',null, true);
	wp_enqueue_script('jquery');

	// Register & Enqueue Bootstrap JS
	wp_register_script('bootstrap', get_template_directory_uri().'/inc/js/bootstrap.min.js', array('jquery'),'1.13.1', true);
	wp_enqueue_script('bootstrap');

	// Load Google Fonts
	wp_register_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap', false);
	wp_enqueue_style('google-fonts');
	

    // Register & Enqueue Bootstrap CSS
	wp_register_style('bootstrap', get_template_directory_uri().'/inc/css/bootstrap.min.css', true);
	wp_enqueue_style('bootstrap');

	// Register & Enqueue Theme CSS & Check for child.
	wp_register_style('kaweb', get_stylesheet_directory_uri().'/style.css', true);
	wp_enqueue_style('kaweb');

}
add_action( 'wp_enqueue_scripts', 'kaweb_scripts_enqueue' );  


/**
 * Add featured image support in theme
 */

function kaweb_allow_featured() {
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'kaweb_allow_featured' );

/**
 * Register navigation menus
 */

function kaweb_register_navs() {
	register_nav_menus(
		array(
			'top-nav' => __( 'Top Navigation' ),
			'main-nav' => __( 'Main Navigation' ),
			'footer-nav' => __( 'Footer Navigation' )
		)
	);
}
add_action( 'init', 'kaweb_register_navs' );
