<?php

/**
 * Template part for displaying Ready to get started block
 *
 * @package Wordpress
 * @subpackage dFind
 * @since 1.0
 */
?>
<section class="section ready-section">
    <div class="section-content">
        <div class="container">
            <div class="bubbles text-center">
                <img src="<?php echo get_stylesheet_directory_uri() . '/resources/assets/images/bubbles.png'; ?>" alt="">
            </div>
            <div class="ready-block text-center">
                <h3 class="ready-block__title"><?php the_sub_field('title') ?></h3>
                <a href="<?php the_sub_field('button_link'); ?>" class="ready-block__link">
                    <?php the_sub_field('button_text'); ?>
                    <i class="df df-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>