<?php
/**
 * Tavalor functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage dFind
 * @since 1.0
 */

define('THEME_OPT', 'dfind');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dfind_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
     * If you're building a theme based on Twenty Seventeen, use a find and replace
     * to change THEME_OPT to the name of your theme in all the template files.
     */
    load_theme_textdomain(THEME_OPT, get_stylesheet_directory().'/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // Add Solitek image sizes
    // add_image_size( 'user-icon', 170, 170, array( 'center', 'top') );

    // Set the default content width.
    $GLOBALS['content_width'] = 730;

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
        'header_menu'   => __( 'Header Menu', THEME_OPT ),
        'footer_menu'   => __( 'Footer Menu', THEME_OPT ),
        'footer_bottom' => __( 'Footer Bottom', THEME_OPT )
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ) );

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Image sizes
    add_image_size( 'mainimage', 1280, 720, true );
}

add_action( 'after_setup_theme', 'dfind_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dfind_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', THEME_OPT ),
        'id'            => 'sidebar',
        'description'   => __( 'Add widgets here to appear in your sidebar.', THEME_OPT ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'dfind_widgets_init' );

/**
 * Enqueue styles.
 */
function dfind_styles() {
    // Google fonts
    $query_args = array(
        'family' => 'Roboto:400,900|Open+Sans:400,700|Montserrat:300,400,500,700',
        'subset' => 'latin,latin-ext'
    );
    wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );

    // Theme stylesheet.
    wp_enqueue_style( 'dfind-style', get_stylesheet_uri() );
    // Main styles
    wp_enqueue_style( 'dfind-css', get_stylesheet_directory_uri() . '/resources/assets/css/styles.css' );
}
add_action( 'wp_enqueue_scripts', 'dfind_styles' );

/**
 * Enqueue scripts.
 */
function dfind_scripts() {
    // Google map
    wp_enqueue_script( 'dfind-map-js', get_stylesheet_directory_uri() . '/resources/assets/js/map.js', array(), null, true );
    wp_localize_script( 'dfind-map-js', 'df_localize', array(
        'ajaxurl'        => admin_url( 'admin-ajax.php' ),
        'nonce'          => wp_create_nonce( 'dfind-nonce' ),
        'marker'         => get_stylesheet_directory_uri() . '/resources/assets/images/marker.png',
    ));
    $google_map_key = 'AIzaSyApEwxCh7u4eEtqXJsf_7ac3ywIEPVNZfE';
    wp_enqueue_script('dfind-map', 'https://maps.googleapis.com/maps/api/js?key=' . $google_map_key .'&callback=initMap', array(), null, true);

    // Library scripts
    if (is_front_page()) {
        wp_enqueue_script( 'dfind-sphere-js', get_stylesheet_directory_uri() . '/resources/assets/js/sphere-scripts.min.js', array('jquery'), null, true );
    }
    wp_enqueue_script( 'dfind-libs-js', get_stylesheet_directory_uri() . '/resources/assets/js/libs-scripts.min.js', array('jquery'), null, true );

    // Main js
    if (is_front_page()) {
        wp_enqueue_script('dfind-js', get_stylesheet_directory_uri() . '/resources/assets/build/scripts.min.js', array('jquery', 'dfind-libs-js'), null, true);
    } else {
        wp_enqueue_script('dfind-js', get_stylesheet_directory_uri() . '/resources/assets/js/scripts.min.js', array('jquery', 'dfind-libs-js'), null, true);
    }
    wp_localize_script( 'dfind-js', 'df_localize', array(
        'ajaxurl'        => admin_url( 'admin-ajax.php' ),
        'nonce'          => wp_create_nonce( 'dfind-nonce' ),
        'particles'      => get_stylesheet_directory_uri() . '/resources/assets/js/inc/particles.json'
    ));
}
add_action( 'wp_enqueue_scripts', 'dfind_scripts' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 *
 * @since dFind 1.0
 */
function dfind_excerpt_more( $link ) {
    return '...';
}
add_filter( 'excerpt_more', 'dfind_excerpt_more' );

/**
 * Change Excerpt length
 *
 * @param $length
 * @return int
 */
function dfind_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'dfind_excerpt_length', 999 );


/**
 * Hide editor on pages.
 */
add_action( 'admin_init', 'hide_editor' );
function hide_editor() {
    $post_id = isset($_GET['post']) ? $_GET['post'] : '';
    if ( !isset( $post_id ) )
        return;

    // Hide the editor on the page titled 'Client Area'
    $slug = get_post_field( 'post_name', $post_id );
    if ($slug == 'home') {
        remove_post_type_support('page', 'editor');
    }
}

/**
 * Helpers
 */
require get_parent_theme_file_path('inc/helpers.php');
/**
 * Customizer additions.
 */
//require get_parent_theme_file_path( '/inc/customizer.php' );
/**
 * Custom nav menu
 */
require get_parent_theme_file_path( '/inc/dfind-nav-menu.php' );

/**
 * Actions
 */
require get_parent_theme_file_path( '/inc/actions.php' );

/**
 * AJAX handlers
 */
require get_parent_theme_file_path( '/inc/ajax-handlers.php' );

/**
 * Restrict mime types
 */
require get_parent_theme_file_path( '/inc/restrict-mime-types.php' );

/**
 * ACF Themes options
 */
require get_parent_theme_file_path( '/inc/acf-options.php' );

/**
 * Tiny MCE Editor
 */
require get_parent_theme_file_path( '/inc/tiny-mce-editor.php' );
