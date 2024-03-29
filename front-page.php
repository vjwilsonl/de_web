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
            <!-- Carousel -->
            <?php get_template_part( 'template-parts/home-carousel' ); ?>

            <!-- Intro -->
            <?php get_template_part( 'template-parts/home-intro' ); ?>

            <!-- Web Comics -->
            <?php get_template_part( 'template-parts/home-web-comics' ); ?>

            <!-- Blog -->
            <?php get_template_part( 'template-parts/home-blog' ); ?>

            <!-- For Educators -->
            <?php get_template_part( 'template-parts/home-for-educators' ); ?>

        </div>
        <!-- End Of Features News Social -->
    </main>

<?php
    // get_sidebar();
    get_footer();
