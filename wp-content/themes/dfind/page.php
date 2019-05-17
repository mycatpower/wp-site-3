<?php
/**
 * The page template file
 *
 *
 * @package WordPress
 * @subpackage dFind
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

    <div class="section section-heading">
        <div class="container">
            <h1 class="section-title"><?php the_title(); ?></h1>
        </div>
    </div>

    <div id="section-content" class="section section-content">
        <div class="container">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();

                    the_content();
                }
            }
            ?>
        </div>
    </div>

<?php get_footer(); ?>
