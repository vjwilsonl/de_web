<?php get_header(); ?>

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
                                                <li class="list-item"><a class="link-animated after" href="<?=get_category_link( $category->term_id )?>"><?= $category->name ?></a></li>
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
                                    <div class="dropdown-menu collapse" aria-labelledby="sortingButton">
                                        <a class="dropdown-item" href="#">Title (A-Z)</a>
                                        <a class="dropdown-item" href="#">Title (Z-A)</a>
                                        <a class="dropdown-item" href="#">Newest</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <p class="sorting-result">9 of 13 of results</p>
                            </div>
                        </div>

                        <!-- Web Comics -->
                        <div class="row webcomics-block">

                            <?php
                                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

                                $args = array(
                                    'post_type'      => 'web_comics',
                                    'posts_per_page' => 9,
                                    'order'          => 'DESC',
                                    'orderby'        => 'ID',
                                    'paged'          => $paged,
                                    'page'           => $paged,
                                );

                                $web_comics = new WP_Query( $args );

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
                                                <strong class="flag-new flag"><?=get_field('status_flag')?></strong>
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