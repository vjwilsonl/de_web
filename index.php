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
        'posts_per_page'    => 7,
        'order'             => 'DESC',
        'orderby'           => 'ID',
        'paged'             => $paged,
        'page'              => $paged
    );
    $blog_post = new WP_Query( $args );
?>

    <main>
        <div class="container">
            <section class="section-blog">
                <div class="row">
                    <div class="col-12 section-title">
                        <h1>Blog</h1>
                    </div>
                </div>

                <div class="row blog-block" id="blog-list">
                    <?php
                    $query = new WP_Query( array( 'tag' => 'featured' ) );
                    while ( $query->have_posts() ) {
                  		$query->the_post();
                      $trimmed_content = wp_trim_words( get_the_content(), 25, "" );
                      $publish_date = get_the_date( 'F j, Y');
                  		?>
                      <div class="col-sm-12 col-lg-12 blog-card-big">
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
                      <?php
                      wp_reset_postdata();
                      continue;
                  	}
                    /* Before Show More
                        if ( $blog_post->have_posts() ) :
                            $row = 1;
                            while ( $blog_post->have_posts() ) : $blog_post->the_post();

                                $trimmed_content = wp_trim_words( get_the_content(), 25, "" );
                                $publish_date = get_the_date( 'F j, Y');
                                ?>
                                <?php if($row === 1) : ?>

                                    <div class="col-sm-12 col-lg-12 blog-card-big">
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

                                <?php else: ?>
                                <div class="col-sm-12 col-lg-4 blog-card">
                                    <a class="" href="<?= get_post_permalink() ?>">
                                        <div class="blog-image">
                                            <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title(); ?>" class="blog-cover">
                                            <div class="blog-image-hover"></div>
                                        </div>
                                    </a>
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
                                <?php endif ?>
                            <?php $row++;
                            endwhile;
                            ?>

                            <?php
                        else: ?>

                            <p>There are no news published yet. Come back later.</p>

                        <?php endif;

                    */?>

                </div>
                <div id="blog-get-div" class="col-12 text-center" style="display:none" >
                  <button id="blog-get-btn" class="btn btn-animated" >Show more</button>
                </div>

                <!-- Page Navigation -->
                <?php //get_bootstrap_paginate_links($blog_post) ?>
        </div>
    </main>

<?php get_footer();
