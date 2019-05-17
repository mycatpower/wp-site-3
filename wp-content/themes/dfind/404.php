<?php
/**
 * The 404 template file
 *
 *
 * @package WordPress
 * @subpackage dFind
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

    <div class="section section-single">
        <div class="container">
            <h1 class="section-title">404</h1>
            <p><?php _e('Page not found', THEME_OPT); ?></p>
        </div>
    </div>

<?php get_footer(); ?>