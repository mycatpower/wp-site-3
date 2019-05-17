<?php

/**
 * Template part for displaying How we find block
 *
 * @package Wordpress
 * @subpackage dFind
 * @since 1.0
 */
?>
<section id="how-we-find" class="section menu-section how-we-find-section">
    <div class="section-content">
        <div class="container">
            <h2 class="section-title"><?php the_sub_field('title'); ?></h2>
            <h3 class="section-subtitle">
                <?php the_sub_field('subtitle'); ?>
            </h3>
            <div class="section-description">
                <?php the_sub_field('description'); ?>
            </div>
        </div>
    </div>
    <div class="how-we-find-waves">
        <div class="waveWrapper waveAnimation wave-on-top">
            <div class="waveWrapperInner bgTop waveRotate">
                <div class="wave waveTop"></div>
            </div>
        </div>
        <div class="waveWrapper waveAnimation wave-on-bottom">
            <div class="waveWrapperInner bgTop">
                <div class="wave waveTop"></div>
            </div>
        </div>
    </div>
    <div id="how-we-find-team" class="section-content">
        <div class="container">
            <div class="image-wrapper text-center">
                <?php
                $image = get_sub_field('image');
                if (!empty($image) && is_array($image)) {
                    $image_src = $image['sizes']['large'];
                } else {
                    $image_src = get_stylesheet_directory_uri() . '/resources/assets/images/human-technology.png';
                }
                ?>
                <img class="desktop-image" src="<?php echo $image_src; ?>" alt="Human technology">
                <?php
                $image_mob = get_sub_field('image_mobile');
                if (!empty($image_mob) && is_array($image_mob)) {
                    $image_mob_src = $image_mob['url'];
                } else {
                    $image_mob_src = get_stylesheet_directory_uri() . '/resources/assets/images/human-technology-mob.png';
                }
                ?>
                <img class="mobile-image" src="<?php echo $image_mob_src; ?>" alt="Human technology">
            </div>
        </div>
    </div>
</section>