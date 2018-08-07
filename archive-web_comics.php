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
    $total_count_post = $total_web_comics->post_count;
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

                    <div class="col-12 col-lg-3">
                        <div class="sidebar sidebar-left">
                            <div class="row">
                                <div class="col-12 section-title">
                                    <h2>Genre</h2>
                                </div>
                                <div class="col-12">
                                    <div class="sidebar-links">
                                        <ul class="list">
                                            <?php
                                                $web_comics_categories = get_categories('web_comics');
                                                foreach ($web_comics_categories as $category): ?>

                                                <li class="list-item"><a class="link-animated after" href="<?= get_post_type_archive_link( 'web_comics' ) ?>?category=<?= $category->slug ?>"><?= $category->name ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-9">
                        <div class="row sorting mb-4">
                            <div class="col-8">
                                <div class="dropdown">
                                    <button class="btn btn--primary dropdown-toggle" type="button" id="sortingButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                            <div class="col-4">
                                <p class="sorting-result"><?= $count_post ?> of <?= $total_count_post ?> of results</p>
                            </div>
                        </div>

                        <!-- Web Comics -->
                        <div class="row webcomics-block">

                            <?php
                                if ( $web_comics->have_posts() ) :
                                    while( $web_comics->have_posts() ) : $web_comics->the_post();

                                        $creator = get_field('creator');
                                        ?>

                                        <div class="col-sm-6 col-lg-4 mb-4">
                                            <!-- Image thumbnail -->
                                            <a href="<?= get_post_permalink() ?>" class="thumbnail text-left hvr-underline-from-left">
                                                <div class="caption">
                                                    <h2><?= the_title(); ?></h2>
                                                    <p>
                                                        <?php
                                                            if(is_array($creator) && !empty($creator)):
                                                                $last_creator = end(array_keys($creator));
                                                                foreach ($creator as $key => $value):
                                                                    if($key == $last_creator):
                                                                        echo $value['name'];
                                                                    else:
                                                                        echo $value['name'] . " / ";
                                                                    endif;
                                                                endforeach;
                                                            endif;
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="overlay">
                                                    <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title(); ?>" class="webcomics-cover">
                                                </div>
                                            </a>

                                            <!-- New flag -->
                                            <?php if(get_field('status_flag') != "None"): ?>
                                            <div class="flag-wrapper">
                                                <strong class="<?=(get_field('status_flag') == "New")? "flag-new" : "flag-comingsoon" ?> flag"><?=get_field('status_flag')?></strong>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php
                                    endwhile;
                                else: ?>

                                    <p>There are no web comics published yet. Come back later.</p>

                                <?php endif; ?>

                        </div>

                        <!-- Page Navigation -->
                        <?php get_bootstrap_paginate_links($web_comics) ?>
                    </div>
                </div>
            </section>
        </div>
    </main>

<?php get_footer(); ?>