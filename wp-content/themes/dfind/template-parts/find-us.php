<?php

/**
 * Template part for displaying Find Us block
 *
 * @package Wordpress
 * @subpackage dFind
 * @since 1.0
 */
?>
<section id="find-us" class="section menu-section find-us-section">
    <div class="section-content">
        <div class="container">
            <h2 class="section-title"><?php the_sub_field('title'); ?></h2>
            <div class="section-description">
                <?php the_sub_field('description'); ?>
            </div>
        </div>
    </div>
    <div class="section-contact">
        <div class="waveWrapper waveAnimation wave-on-top">
            <div class="waveWrapperInner bgTop waveRotate">
                <div class="wave waveTop waveWhite"></div>
            </div>
        </div>
        <div class="contact">
            <div class="contact__map">
                <div id="dfind_map"></div>
            </div>
            <div class="contact__block">
                <div class="contact__block-heading contact__block-item">
                    <?php
                    $contact_logo = get_sub_field('contact_logo');
                    if (!empty($contact_logo) && is_array($contact_logo)) {
                        $contact_logo_src = $contact_logo['sizes']['medium'];
                    } else {
                        $contact_logo_src = get_stylesheet_directory_uri() . '/resources/assets/images/contact-logo.png';
                    }
                    ?>
                    <img class="contact__block-logo"
                         src="<?php echo $contact_logo_src; ?>"
                         alt="dFind"
                    >
                </div>
                <div class="contact__block-address contact__block-item">
                    <h4 class="contact-title">
                        <i class="df df-location"></i>
                        <?php the_sub_field('address_title'); ?>
                    </h4>
                    <h5 class="company-name">
                        <?php the_sub_field('label'); ?>
                    </h5>
                    <div class="location">
                        <?php the_sub_field('address'); ?>
                    </div>
                </div>
                <div class="contact__block-line contact__block-item">
                    <h4 class="contact-title">
                        <i class="df df-mail"></i>
                        <?php the_sub_field('contacts_title'); ?>
                    </h4>
                    <?php if (have_rows('contacts')) :
                        while (have_rows('contacts')) : the_row(); ?>
                            <div class="line-item"><?php the_sub_field('line'); ?></div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>