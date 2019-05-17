<?php
/**
 * Plugin Name: dFind Preloader
 * Description: Custom preloader
 * Author: AMgrade WP Team
 * Version: 1.1
 */

// Constants
define('PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ));
define('PLUGIN_URL', plugin_dir_url( __FILE__ ));

// Include template
function preloader_template() {
    include_once PLUGIN_DIR_PATH . 'view/preloader.php';
}

add_action('df_before_header', 'preloader_template');

// Styles
function preloader_styles() {
    wp_register_style( 'preloader-style',PLUGIN_URL . 'assets/css/loader-style.css');
    wp_enqueue_style( 'preloader-style' );
}
add_action( 'wp_enqueue_scripts', 'preloader_styles' );

// Scripts
function preloader_scripts() {
    wp_register_script( 'preloader-script', PLUGIN_URL . 'assets/js/scripts.js', array('jquery') );
    wp_enqueue_script( 'preloader-script' );
}
add_action( 'wp_enqueue_scripts', 'preloader_scripts' );
