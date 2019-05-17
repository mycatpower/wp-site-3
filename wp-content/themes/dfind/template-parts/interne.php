<?php

/**
 * Template part for displaying Interne block
 *
 * @package Wordpress
 * @subpackage dFind
 * @since 1.0
 */
?>
<section class="section interne-section">
    <div id="particles-js"></div>
    <div class="section-content">
        <div class="container">
            <h2 class="section-title">
                <?php the_sub_field('heading'); ?>
            </h2>
            <div class="section-description">
                <?php the_sub_field('description'); ?>
            </div>
            <?php if (have_rows('content_block')) : ?>
                <div class="block-content">
                    <?php $i = 1; ?>
                    <?php while (have_rows('content_block')) : the_row(); ?>
                        <?php if ($i % 2 != 0) : ?>
                            <div class="block">
                                <div class="block__image" data-show-from="left">
                                    <?php
                                    $image = get_sub_field('image');
                                    if (!empty($image) && is_array($image)) {
                                        $image_src = $image['sizes']['large'];
                                    } else {
                                        $image_src = get_stylesheet_directory_uri() . '/resources/assets/images/image_int1.png';
                                    }
                                    ?>
                                    <img src="<?php echo $image_src; ?>" alt="">
                                </div>
                                <div class="block__text">
                                    <div class="block__title"><?php the_sub_field('title'); ?></div>
                                    <div class="block__body">
                                        <?php the_sub_field('description'); ?>
                                    </div>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="block">
                                <div class="block__text">
                                    <div class="block__title"><?php the_sub_field('title'); ?></div>
                                    <div class="block__body">
                                        <?php the_sub_field('description'); ?>
                                    </div>
                                </div>
                                <div class="block__image" data-show-from="right">
                                    <?php
                                    $image = get_sub_field('image');
                                    if (!empty($image) && is_array($image)) {
                                        $image_src = $image['sizes']['large'];
                                    } else {
                                        $image_src = get_stylesheet_directory_uri() . '/resources/assets/images/image_int1.png';
                                    }
                                    ?>
                                    <img src="<?php echo $image_src; ?>" alt="">
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php $i++; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>