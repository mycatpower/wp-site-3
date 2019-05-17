<?php

/**
 * Template part for displaying What you find block
 *
 * @package Wordpress
 * @subpackage dFind
 * @since 1.0
 */
?>

<section id="what-you-find" class="section menu-section what-you-find-section">
    <div class="section-content">
        <div class="container">
            <h2 class="section-title"><?php the_sub_field('heading'); ?></h2>
            <h3 class="section-subtitle"><?php the_sub_field('subheading'); ?></h3>
            <div class="section-description text-center">
                <?php the_sub_field('text_with_description'); ?>
            </div>
        </div>
    </div>
</section>
