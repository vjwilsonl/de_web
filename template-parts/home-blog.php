<?php
    /**
     * The blogs for the homepage
     *
     * This is the template that displays list of 4 web comics on home page
     *
     *
     * @link    https://developer.wordpress.org/reference/functions/get_template_part/
     *
     * @package difference-engine
     */
?>
<?php
    $args = array(
        'posts_per_page' => 3,
        'order'          => 'DESC',
        'orderby'        => 'ID',
    );
    $blog_post = new WP_Query( $args );
?>

<?php if ( $blog_post->have_posts() ): ?>
    <section class="section-blog">
        <div class="row section-title">
            <div class="col-6">
                <h1>Blog</h1>
            </div>
            <div class="col-6">
                <p class="text-right align-middle blog-read-all">
                    <a class="" href="<?= get_post_type_archive_link('post'); ?>">
                        SEE ALL &nbsp; <i class="fas fa-arrow-right"></i>
                    </a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12 blog-card-big">
                <div id="blogCarouselIndicators" class="carousel slide blog-carousel" data-ride="carousel">
                    <?php $row = 1; ?>
                    <?php while( $blog_post->have_posts() ): ?>
                        <?php
                            $blog_post->the_post();
                            $trimmed_content = wp_trim_words( get_the_content(), 25, "" );
                            $publish_date    = get_the_date( 'F j, Y' );
                        ?>
                        <div class="carousel-item <?=($row === 1) ? "active" : "" ?>">
                            <div class="row">
                                <div class="col-sm-12 col-lg-6">
                                    <div class="blog-image">
                                        <img src="<?= get_the_post_thumbnail_url() ?>" alt="" class="blog-cover">
                                        <div class="blog-image-hover"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <div class="blog-body">
                                        <p class="blog-date"><?= $publish_date ?></p>
                                        <h2 class="blog-title"><?= the_title(); ?></h2>
                                        <p class="blog-text">
                                            <?= $trimmed_content . " (...)"; ?>
                                        </p>
                                        <p class="blog-read">
                                            <a class="" href="<?= get_post_permalink() ?>">
                                                READ MORE &nbsp; <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $row++; endwhile; ?>
                    <div class="col-sm-12 offset-lg-6 col-lg-6">
                        <ol class="carousel-indicators">
                            <li data-target="#blogCarouselIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#blogCarouselIndicators" data-slide-to="1" ></li>
                            <li data-target="#blogCarouselIndicators" data-slide-to="2" ></li>
                        </ol>
                    </div>
                    <a class="carousel-control-prev blog-carousel-control" href="#blogCarouselIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next blog-carousel-control" href="#blogCarouselIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>