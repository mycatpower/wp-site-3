<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="fullPage">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage dFind
 * @since 1.0
 * @version 1.0
 */

?><!doctype html>
<!--[if IE 8 ]> <html class="ie8"> <![endif]-->
<!--[if IE 9 ]> <html class="ie9"> <![endif]-->
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php
        $favicon = get_stylesheet_directory_uri() . '/resources/assets/images/favicon.ico';
    ?>
    <link rel="icon" type="image/x-icon" href="<?php echo $favicon; ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $favicon; ?>">


    <script type="text/javascript">var background_mode="sphere";var background_sphere_background_color="#0c2e53";var background_sphere_dot_color="#ffed00";var background_sphere_line_color="#0fb6cc";var background_sphere_rotation_speed=10;var background_sphere_distance=30;var background_parallax_effect_toggle=1;var background_parallax_effect_friction_x=0.86;var background_parallax_effect_friction_y=0.86;var background_parallax_effect_invert=1;var background_particle_effect_toggle=1;var background_particle_effect_toggle=1;var background_particle_effect_activation_radius=200;var background_particle_effect_particle_amount=180;var background_particle_effect_particle_speed=10;var background_particle_effect_particle_color="rgba(255,255,255,0.65)";var background_particle_effect_line_color="rgba(255,255,255,0.65)";</script>		<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
    <?php wp_head(); ?>
</head>
<body <?php body_class('compose-mode'); ?>>
<h2 id="ie7lower">
    <p>Please, use a different browser for our website</p>
</h2>

<div class="page-wrapper">
    <?php do_action('df_before_header'); ?>

    <header id="header" class="header <?php echo (!is_front_page()) ? 'sticky' : ''; ?>">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <?php
                if ($logo = get_field('header_logo', 'option')) : ?>
                    <a class="navbar-brand" href="<?php echo home_url(); ?>">
                        <img src="<?php echo $logo['sizes']['medium']; ?>" alt="dFind">
                    </a>
                <?php endif; ?>
                <a class="sticky-brand" href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/resources/assets/images/logo-footer.png' ?>" alt="dFind">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <img class="sticky-brand-logo" src="<?php echo get_stylesheet_directory_uri() . '/resources/assets/images/logo-footer.png' ?>" alt="dFind">
                    <?php
                    if ( has_nav_menu( 'header_menu' ) ) {
                        // Print top menu
                        dfind_header_menu();
                    }
                    ?>
                    <a href="tel:<?php echo str_replace(' ', '', get_field('phone', 'option')); ?>">
                        <div class="cta">
                            <div class="phone">
                                <img src="<?php echo get_stylesheet_directory_uri() . '/resources/assets/images/phone.png'; ?>" alt="">
                            </div>
                            <span><?php _e('Contact Us', THEME_OPT); ?></span>
                        </div>
                    </a>
                </div>
            </nav>
        </div>
    </header>
