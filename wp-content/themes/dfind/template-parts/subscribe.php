<?php

/**
 * Template part for displaying Subscribe block
 *
 * @package Wordpress
 * @subpackage dFind
 * @since 1.0
 */
?>
<section class="section subscribe-section">
    <div class="section-content">
        <div class="container">
            <div class="subscribe">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="subscribe__body">
                            <h3 class="subscribe__title">
                                <?php the_sub_field('title'); ?>
                            </h3>
                            <div class="subscribe__description">
                                <?php the_sub_field('description'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="subscribe__form">
                            <form id="subscribe-form" method="POST" class="mc-subscribe">
                                <input type="hidden" name="action" value="subscribe">
                                <input type="hidden" name="listid" value="4fcfe29394">
                                <label class="form-group row">
                                    <div class="group-field">
                                        <input type="email" name="email" class="form-control df-email" placeholder="<?php _e('E-Mail Adresse', THEME_OPT); ?>" required>

                                        <button type="submit" class="btn btn-primary">
                                            <?php _e('Anmelden', THEME_OPT); ?>
                                        </button>
                                        <div class="checkbox">
                                            <label class="checkbox-wrap">
                                                <input type="checkbox" name="checkbox" value="check" id="agree">
                                                <span class="checkmark"></span>
                                                Ich habe die Hinweise zum <a href="/privacy-policy" target="_blank">Datenschutz</a> gelesen und akzeptiere diese. *
                                            </label>
                                        </div>
                                    </div>
                                </label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>