<?php
    /**
     * The template for displaying archive pages
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
     *
     * @package Difference_Engine
     */

    get_header();
?>

<?php
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    
    $args = array(
        'post_type'         => 'for_educators',
        'posts_per_page'    => 8,
        'order'             => 'DESC',
        'orderby'           => 'ID',
        'paged'             => $paged,
        'page'              => $paged
    );
    $for_educators = new WP_Query( $args );
?>
    
    <main>
        <div class="container">
            <section class="section-for-educators">
                <div class="row">
                    <div class="col-12 section-title">
                        <h1>For Educators</h1>
                    </div>
                </div>

                <div class="row for-educators-block">
                    <?php if ( $for_educators->have_posts() ) : ?>
                        <?php while( $for_educators->have_posts() ): ?>
                            <?php $for_educators->the_post(); ?>
                            <div class="col-sm-12 col-lg-4 for-educators-card">
                                <a class="" href="<?= get_post_permalink() ?>">
                                    <div class="for-educators-image">
                                        <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title(); ?>" class="for-educators-cover">
                                        <div class="for-educators-image-hover"></div>
                                    </div>
                                </a>
                                <div class="for-educators-body">
                                    <h2 class="for-educators-title">
                                        <a class="" href="<?= get_post_permalink() ?>"><?= the_title(); ?></a>
                                    </h2>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>There are no post published yet. Come back later.</p>
                    <?php endif; ?>
                </div>

                <!-- Page Navigation -->
                <?php get_bootstrap_paginate_links($for_educators) ?>
            </section>
        </div>
    </main>

<?php get_footer();