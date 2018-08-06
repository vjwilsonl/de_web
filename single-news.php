<?php get_header(); ?>

    <main>
        <div class="container">
            <section class="section-blogsingle">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <?php
                            while( have_posts() ) :
                                the_post();
                                ?>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="featured-img">
                                            <img class="w-100 mb-4" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title(); ?>">
                                        </div>
                                        <div class="post-heading">
                                            <p class="post-meta mb-1"><?= get_the_date( 'F j, Y' ); ?></p>
                                            <h1 class="post-title"><?= the_title(); ?></h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <!-- Share buttons -->
                                    <div class="col-2">
                                        <div class="share-buttons">
                                            <ul>
                                                <li class="align-middle"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" title="Share on Facebook."><i class="fab fa-facebook-f"></i></a></li>
                                                <li class="align-middle"><a href="https://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" target="_blank" title="Tweet this!"><i class="fab fa-twitter"></i></a></li>
                                                <li class="align-middle"><a class="copy-link" data-clipboard-text="<?php the_permalink(); ?>" tabindex="0" data-trigger="click" data-toggle="tooltip" title="Copy Link"><i class="fas fa-link"></i></a></li>
                                                <li class="align-middle"><a href="mailto:?subject=Look at this website&body=Hi, I found this website and thought you might like it <?php the_title(); ?> - <?php the_permalink(); ?>" target=""><i class="fas fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Post -->
                                    <div class="col-10">
                                        <div class="post-wrapper">
                                            <div class="post-content">
                                                <?php the_content(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-12 col-lg-4">
                        <div class="sidebar">
                            <div class="row">
                                <div class="col-12 section-title">
                                    <h2>Recent Posts</h2>
                                </div>
                                <div class="col-12">
                                    <div class="sidebar-links">
                                        <ul class="list">
                                            <?php
                                                $args = array(
                                                    'post_type'      => 'news',
                                                    'posts_per_page' => 6,
                                                    'order'          => 'DESC',
                                                    'orderby'        => 'ID',
                                                    'post__not_in'   => array( $post->ID ),
                                                );

                                                $news = new WP_Query( $args );

                                                if ( $news->have_posts() ) :
                                                    while( $news->have_posts() ) : $news->the_post(); ?>
                                                        <li class="list-item">
                                                            <a class="link-animated after" href="<?= get_post_permalink() ?>"><?= the_title(); ?></a>
                                                        </li>
                                                    <?php endwhile;
                                                endif;
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

<?php get_footer(); ?>