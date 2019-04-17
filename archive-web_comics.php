<?php get_header(); ?>

<?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    if(isset($_GET['order-by'])):
        $get_order = $_GET['order-by'];
    endif;

    $category_name = '';
    if(isset( $_GET['category'])):
        $category_name = $_GET['category'];
    endif;

    if($get_order == 'asc' || $get_order == 'desc'):
        $args = array(
            'post_type'         => 'web_comics',
            'category_name'     => $category_name,
            'posts_per_page'    => 9,
            'order'             => $get_order,
            'orderby'           => 'post_title',
            'paged'             => $paged,
            'page'              => $paged,
        );
    else:
        $args = array(
            'post_type'         => 'web_comics',
            'category_name'     => $category_name,
            'posts_per_page'    => 9,
            'order'             => 'DESC',
            'orderby'           => 'ID',
            'paged'             => $paged,
            'page'              => $paged,
        );
    endif;

    $web_comics = new WP_Query( $args );
    $count_post = $web_comics->post_count;

    $args = array(
        'post_type'         => 'web_comics',
        'category_name'     => $category_name,
    );
    $total_web_comics = new WP_Query( $args );
?>

    <main>
        <div class="container">
            <section class="section-webcomics">
                <div class="row mb-2">
                    <div class="col-12 section-title">
                        <h1>Web Comics</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row sorting mb-4">
                            <div class="col-12">
                                <div class="dropdown alignright">
                                    <button class="btn dropdown-toggle sort-button" type="button" id="sortingButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort by
                                    </button>
                                    <form method="get">
                                        <?php if(isset( $_GET['category'])): ?>
                                            <input type="hidden" name="category" value="<?= $_GET['category'] ?>">
                                        <?php endif; ?>
                                        <div class="dropdown-menu collapse" aria-labelledby="sortingButton">
                                            <button type="submit" name="order-by" value="asc" class="dropdown-item" >Title (A-Z)</button>
                                            <button type="submit" name="order-by" value="desc" class="dropdown-item" >Title (Z-A)</button>
                                            <button type="submit" name="order-by" value="new" class="dropdown-item" >Newest</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Web Comics -->
                    <?php if ( $web_comics->have_posts() ) : ?>
                        <?php while( $web_comics->have_posts() ): ?>
                            <?php
                            $web_comics->the_post();
                            $creator     = get_field( 'creator' );
                            $status_flag = ( class_exists( 'acf' ) ) ? ( ( get_field( 'status_flag' ) ) ? get_field( 'status_flag' ) : '' ) : '';
                            ?>
                            <div class="col-sm-12 col-lg-6 webcomics-card">
                                <a class="" href="<?= get_post_permalink() ?>">
                                    <div class="webcomics-image">
                                        <img src="<?= get_the_post_thumbnail_url() ?>" alt="" class="webcomics-cover">
                                        <div class="webcomics-image-hover"></div>
                                    </div>
                                </a>
                                <div class="webcomics-body">
                                    <h2 class="webcomics-title"><?= the_title(); ?></h2>
                                    <p class="webcomics-text">
                                        <?php
                                            if ( is_array( $creator ) && ! empty( $creator ) ):
                                                $last_creator = end( array_keys( $creator ) );
                                                foreach ( $creator as $key => $value ):
                                                    if ( $key == $last_creator ):
                                                        echo $value['name'];
                                                    else:
                                                        echo $value['name'] . " / ";
                                                    endif;
                                                endforeach;
                                            endif;
                                        ?>
                                    </p>
                                    <p class="webcomics-read">
                                        <a class="" href="<?= get_post_permalink() ?>">
                                            READ COMIC &nbsp; <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>There are no web comics published yet. Come back later.</p>
                    <?php endif; ?>
                    <!-- Page Navigation -->
                    <?php get_bootstrap_paginate_links($web_comics) ?>
                </div>
            </section>
        </div>
    </main>

<?php get_footer(); ?>