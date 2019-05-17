<?php

/**
 * Template part for displaying Other employees block
 *
 * @package Wordpress
 * @subpackage dFind
 * @since 1.0
 */
?>
<section class="section other-employees-section">
    <div class="section-content">
        <div class="container">
            <h3 class="section-title"><?php the_sub_field('subheading_second'); ?></h3>
            <div class="section-description">
                <?php the_sub_field('text_with_description'); ?>
            </div>
        </div>
    </div>
    <div class="section-board">
        <div class="board-wrapper">
            <div class="container">
                <div class="team-board">
                    <h4 class="team-board__title"><?php the_sub_field('title'); ?></h4>
                    <div class="team-board__description">
                        <?php the_sub_field('description'); ?>
                    </div>
                    <div class="team-board__logo-wrap">
                        <div class="team-board__logo">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/resources/assets/images/logo_color.png'; ?>">
                        </div>
                    </div>
                    <?php if (have_rows('scheme_with_employees')) :
                        $count = 1;
                        ?>
                        <div class="team-board__teammates">
                            <?php while (have_rows('scheme_with_employees')) : the_row(); ?>
                                <div class="teammate teammate-<?php echo $count; ?>">
                                    <?php
                                        $photo = get_sub_field('photo');
                                        if (!empty($photo) && is_array($photo)) {
                                            $photo_src = $photo['sizes']['medium'];
                                        } else {
                                            if (file_exists(get_template_directory() . "/resources/assets/images/team$count.png")) {
                                                $photo_src = get_stylesheet_directory_uri() . "/resources/assets/images/team$count.png";
                                            } else {
                                                $photo_src = get_stylesheet_directory_uri() . '/resources/assets/images/team1.png';
                                            }
                                        }
                                    ?>
                                    <img src="<?php echo $photo_src; ?>"
                                         data-toggle="popover"
                                         data-trigger="hover"
                                         data-placement="top"
                                         data-html="true"
                                         title="<?php the_sub_field('name') ?>"
                                         data-content='<div class="text-uppercase"><?php the_sub_field('position'); ?></div>'
                                         alt=""
                                     >
                                    <div class="teammate__card">
                                        <div class="teammate__card-name"><?php the_sub_field('name') ?></div>
                                        <div class="teammate__card-position"><?php the_sub_field('position'); ?></div>
                                    </div>

                                    <?php
                                    $lines = get_sub_field('lines');

                                    if (is_array($lines)) :
                                        foreach (get_sub_field('lines') as $line) : ?>
                                            <div class="line" data-to="<?php echo $line; ?>"></div>
                                    <?php endforeach;
                                    endif;
                                    ?>
                                </div>
                            <?php
                                $count++;
                            endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="waveWrapper waveAnimation wave-on-bottom">
        <div class="waveWrapperInner bgTop">
            <div class="wave waveTop"></div>
        </div>
    </div>
</section>