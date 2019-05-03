<?php
    /**
     * The template for displaying archive pages
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
     *
     * @package Difference_Engine
     */
?>


<!--    <div class="row blog-block">-->
        <?php
            $trimmed_content = wp_trim_words( get_the_content(), 25, "" );
            $publish_date = get_the_date( 'F j, Y');
        ?>
        <div class="row">
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
        </div>
<!--    </div>-->

