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

                        <?php if( have_posts() ):
                            $types = array('web_comics', 'post', 'for_educators');
                            foreach( $types as $type ): ?>
                                <?php $count[$type] = 0; ?>
                                <?php
                                switch ($type) {
                                    case "post":
                                        $postFile = "blog";
                                        $postName = "Blog";
                                        $postSlug = "blog";
                                        break;
                                    case "web_comics":
                                        $postFile = "web_comics";
                                        $postName = "Web Comics";
                                        $postSlug = "webcomics";
                                        break;
                                    case "for_educators":
                                        $postFile = "for_educators";
                                        $postName = "Educators";
                                        $postSlug = "for-educators";
                                        break;
                                    default:
                                        $postFile = "blog";
                                        $postName = "Blog";
                                        $postSlug = "blog";
                                }
                                ?>
                                <section class="section-<?= $postSlug ?>">
                                    <div class="row">
                                        <div class="col-12 section-title">
                                            <h1>Section: <?= $postName ?></h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <?php while( have_posts() ): ?>
                                        <?php the_post(); ?>
                                        <?php if($type == get_post_type()): ?>
                                            <?php $count[$type] ++ ?>
                                            <?php get_template_part("search-template-parts/archive-".$postFile); ?>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                    </div>
                                    <?php rewind_posts(); ?>
                                </section>

                                <?php if($count[$type] <= 0): ?>
                                    <style>
                                        .section-<?=$postSlug?> {
                                            display: none;
                                        }
                                    </style>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </section>

        </div>
    </main>

<?php get_footer();
