<?php
/**
 * dFind: Nav Menus
 *
 * @package WordPress
 * @subpackage dFind
 * @since 1.0
 */

include_once 'nav-classes/dfind_top_walker_menu.php';

/**
 * Header Menu
 *
 */
function dfind_header_menu() {
    // main navigation menu
    $args = array(
        'theme_location'    => 'header_menu',
        'container'         => false,
        'menu_class'        => 'navbar-nav',
        'walker'            => new Dfind_top_walker_menu,
    );

    // print menu
    wp_nav_menu( $args );
}

/**
 * Footer Menu
 *
 */
function dfind_footer_menu() {
    // main navigation menu
    $args = array(
        'theme_location'    => 'footer_menu',
        'container'         => false,
        'menu_class'        => 'text-right',
    );

    // print menu
    wp_nav_menu( $args );
}

/**
 * Footer Bottom menu
 *
 */
function dfind_footer_bottom_menu() {
    // main navigation menu
    $args = array(
        'theme_location'    => 'footer_bottom',
        'container'         => false,
        'menu_class'        => '',
    );

    // print menu
    wp_nav_menu( $args );
}
