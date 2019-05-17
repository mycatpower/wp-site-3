<?php
/**
 * The template for displaying the footer
 *
 * Contains footer block, the closing of the .page-wrapper div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage dFind
 * @since 1.0
 * @version 1.0
 */

?>

<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-wrap">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="footer-logo">
                            <?php if ($logo = get_field('footer_logo', 'option')) : ?>
                                <img src="<?php echo $logo['sizes']['medium']; ?>" alt="dFind">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="footer-menu">
                            <?php
                            if ( has_nav_menu( 'footer_menu' ) ) {
                                // Print footer menu
                                dfind_footer_menu();
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="footer-bottom-nav">
                        <?php
                        if (has_nav_menu('footer_bottom')) {
                            dfind_footer_bottom_menu();
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-copyright text-right">
                        &copy; <strong>dfind</strong> <?php echo date('Y'); ?>. All rights reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

</div><!-- .page-wrapper -->

<?php get_template_part('template-parts/modals/success-subscribe'); ?>

<script>
    (function (d, t, g) {
        var ph    = d.createElement(t), s = d.getElementsByTagName(t)[0];
        ph.type   = 'text/javascript';
        ph.async   = true;
        ph.charset = 'UTF-8';
        ph.src     = g + '&v=' + (new Date()).getTime();
        s.parentNode.insertBefore(ph, s);
    })(document, 'script', '//projects.pageworkers.com/?p=1383&ph_apikey=41bf265bbe74f76d18786e9553d3e7f9');
</script>

<?php wp_footer(); ?>

</body>
</html>
