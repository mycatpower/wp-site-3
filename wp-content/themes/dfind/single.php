<?php
/**
 * Template Name: Blog
 *
 *
 * @package    WordPress
 * @subpackage dFind
 * @since      1.0
 * @version    1.0
 */

get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <main class="single-content">
        <section class="heading-single">
            <div class="container">
                <div class="blog-item-slider">
                    <div class="blog-item-slider__tag">
                        <?php //todo: remove hardcode ?>
                        GESPONSERTER ARTIKEL
                    </div>

                    <div class="blog-item-slider__title">
                        <?php the_title(); ?>
                    </div>

                    <div class="blog-item-slider__info">
                        <div class="blog-item-slider__info--date">
                            <?php the_article_date(); ?>
                        </div>

                        <div class="blog-item-slider__info--read">
                            <i class="far fa-clock"></i>
                            <?php the_field('duration'); ?>
                        </div>
                    </div>

                    <?php do_action('dfind/social_sharing', 'blog-item-slider__social'); ?>

                </div>

                <div class="simple-top-box">
                    <div class="simple-top-box__top">
                        <?php echo get_the_post_thumbnail( null, 'mainimage', array('class' => 'simple-top-box__img') ); ?>
                    </div>
                    <div class="simple-top-box__bottom">
                        <?php if (have_rows('author')) : ?>
                            <?php while (have_rows('author')) : the_row(); ?>
                                <div class="author">
                                    <?php if ($img = get_sub_field('photo')) : ?>
                                        <div class="author__avatar">
                                            <img class="author__avatar--img"
                                                src="<?php echo $img['sizes']['thumbnail']; ?>"
                                                alt="author">
                                        </div>
                                    <?php endif; ?>
                                    <div class="author__info">
                                        <div class="author__item author__name">
                                            <?php _e('By', THEME_OPT); ?>
                                            <span class="author__name--mark">
                                                <?php the_sub_field('name'); ?>
                                            </span>
                                        </div>
                                        <div class="author__item">
                                            <div class="author__item--icon">
                                                <i class="far fa-comment"></i>
                                            </div>
                                            <div class="author__item--text">24</div>
                                        </div>
                                        <div class="author__item">
                                            <div class="author__item--icon">
                                                <i class="fas fa-share"></i>
                                            </div>
                                            <div class="author__item--text">5</div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </section>

        <section class="one-post-contnent">
            <div class="container container-small">
                <div class="text-content">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="container">
                <div class="share">
                    <div class="share__text">
                        <?php _e('Share This Post', THEME_OPT); ?>
                    </div>

                    <?php do_action('dfind/social_sharing', 'share__social'); ?>

                </div>
            </div>
        </section>

        <section class="post-nav">
            <?php
            $next_post = get_next_post();

            if (!empty($next_post)) : ?>
                <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>"
                   class="post-nav__btn prev"
                   style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/resources/assets/images/blog-prev.png' ?>)">
                    <span class="post-nav__text"><?php _e('Previous Post', THEME_OPT); ?></span>
                    <span class="post-nav__title">
                        <?php _e('Navigating the Future – Die HR Mars Mission des DGFP', THEME_OPT); ?>
                    </span>
                </a>
            <?php
            endif;

            $prev_post = get_previous_post();

            if (!empty($prev_post)) : ?>
                <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>"
                   class="post-nav__btn next"
                   style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/resources/assets/images/blog-next.png' ?>)">
                    <span class="post-nav__text"><?php _e('Next Post', THEME_OPT); ?></span>
                    <span class="post-nav__title">
                        <?php _e('Azubi-Recruiting Studie 2019: Tipps aus 6 Jahren Forschung', THEME_OPT); ?>
                    </span>
                </a>
            <?php endif; ?>
        </section>

        <?php get_template_part('template-parts/related'); ?>

        <?php get_template_part('template-parts/subscribe'); ?>

    </main>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
