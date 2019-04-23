<?php
    /**
     * The template for displaying archive pages
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
     *
     * @package Difference_Engine
     */
?>
<!--    <div class="row for-educators-block">-->
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
<!--    </div>-->