<?php
/**
 * EducateUp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EducateUp
 */

/*******************menu***********************/
/*function register_my_menus() {
	register_nav_menus(
	  array(
		'header-menu' => __( 'Header Menu' ),
		'extra-menu' => __( 'Extra Menu' )
	   )
	 );
   }*/
register_nav_menus( array(
    'primary' => __( 'test', 'Sophia' ),
) );
register_nav_menu('test', 'primary');

function sophia_enqueue_style() {
   wp_enqueue_style( 'style', get_stylesheet_uri() );
   wp_enqueue_style( 'style', get_template_directory_uri() . '/css/input.css',false,'1.1','all');
}
function themeslug_enqueue_style() {
   wp_enqueue_style( 'style', get_stylesheet_uri() );
   wp_enqueue_style( 'style', get_template_directory_uri() . '/css/styles.css',false,'1.1','all');
}
add_action( 'wp_enqueue_scripts', 'sophia_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );
add_filter( 'nav_menu_link_attributes', function($atts) {
	$atts['class'] = "link-success nav-link";
        	return $atts;
}, 100, 1 );

function wpdocs_custom_dropdown_class( $classes ) {
    $classes[] = 'dropdown-menu';
    return $classes;
}
add_filter( 'nav_menu_submenu_css_class', 'wpdocs_custom_dropdown_class' );

function register_navwalker(){
	if ( ! file_exists( get_template_directory() . '/bootstrap_5_wp_nav_menu_walker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
	} else {
		// File exists... require it.
		require_once get_template_directory() . '/bootstrap_5_wp_nav_menu_walker.php';
	}
}
add_action( 'after_setup_theme', 'register_navwalker' );
