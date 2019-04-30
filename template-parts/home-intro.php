<?php
    /**
     * The intro for the homepage
     *
     * This is the template that displays jumbotron on home page
     *
     *
     * @link    https://developer.wordpress.org/reference/functions/get_template_part/
     *
     * @package difference-engine
     */
?>
<?php
    if ( class_exists( 'acf' ) ) {
        $intro_text = get_field( 'intro_text', 'option' );
        $button_url  = get_field( 'button_link', 'option' );
    }
?>
<section class="section-intro">
    <div class="row no-gutters">
        <div class="col-sm-12 col-lg-9">
            <h1><?= $intro_text ?></h1>
        </div>
        <div class="col-sm-12 col-lg-3 text-left">
            <a href="<?= $button_url ?>" class="float-md-right">
                <button class="btn btn-animated">MORE ABOUT US</button>
            </a>
        </div>
    </div>
</section>