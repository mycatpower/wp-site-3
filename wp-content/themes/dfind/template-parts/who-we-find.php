<?php

/**
 * Template part for displaying Who we find block
 *
 * @package Wordpress
 * @subpackage dFind
 * @since 1.0
 */
?>

<section id="who-we-find" class="section menu-section who-we-find-section">
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
    <div id="who-we-find-team" class="section-tabs">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link left active" id="pills-market-tab" data-toggle="pill" href="#pills-market" role="tab" aria-controls="pills-market" aria-selected="true"><?php the_sub_field('first_tab_name'); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link right" id="pills-position-tab" data-toggle="pill" href="#pills-position" role="tab" aria-controls="pills-position" aria-selected="false"><?php the_sub_field('second_tab_name'); ?></a>
            </li>
        </ul>
        <?php if (have_rows('tabs')) :
            $i = 1;
            ?>
            <div class="tab-content" id="pills-tabContent">
                <?php while (have_rows('tabs')) : the_row();
                    if ($i === 1) : ?>
                        <div class="tab-pane fade show active" id="pills-market" role="tabpanel" aria-labelledby="pills-market-tab">
                            <div class="target-wrapper">
                                <div class="container">
                                    <div class="target-board">
                                        <div class="target-board__logo">
                                            <img src="<?php echo get_stylesheet_directory_uri() . '/resources/assets/images/logo_color.png'; ?>" alt="">
                                        </div>
                                        <h4 class="target-board__title"><?php the_sub_field('title'); ?></h4>
                                        <div class="target-board__description">
                                            <?php the_sub_field('description'); ?>
                                        </div>
                                        <?php if (have_rows('items')) :
                                            $count = 1;
                                            ?>
                                        <div class="target-board__items">
                                            <?php while (have_rows('items')) : the_row(); ?>
                                                <div class="target-item item<?php echo $count; ?>"
                                                     data-toggle="popover"
                                                     data-trigger="hover"
                                                     data-placement="top"
                                                     data-html="true"
                                                     data-content='<div class="text-large text-center" style="font-family:Roboto,sans-serif;
                                                        font-weight: normal;line-height: 24px;font-size: 16px;">
                                                        <?php the_sub_field('body'); ?></div>'
                                                >
                                                    <?php the_sub_field('title'); ?>
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
                    <?php else : ?>
                        <div class="tab-pane fade" id="pills-position" role="tabpanel" aria-labelledby="pills-position-tab">
                            <div class="target-wrapper">
                                <div class="container">
                                    <div class="target-board">
                                        <div class="target-board__logo">
                                            <img src="<?php echo get_stylesheet_directory_uri() . '/resources/assets/images/logo_color.png'; ?>" alt="">
                                        </div>
                                        <h4 class="target-board__title"><?php the_sub_field('title'); ?></h4>
                                        <div class="target-board__description">
                                            <?php the_sub_field('description'); ?>
                                        </div>
                                        <?php if (have_rows('items')) :
                                            $counter = 1;
                                        ?>
                                            <div class="target-board__items">
                                                <?php while (have_rows('items')) : the_row(); ?>
                                                    <div class="target-item item<?php echo $counter; ?>">
                                                        <?php the_sub_field('title'); ?>
                                                    </div>
                                                <?php
                                                    $counter++;
                                                endwhile; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif;
                    $i++;
                endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>