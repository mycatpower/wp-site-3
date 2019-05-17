<?php

/**
 * Template part for displaying Digital block
 *
 * @package Wordpress
 * @subpackage dFind
 * @since 1.0
 */
?>
<section id="what-you-find-we-work" class="section digital-section">
    <div class="section-content">
        <div class="container">
            <h2 class="section-title"><?php the_sub_field('heading'); ?></h2>
            <?php if (have_rows('description')) : ?>
                <div class="block-content">
                    <?php while (have_rows('description')) : the_row(); ?>
                        <div class="block">
                            <div class="block__title"><?php the_sub_field('title'); ?></div>
                            <div class="block__text"><?php the_sub_field('description'); ?></div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <h3 class="section-subtitle"><?php the_sub_field('subheading'); ?></h3>
            <div class="section-description">
                <?php the_sub_field('text_with_description'); ?>
            </div>
        </div>
    </div>
</section>