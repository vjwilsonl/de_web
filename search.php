<?php
    /**
     * The template for displaying search results pages
     *
     * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
     *
     * @package Difference_Engine
     */

    get_header();
?>

    <main class="main">
        <div class="container section-wrapper">

            <section class="section">
                <div class="row section-title">
                    <div class="col-12">
                        <h1>
                            <?php printf( esc_html__( 'Search Results for: %s', 'difference-engine' ), '<span>' . get_search_query() . '</span>' ); ?>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php
                            while( have_posts() ) :
                                the_post();

                                /**
                                 * Run the loop for the search to output the results.
                                 * If you want to overload this in a child theme then include a file
                                 * called content-search.php and that will be used instead.
                                 */

                                if(get_post_type() === 'post') : ?>

                                    <main>
                                        <div class="container">
                                            <section class="section-blog">
                                                <div class="row">
                                                    <div class="col-12 section-title">
                                                        <h1>Blog</h1>
                                                    </div>
                                                </div>
                                                <?php get_template_part('search-template-parts/archive-blog'); ?>
                                            </section>
                                        </div>
                                    </main>

                                <?php elseif (get_post_type() === 'for_educators') : ?>
                                    <main>
                                        <div class="container">
                                            <section class="section-for-educators">
                                                <div class="row">
                                                    <div class="col-12 section-title">
                                                        <h1>For Educators</h1>
                                                    </div>
                                                </div>
                                                <?php get_template_part('search-template-parts/archive-for_educators'); ?>
                                            </section>
                                        </div>
                                    </main>

                                <?php elseif (get_post_type() === 'web_comics') : ?>
                                    <main>
                                        <div class="container">
                                            <section class="section-for-educators">
                                                <div class="row">
                                                    <div class="col-12 section-title">
                                                        <h1>For Educators</h1>
                                                    </div>
                                                </div>
                                                <?php get_template_part('search-template-parts/archive-web_comics'); ?>
                                            </section>
                                        </div>
                                    </main>
                                <?php else: ?>
                                    <?php get_template_part( 'template-parts/content', 'search' ); ?>
                                <?php endif; ?>

                            <?php endwhile; ?>
                    </div>
                </div>
            </section>

        </div>
    </main>

<?php
    get_footer();
