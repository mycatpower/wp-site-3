<?php

/**
 * Template part for displaying Blog block
 *
 * @package Wordpress
 * @subpackage dFind
 * @since 1.0
 */
?>

<section id="blog" class="section menu-section blog-section">
    <div class="section-content">
        <div class="container">
            <h2 class="section-title"><?php the_sub_field('title'); ?></h2>
            <h3 class="section-subtitle">
                <?php the_sub_field('subtitle'); ?>
            </h3>
            <div class="section-description">
                <?php the_sub_field('description'); ?>
            </div>

            <?php
            $articles = new WP_Query([
               'posts_per_page' => 6,
               'post_type'      => 'post',
               'post_status'    => 'publish',
            ]);

            if ($articles->have_posts()) : ?>
                <div class="row">
                    <?php while ($articles->have_posts()) :
                        $articles->the_post();

                        $img = get_the_post_thumbnail_url( get_the_ID(), 'medium' );

                        // display articles
                        echo get_post_preview($img, true);

                    endwhile;
                    wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>
            <div class="col-12 text-center">
                <a href="<?php echo home_url('/blog/'); ?>" class="blog-show-more">
                    <?php the_sub_field('button_label'); ?>
                    <i class="df df-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
