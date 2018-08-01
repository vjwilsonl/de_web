<?php get_header(); ?>

    <main>
        <div class="container">
            <section class="section-news">
                <div class="row">
                    <div class="col-12 section-title">
                        <h1>News</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card-columns">

                            <?php
                                $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

                                $args = array(
                                    'post_type'         => 'news',
                                    'posts_per_page'    => 6,
                                    'order'             => 'DESC',
                                    'orderby'           => 'ID',
                                    'paged'             => $paged,
                                    'page'              => $paged
                                );

                                $news = new WP_Query( $args );
                                if ( $news->have_posts() ) :
                                    while ( $news->have_posts() ) : $news->the_post();

                                        $trimmed_content = wp_filter_nohtml_kses( wp_trim_words( get_the_content(), 25, "" ) );
                                        $publish_date = get_the_date( 'F j, Y');
                                        ?>

                                        <div class="card">
                                            <img class="card-img-top" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title(); ?>">
                                            <a class="blog-caption hvr-underline-from-left" href="<?= get_post_permalink() ?>">
                                                <div class="card-body p-1">
                                                    <p class="card-text"><?= $publish_date ?></p>
                                                    <h5 class="card-title"><?= the_title(); ?></h5>
                                                    <p class="card-text"><?= $trimmed_content; ?> (...)</p>
                                                </div>
                                            </a>
                                        </div>

                                    <?php
                                    endwhile;
                                else: ?>

                                    <p>There are no news published yet. Come back later.</p>

                                <?php endif;

                            ?>
                        </div>
                    </div>
                </div>

                <!-- Page Navigation -->
                <?php get_bootstrap_paginate_links($news) ?>
        </div>
    </main>

<?php get_footer(); ?>