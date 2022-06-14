<?php
class Wdm_Custom_Nav_Walker extends Walker_Nav_Menu {
public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
/* -Wdm changes- */
//Getting post id of current page
    $wdm_postid    = url_to_postid( $item->url );
//$have_children var keeps record of the children of the current page
    $have_children    = false;
//wdm_has_children() function is a function I've written in functions.php, that checks the children of a post from its post id.
    if ( wdm_has_children( $wdm_postid ) ) {
       $have_children = true;
    }
//If the current page has a child, I assign my own CSS class- wdm-has-child.
    if ( $have_children ) {
       $classes[] = 'wdm-has-child menu-item-' . $item->ID;
    } else {
       $classes[] = 'menu-item-' . $item->ID;
    }
    /* -End of Wdm changes- */
    $class_names    = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
    $class_names    = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $id    = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
    $id    = $id ? ' id="' . esc_attr( $id ) . '"' : '';
    $output .= $indent . '<li' . $id . $class_names . '>';
    $atts            = array();
    $atts[ 'title' ]    = ! empty( $item->attr_title ) ? $item->attr_title : '';
    $atts[ 'target' ]    = ! empty( $item->target ) ? $item->target : '';
    $atts[ 'rel' ]        = ! empty( $item->xfn ) ? $item->xfn : '';
    $page_name = apply_filters( 'the_title', $item->title, $item->ID );
    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
    $attributes = '';
    foreach ( $atts as $attr => $value ) {
       if ( ! empty( $value ) ) {
        $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
        $attributes .= ' ' . $attr . '="' . $value . '"';
       }
    }
/* -Wdm changes- */
//Bootstrap icons - right arrow and down arrow.
    $wdm_right_arrow = ' <span class="glyphicon glyphicon-chevron-right"></span>';
    $wdm_down_arrow = ' <span class="glyphicon glyphicon-chevron-down"></span>';
/* -End of Wdm changes- */
    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    /** This filter is documented in wp-includes/post-template.php */
    /* -Wdm changes- */
    if( $have_children && 'Home' != $page_name ) {
//If the page title is Architectural, I assign to it a right arrow.
       if( 'Architectural' == $page_name ) {
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $wdm_right_arrow . $args->link_after;
       }else{
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $wdm_down_arrow .$args->link_after;
       }
    }else{
       $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    }
    /* -End of Wdm changes- */
    $item_output .= '</a>';
    $item_output .= $args->after;
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
   }
public function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= "</li>\n";
   }
}