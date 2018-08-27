<?php get_header(); ?>

    <main>
        <div class="container">
            <section class="section-news">
                <div class="row">
                    <div class="col-12 section-title">
                        <h1>News</h1>
                    </div>
                </div>

                <div class="row blog-block mt-4">

                    <?php
                        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

                        $tag_name = '';
                        if(isset( $_GET['tag'])):
                            $tag_name = $_GET['tag'];
                        endif;

                        $args = array(
                            'post_type'         => 'news',
                            'tag'               => $tag_name,
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
                                $post_tags = get_the_tags();
                                ?>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="card">
                                        <img class="card-img-top" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title(); ?>">
                                        <div class="blog-caption">
                                            <div class="card-body p-1">
                                                <p class="card-text"><?= $publish_date ?></p>
                                                <h3 class="card-title"><a class="hvr-highlight hvr-highlight-thick" href="<?= get_post_permalink() ?>"><?= the_title(); ?></a></h3>
                                                <p class="card-text"><?= $trimmed_content; ?> (...)</p>
                                            </div>

                                            <div class="card-tags mt-3">
                                                <?php
                                                    if ( $post_tags ):
                                                        echo "Tags: ";
                                                        $last_tag = end(array_keys($post_tags));
                                                        foreach( $post_tags as $key => $value ):
                                                            if($key == $last_tag):
                                                                echo "<a href='" . get_post_type_archive_link( 'news' ) ?>?tag=<?= $value->slug . "'>" . $value->name . "</a>";
                                                            else:
                                                                echo "<a href='" . get_post_type_archive_link( 'news' ) ?>?tag=<?= $value->slug . "'>" . $value->name . "</a>" . ", ";
                                                            endif;
                                                        endforeach;
                                                    endif;
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            <?php
                            endwhile;
                        else: ?>

                            <p>There are no news published yet. Come back later.</p>

                        <?php endif;

                    ?>

                </div>

                <!-- Page Navigation -->
                <?php get_bootstrap_paginate_links($news) ?>
        </div>
    </main>

<?php get_footer(); ?>