<?php

/**
 * Helpers
 *
 * @package Wordpress
 * @subpackage Tavalor
 * @since 1.0
 *
 */

/**
 * Get post preview component.
 *
 * @param string $img
 * @param boolean $title
 * @param boolean $date
 * @param boolean $category
 * @param string $layout
 * @param boolean $announce
 * @param boolean $author
 *
 * @return string
 */
function get_post_preview($img = '', $date = true) {
    ob_start(); ?>

    <div class="col-12 col-md-6 col-lg-4">
        <div class="blog-item">

            <div class="preview__info">
                <?php if ($img) : ?>
                    <a href="<?php the_permalink(); ?>" class="blog-item__img"
                       style="background-image: url(<?php echo $img; ?>)"></a>
                <?php endif; ?>

                <div class="blog-item__body">
                    <a href="<?php the_permalink(); ?>" class="blog-item__title">
                        <?php the_title(); ?>
                    </a>

                    <?php if ($date) : ?>
                        <div class="blog-item__date">
                            <?php the_article_date(); ?>
                        </div>
                    <?php endif; ?>

                    <div class="blog-item__text">
                        <?php echo get_the_excerpt(); ?>
                    </div>
                </div>

                <div class="blog-item__footer">
                    <?php
                    $category = get_the_category();

                    if (is_array($category) && isset($category[0])) {
                        echo '<a href="'. get_category_link($category[0]->term_id) .'" class="blog-item__tag">';
                        echo $category[0]->cat_name;
                        echo '</a>';
                    }
                    ?>

                    <div class="blog-item__read">
                        <i class="far fa-clock"></i>
                        <?php the_field('duration'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $out = ob_get_contents();
    ob_end_clean();

    return $out;
}

/**
 * Get show more button
 *
 * @param $found_posts string
 *
 * @return $out string
 */

function get_show_more_btn($found_posts) {
    ob_start(); ?>

        <div class="text-center">
            <button class="blog-show-more"
                    data-found-posts="<?php echo $found_posts; ?>">
                <?php _e('Mehr laden', THEME_OPT); ?>
                <i class="df df-arrow-right"></i>
            </button>
        </div>

    <?php
    $out = ob_get_contents();
    ob_end_clean();

    return $out;
}

/**
 * Get pure social name from class name.
 *
 * @param string $social
 *
 * @return string
 */
function get_social_name($social)
{
    return mb_strtolower($social);
}

function get_social_share_url($social)
{
    global $post;


    $crunchifyURL = urlencode(get_permalink());
    $crunchifyTitle = htmlspecialchars(urlencode(html_entity_decode(
        get_the_title(),
        ENT_COMPAT,
        'UTF-8'
    )), ENT_COMPAT, 'UTF-8');
    $crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

    // Construct sharing URL without using any script
    $twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
    $googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
    $whatsappURL = 'whatsapp://send?text='.$crunchifyTitle . ' ' . $crunchifyURL;
    $linkedinURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL.'&amp;title='.$crunchifyTitle;
    $xingURL = 'https://www.xing.com/spi/shares/new?url='.$crunchifyURL;

    // Based on popular demand added Pinterest too
    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;

    $socialUrlName = $social . 'URL';

    return $$socialUrlName;
}

/**
 * Get the post date
 *
 * @return string
 */

function the_article_date()
{
    global $post;

    $post_date = get_the_date("Y.m.d\\TH:i");

    $today = new DateTime(); // This object represents current date/time
    $today->setTime(0, 0, 0); // reset time part, to prevent partial comparison

    $match_date = DateTime::createFromFormat("Y.m.d\\TH:i", $post_date);
    $match_date->setTime(0, 0, 0); // reset time part, to prevent partial comparison

    $diff = $today->diff($match_date);
    $diffDays = (integer)$diff->format("%R%a"); // Extract days count in interval

    switch ($diffDays) {
        case 0:
            echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago';
            break;
        case -1:
            echo __('Yesterday ', THEME_OPT) . date('h:i A', get_the_time('U'));
            break;
        default:
            echo ucfirst(get_the_date());
    }
}

/**
 * Get template part in variable
 *
 * @param $template_name
 * @param null $part_name
 * @return string
 */
function load_template_part($template_name, $part_name = null) {
    ob_start();
    get_template_part($template_name, $part_name);
    $var = ob_get_contents();
    ob_end_clean();
    return $var;
}



/**
 * Get correct link function
 *
 * @param $link
 * @return string
 */
function get_correct_link($link = '') {
    preg_match( '/^(http|https):\\/\\//', $link, $matches);

    if ( ! $matches)
        $link = 'http://' . $link;

    if (filter_var($link, FILTER_VALIDATE_URL))
        return $link;

    return '';
}

/**
 *
 * Get animated wave item
 *
 * @param string $color
 * @return string
 */
function get_wave($color = '#F5F6FB', $speed = 20, $delay = 0) {

    $html = '<div class="wave-animation__item">
      <svg width="1800" height="200" viewBox="0 0 1800 200" 
            style="animation-duration: ' . $speed .'s; animation-delay: ' . $delay . 's"
            fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill="' . $color . '">
          <animate
              attributeName="d"
              dur="3000ms"
              repeatCount="indefinite"
              values="
        M-300 200
        C
          0 50
          0 50
          150 100
        C
          300 150
          300 150
          450 100
        C
          600 50
          600 50
          750 100
        C
          900 150
          900 150
          1050 100
        C
          1200 50
          1200 50
          1350 100
        C
          1500 150
          1500 150
          1650 100
        C
          1800 50
          1800 50
          2100 200
        Z;

        M-300 200
        C
          10 60
          10 60
          160 110
        C
          310 160
          310 160
          460 110
        C
          610 40
          610 40
          760 110
        C
          910 140
          910 140
          1060 110
        C
          1210 60
          1210 60
          1360 110
        C
          1510 160
          1510 160
          1660 110
        C
          1810 60
          1810 60
          2110 200
        Z;

        M-300 200
        C
          0 50
          0 50
          150 100
        C
          300 150
          300 150
          450 100
        C
          600 50
          600 50
          750 100
        C
          900 150
          900 150
          1050 100
        C
          1200 50
          1200 50
          1350 100
        C
          1500 150
          1500 150
          1650 100
        C
          1800 50
          1800 50
          2100 200
        Z;"
          />
        </path>
      </svg>
    </div>';

    return $html;
}
