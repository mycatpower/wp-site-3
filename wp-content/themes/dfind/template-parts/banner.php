<?php

/**
 * Template part for displaying Banner block
 *
 * @package Wordpress
 * @subpackage dFind
 * @since 1.0
 */

$banner_logo = get_sub_field('image');
if (!empty($banner_logo) && is_array($banner_logo)) {
    $logo_src = $banner_logo['sizes']['medium'];
} else {
    $logo_src = get_template_directory_uri() . '/resources/assets/images/banner-label.png';
}
?>
<!-- Space background -->
<section id="banner-block" class="section menu-section banner-block">
    <div class="banner-section grcs_background_content">
        <div class="level-1">
            <div id="canvas" class="init">
                <canvas class="bg-effect layer" data-depth="0.2"></canvas>
                <div>
                    <canvas width="1422" height="1082" style="width: 1422px; height: 1082px;"></canvas>
                </div>
            </div>
        </div>
        <div class="level-2">
            <div class="bg-image layer" data-depth="0.04"></div>
            <div class="bg-video layer" data-depth="0.04"></div>
            <div class="bg-color layer" data-depth="0.04"></div>
        </div>
    </div>

    <!-- Banner content -->
    <div class="banner-content">
        <div class="banner-content-wrap">
            <div class="section-logo text-center">
                <img src="<?php echo $logo_src; ?>" alt="dFind">
            </div>

            <div class="section-title df_text_slider">
                <div class="slide">
                    <h2>
                        <?php the_sub_field('text_heading_1'); ?>
                    </h2>
                </div>
                <div class="slide">
                    <h2>
                        <?php the_sub_field('text_heading_2'); ?>
                    </h2>
                </div>
            </div>
            <div class="section-description">
                <?php the_sub_field('text_under_the_heading'); ?>
            </div>
        </div>
        <a href="#" class="scroll-down">
            <i class="df df-arrow-down"></i>
        </a>
    </div>

    <!--    <div class="wave-wrapper">-->
<!--        <div class="wave-animation">-->
<!--            <div class="wave-animation__group" style="margin-top: -50px">-->
<!--                --><?php
//                echo get_wave('#f7fb00', 20, 0);
//                echo get_wave('#f7fb00', 20, 0);
//                ?>
<!--            </div>-->
<!--            <div class="wave-animation__group" style="margin-top: -25px">-->
<!--                --><?php
//                echo get_wave('rgba(15, 182, 204, 0.5)', 22, -5);
//                echo get_wave('rgba(15, 182, 204, 0.5)', 22, -5);
//                ?>
<!--            </div>-->
<!--            <div class="wave-animation__group">-->
<!--                --><?php
//                echo get_wave('#fff', 24, -10);
//                echo get_wave('#fff', 24, -10);
//                ?>
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <div class="banner-wave">
        <img class="wave" src="<?php echo get_stylesheet_directory_uri() . '/resources/assets/images/banner-wave.png'?>" alt="">
    </div>
</section>
