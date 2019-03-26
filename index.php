<?php
    /**
     * The main template file
     *
     * This is the most generic template file in a WordPress theme
     * and one of the two required files for a theme (the other being style.css).
     * It is used to display a page when nothing more specific matches a query.
     * E.g., it puts together the home page when no home.php file exists.
     *
     * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
     *
     * @package Difference_Engine
     */

    get_header();
?>

    <main class="main">
        <div class="container section-wrapper">
            <!-- Jumbotron-->
            <?php get_template_part( 'template-parts/home-jumbotron' ); ?>
            <!-- Carousel -->
            <?php get_template_part( 'template-parts/home-carousel' ); ?>
            <!-- Web Comics -->
            <?php get_template_part( 'template-parts/home-web-comics' ); ?>
            <!-- Features, News, Social -->

            <div class="row no-gutters">
                <div class="col-sm-12 col-lg-8">
                    <!-- Features -->
                    <?php get_template_part( 'template-parts/home-features' ); ?>
                    <!-- End Of Features -->
                    <!-- News Section -->
                    <?php get_template_part( 'template-parts/home-news' ); ?>
                    <!-- End of News Section -->
                </div>
                <?php get_template_part( 'template-parts/home-social' ); ?>
            </div>
        </div>
        <!-- End Of Features News Social -->
    </main>

<?php
    // get_sidebar();
    get_footer();
