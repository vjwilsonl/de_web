<?php get_header(); ?>

    <main>
        <div class="container">
            <section class="section-features">
                <div class="row">
                    <div class="col-12 section-title">
                        <h1>Features</h1>
                        <p> 
                            <?= the_field('features_listing_intro', 'option');  ?>
                        </p>
                    </div>
                </div>
                <div class="row blog-block mb-4">

                    <?php
                        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

                        $args = array(
                            'post_type'         => 'features',
                            'posts_per_page'    => 6,
                            'order'             => 'DESC',
                            'orderby'           => 'ID',
                            'paged'             => $paged,
                            'page'              => $paged
                        );

                        $features = new WP_Query( $args );
                        if ( $features->have_posts() ) :
                            while ( $features->have_posts() ) : $features->the_post();

                                $trimmed_content = wp_trim_words( get_the_content(), 25, "" );
                                $publish_date = get_the_date( 'F j, Y');
                                $artist_name = (class_exists('acf')) ? ((get_field('artist_name')) ? get_field('artist_name') : '') : '' ;
                                ?>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="card">
                                        <div class="card-img-wrapper">
                                            <img class="card-img-top" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title(); ?>">
                                            <?php if($artist_name): ?>
                                                <div class="caption">
                                                    <h4><?= $artist_name ?></h4>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <a href="<?= get_post_permalink() ?>" class="blog-caption hvr-underline-from-left">
                                            <div class="card-body p-1">
                                                <p class="card-text"><?= $publish_date ?></p>
                                                <h3 class="card-title"><?= the_title(); ?></h3>
                                                <p class="card-text"><?= $trimmed_content; ?> (...)</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            <?php
                            endwhile;
                        else: ?>

                            <p>There are no feature articles published yet. Come back later.</p>

                        <?php endif; ?>
                </div>

                <!-- Page Navigation -->
                <?php get_bootstrap_paginate_links($features) ?>
            </section>
        </div>
    </main>

<?php get_footer(); ?>