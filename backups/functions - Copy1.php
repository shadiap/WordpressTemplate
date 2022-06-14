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
	if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
	} else {
		// File exists... require it.
		require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
	}
}

add_action( 'after_setup_theme', 'register_navwalker' );
function prefix_modify_nav_menu_args( $args ) {
    return array_merge( $args, array(
        'walker' => new WP_Bootstrap_Navwalker(),
    ) );
}

add_filter( 'wp_nav_menu_args', 'prefix_modify_nav_menu_args' );
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
add_filter( 'nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3 );

function prefix_bs5_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}
function slug_provide_walker_instance( $args ) {
    if ( isset( $args['walker'] ) && is_string( $args['walker'] ) && class_exists( $args['walker'] ) ) {
        $args['walker'] = new $args['walker'];
    }
    return $args;
}
add_filter( 'wp_nav_menu_args', 'slug_provide_walker_instance', 1001 );