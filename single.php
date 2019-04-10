<?php get_header(); ?>

    <main>
        <div class="container">
            <section class="section-blog-single">
                <div class="row">
                    <div class="col-12">
                        <?php while( have_posts() ) : the_post(); ?>

                            <div class="row">
                                <div class="col-12">
                                    <div class="featured-img">
                                        <img class="w-100 mb-4" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title(); ?>">
                                    </div>
                                    <div class="post-heading">
                                        <p class="post-date mb-1"><?= get_the_date( 'F j, Y' ); ?></p>
                                        <h1 class="post-title"><?= the_title(); ?></h1>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Share buttons -->
                                <div class="col-1">
                                    <div class="share-buttons">
                                        <ul>
                                            <li class="align-middle">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" title="Share on Facebook.">
                                                    <span class="fa-stack">
                                                        <i class="fal fa-circle fa-stack-2x"></i>
                                                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="align-middle">
                                                <a href="https://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" target="_blank" title="Tweet this!">
                                                    <span class="fa-stack">
                                                        <i class="fal fa-circle fa-stack-2x"></i>
                                                        <i class="fab fa-twitter fa-stack-1x"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="align-middle">
                                                <a class="copy-link" data-clipboard-text="<?php the_permalink(); ?>" tabindex="0" data-trigger="click" data-toggle="tooltip" title="Copy Link">
                                                    <span class="fa-stack">
                                                        <i class="fal fa-circle fa-stack-2x"></i>
                                                        <i class="fas fa-link fa-stack-1x"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="align-middle">
                                                <a href="mailto:?subject=Look at this website&body=Hi, I found this website and thought you might like it <?php the_title(); ?> - <?php the_permalink(); ?>" target="">
                                                    <span class="fa-stack">
                                                        <i class="fal fa-circle fa-stack-2x"></i>
                                                        <i class="fas fa-envelope fa-stack-1x"></i>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Post -->
                                <div class="col-11">
                                    <div class="post-wrapper">
                                        <div class="post-content">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php endwhile; ?>

                        <?php
                            $tags = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );

                            if ($tags):
                                $args = array(
                                    'tag__in'        => $tags,
                                    'post__not_in'   => array( $post->ID ),
                                    'posts_per_page' => 3,
                                    'orderby'        => 'rand',
                                );
                                $related_posts  = new WP_Query( $args );

                                if ( $related_posts->have_posts() ) : ?>

                                    <section class="related-post">
                                        <div class="row">
                                            <div class="col-12">
                                                <h2>More like this</h2>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                                                <div class="col-sm-12 col-lg-4 related-post-card">
                                                    <div class="related-post-image">
                                                        <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title(); ?>" class="related-post-cover">
                                                        <div class="related-post-image-hover"></div>
                                                    </div>
                                                    <div class="related-post-body">
                                                        <h4 class="related-post-title">
                                                            <a class="" href="<?= get_post_permalink() ?>"><?= the_title(); ?></a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                    </section>
                                <?php
                                endif;
                            endif;
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </main>

<?php get_footer(); ?>