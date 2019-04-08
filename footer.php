<?php
    /**
     * The template for displaying the footer
     *
     * Contains the closing of the #content div and all content after.
     *
     * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
     *
     * @package Difference_Engine
     */

?>

</div><!-- #content -->

<!-- Footer -->

<div class="footer-sticky">
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-4">
                    <div class="footer-text">
                        <h3>CONTACT</h3>
                        <p>
                            <?= ( class_exists( 'acf' ) ) ? get_field( 'street_name', 'options' ) : ''; ?><br>
                            <?= ( class_exists( 'acf' ) ) ? get_field( 'unit_no', 'options' ) : ''; ?><br>
                            Singapore <?= ( class_exists( 'acf' ) ) ? get_field( 'postal_code', 'options' ) : ''; ?>
                        </p>
                        <p>
                            <?= ( class_exists( 'acf' ) ) ? '<a class="email-link" target="_blank" href="mailto:'.get_field( 'contact_email', 'options' ).'">'.get_field( 'contact_email', 'options' ).'</a>' : ''; ?>
                        </p>
                    </div>
                    <div>
                        <ul class="list-inline">
                            <?php get_template_part( 'template-parts/social-url-icon' ) ?>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-8">
                    <div class="form-footer">
                        <h3>Subscribe</h3>
                        <?php echo do_shortcode( '[contact-form-7 id="87" title="Mail Chimp" html_class="form-subscription"]' ); ?>
                    </div>
                </div>
            </div>
            <!-- Copyright -->
            <div class="row">
                <div class="col-12">
                    <div class="footer-copyright">
                        <p><?= ( class_exists( 'acf' ) ) ? get_field( 'footer_text', 'options' ) : ''; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<a href="javascript:" id="return-to-top"><i class="fas fa-chevron-up"></i></a>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
