<?php

/**
 * Template part for displaying Reviews with floating waves block
 *
 * @package Wordpress
 * @subpackage dFind
 * @since 1.0
 */
?>

<section class="section reviews-waves-section">
    <div class="section-content">
        <div class="container">
            <div class="quotes text-center">
                <img src="<?php echo get_stylesheet_directory_uri() . '/resources/assets/images/quotes.png'; ?>" alt="">
            </div>
            <?php if (have_rows('reviews')) : ?>
                <div class="reviews-waves-slider">
                    <?php while (have_rows('reviews')) : the_row(); ?>
                        <div class="slide">
                            <div class="slide__text">
                                <?php the_sub_field('body'); ?>
                            </div>
                            <div class="slide__author">
                                <?php
                                $avatar = get_sub_field('photo');

                                if (!empty($avatar) && is_array($avatar)) {
                                    $avatar_src = $avatar['sizes']['medium'];
                                } else {
                                    if (file_exists(get_template_directory() . '/resources/assets/images/reviews-waves-author.png')) {
                                        $avatar_src = get_stylesheet_directory_uri() . '/resources/assets/images/reviews-waves-author.png';
                                    } else {
                                        $avatar_src = false;
                                    }
                                }

                                if ($avatar_src) :
                                ?>
                                    <div class="slide__author-avatar text-center">
                                        <img src="<?php echo $avatar_src; ?>" alt="">
                                    </div>
                                <?php endif; ?>
                                <div class="slide__author-name text-center"><?php the_sub_field('name'); ?></div>
                                <div class="slide__author-position text-center"><?php the_sub_field('position'); ?></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <div class="slider-arrows">
                <div class="reviews-slider-arrow reviews-waves-arrow-prev">
                    <i class="df df-angle-left"></i>
                </div>
                <div class="reviews-slider-arrow reviews-waves-arrow-next">
                    <i class="df df-angle-right"></i>
                </div>
            </div>
        </div>
    </div>
</section>