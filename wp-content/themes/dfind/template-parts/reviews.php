<?php

/**
 * Template part for displaying Reviews block
 *
 * @package Wordpress
 * @subpackage dFind
 * @since 1.0
 */
?>

<?php if (have_rows('slider')) :  ?>
<section class="section reviews-section">
    <div class="section-rectangle"></div>
    <div class="section-content">
        <div class="reviews-slider-arrow-mobile arrow-left reviews-arrow-prev">
            <i class="df df-angle-left"></i>
        </div>
        <div class="reviews-slider-arrow-mobile arrow-right reviews-arrow-next">
            <i class="df df-angle-right"></i>
        </div>
        <div class="reviews-slider">
                <?php while (have_rows('slider')) : the_row(); ?>
                    <div class="slide">
                        <div class="slide__body">
                            <div class="slide__text-wrap">
                                <div class="slide__text"><?php the_sub_field('text'); ?></div>
                                <div class="slide__author">
                                    <div class="slide__author-avatar">
                                        <?php
                                        $author = get_sub_field('photo');
                                        if (!empty($author) && is_array($author)) {
                                            $author_src = $author['sizes']['large'];
                                        } else {
                                            $author_src = get_stylesheet_directory_uri() . '/resources/assets/images/reviews-author.png';
                                        }
                                        ?>
                                        <img src="<?php echo $author_src; ?>" alt="">
                                    </div>
                                    <div class="slide__author-data">
                                        <div class="slide__author-name"><?php the_sub_field('name'); ?></div>
                                        <div class="slide__author-position"><?php the_sub_field('position'); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $image = get_sub_field('image');
                        if (!empty($image) && is_array($image)) {
                            $image_src = $image['url'];
                        } else {
                            $image_src = get_stylesheet_directory_uri() . '/resources/assets/images/reviews-image.png';
                        }
                        ?>
                        <div class="slide__image" style="background-image: url(<?php echo $image_src; ?>);"></div>
                    </div>
                <?php endwhile; ?>
            </div>
        <div class="reviews-bottom">
            <div class="slider-arrows">
                <div class="reviews-slider-arrow reviews-arrow-prev">
                    <i class="df df-angle-left"></i>
                </div>
                <div class="reviews-slider-arrow reviews-arrow-next">
                    <i class="df df-angle-right"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<?php endif;
