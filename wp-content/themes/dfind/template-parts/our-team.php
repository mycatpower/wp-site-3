<?php

/**
 * Template part for displaying Our team block
 *
 * @package Wordpress
 * @subpackage dFind
 * @since 1.0
 */
?>
<section class="section our-team-section">

    <div class="waveWrapper waveAnimation wave-on-top">
        <div class="waveWrapperInner bgTop waveRotate">
            <div class="wave waveTop"></div>
        </div>
    </div>

    <div id="what-you-find-team" class="section-content">
        <div class="container">
            <h2 class="section-title">
                <?php the_sub_field('heading'); ?>
            </h2>
            <div class="section-description">
                <?php the_sub_field('text_with_description1'); ?>
            </div>
            <h3 class="section-subtitle">
                <?php the_sub_field('subheading'); ?>
            </h3>
            <div class="section-description">
                <?php the_sub_field('text_with_description2'); ?>
            </div>
        </div>
    </div>
    <?php if (have_rows('reviews_slider')) : ?>
        <svg display="none">
            <defs></defs>
            <symbol id="pb-story-icon-flip" viewBox="0 0 30 30">
                <rect fill-rule="evenodd" clip-rule="evenodd" fill="none" width="30" height="30"></rect>
                <path d="M29,14c0-3.897-7.2134-6-14-6S1,10.103,1,14c0,2.6744,3.397,4.5032,7.7214,5.3879V17.361C5.0852,16.5517,3,15.1268,3,14
	c0-1.6704,4.5654-4,12-4s12,2.3296,12,4c0,1.3853-3.1492,3.2207-8.4645,3.8075V14.5l-6,4.5l6,4.5v-3.6931
	C24.0745,19.2109,29,17.2201,29,14z"></path>
            </symbol>
        </svg>
        <div class="section-slider">
            <div class="slider-wrapper">
                <div class="team-slider">
                    <?php while (have_rows('reviews_slider')) : the_row(); ?>
                        <div class="slide">
                            <div class="team-card-wrapper">
                                <div class="team-card">
                                    <div class="team-card__face team-card__front">
                                        <div class="team-card__overlay"></div>
                                        <div class="team-card__inner">
                                            <div class="team-card__personal align-items-center">
                                                <div class="team-card__avatar">
                                                    <?php
                                                    $photo = get_sub_field('photo');
                                                    if (!empty($photo) && is_array($photo)) {
                                                        $photo_src = $photo['sizes']['medium'];
                                                    } else {
                                                        $photo_src = get_stylesheet_directory_uri() . '/resources/assets/images/teammate.png';
                                                    }
                                                    ?>
                                                    <img src="<?php echo $photo_src ?>" alt="">
                                                </div>
                                                <div class="team-card__data">
                                                    <div class="team-card__name"><?php the_sub_field('name'); ?></div>
                                                    <div class="team-card__position"><?php the_sub_field('position'); ?></div>
                                                </div>
                                            </div>
                                            <div class="team-card__content">
                                                <?php the_sub_field('text'); ?>
                                            </div>
                                            <div class="flip-icon-container">
                                                <svg class="pb-flip-icon">
                                                    <use xlink:href="#pb-story-icon-flip"></use>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="team-card__face team-card__back">
                                        <div class="team-card__overlay"></div>
                                        <div class="team-card__inner">
                                            <div class="team-card__content">
                                                <?php the_sub_field('text_back'); ?>
                                            </div>
                                            <div class="team-card__name"><?php the_sub_field('name'); ?></div>
                                            <div class="team-card__position"><?php the_sub_field('position'); ?></div>

                                            <div class="team-card__social">
                                                <?php if ($xing = get_sub_field('xing2')) : ?>
                                                    <a href="<?php echo $xing; ?>" target="_blank">
                                                        <i class="df df-xing2"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if ($linkedin = get_sub_field('linkedin')) : ?>
                                                    <a href="<?php echo $linkedin; ?>" target="_blank">
                                                        <i class="df df-linkedin"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if ($facebook = get_sub_field('facebook')) : ?>
                                                    <a href="<?php echo $facebook ?>" target="_blank">
                                                        <i class="df df-facebook1"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                            <div class="flip-icon-container">
                                                <svg class="pb-flip-icon">
                                                    <use xlink:href="#pb-story-icon-flip"></use>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="slider-arrows">
                    <div class="team-slider-arrow team-arrow-prev">
                        <i class="df df-angle-left"></i>
                    </div>
                    <div class="team-slider-arrow team-arrow-next">
                        <i class="df df-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>