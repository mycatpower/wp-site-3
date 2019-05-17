<?php

/**
 * Template part for displaying Facts about dFind block
 *
 * @package Wordpress
 * @subpackage dFind
 * @since 1.0
 */
?>
<section id="facts-block" class="section facts-section">

    <?php if (have_rows('first_block')) : ?>
    <div class="section-nav">
        <div class="container">
            <div class="row align-items-center">
                <?php while (have_rows('first_block')) : the_row(); ?>
                    <div class="col-lg-3 icon-block-wrap">
                        <?php
                        $scroll_to = get_sub_field('scroll_to');
                        ?>
                        <div class="icon-block" data-show-from="<?php the_sub_field('appearance'); ?>">
                            <div class="icon-block__icon">
                                <?php if (get_sub_field('icon') === 'building') : ?>
                                    <img src="<?php echo get_stylesheet_directory_uri() . '/resources/assets/images/building.svg'; ?>" alt="">
                                <?php else : ?>
                                    <i class="df df-<?php the_sub_field('icon'); ?>"></i>
                                <?php endif; ?>
                            </div>
                            <div class="icon-block__title">
                                <a href="#<?php echo $scroll_to; ?>">
                                    <?php the_sub_field('title'); ?>
                                </a>
                            </div>
                            <?php if ($scroll_to === 'how-we-find') : ?>
                                <div class="icon-block__links">
                                    <a href="#<?php echo $scroll_to; ?>-team" class="link-item <?php echo $scroll_to; ?>-team">
                                        <?php the_sub_field('sub_text_1'); ?>
                                        <i class="df df-arrow-small"></i>
                                    </a>
                                </div>
                            <?php elseif ($scroll_to === 'blog') : ?>
                                <div class="icon-block__links">
                                    <a href="#<?php echo $scroll_to; ?>" class="link-item <?php echo $scroll_to; ?>-team">
                                        <?php the_sub_field('sub_text_1'); ?>
                                        <i class="df df-arrow-small"></i>
                                    </a>
                                </div>
                            <?php else : ?>
                                <div class="icon-block__links">
                                    <a href="#<?php echo $scroll_to; ?>-team" class="link-item <?php echo $scroll_to; ?>-team">
                                        <?php the_sub_field('sub_text_1'); ?>
                                        <i class="df df-arrow-small"></i>
                                    </a>
                                    <a href="#<?php echo ($scroll_to === 'what-you-find') ? 'what-you-find-we-work' : $scroll_to . '-team' ?>"
                                       class="link-item <?php echo $scroll_to; ?>-we-work">
                                        <?php the_sub_field('sub_text_2'); ?>
                                        <i class="df df-arrow-small"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="section-content">
        <div class="container">
            <h3 class="section-subtitle text-center">
                <?php the_sub_field('title'); ?>
            </h3>
        </div>
        <?php if (have_rows('second_block')) : ?>
            <div class="counters">
                <?php while (have_rows('second_block')) : the_row(); ?>
                    <div class="fact">
                        <div class="fact-icon">
                            <i class="df df-<?php the_sub_field('icon'); ?>"></i>
                        </div>
                        <div class="fact-number counter" data-count="<?php the_sub_field('amount'); ?>">0</div>
                        <div class="fact-title"><?php the_sub_field('text'); ?></div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="waveWrapper waveAnimation wave-on-bottom">
        <div class="waveWrapperInner bgTop">
            <div class="wave waveTop"></div>
        </div>
    </div>
</section>
