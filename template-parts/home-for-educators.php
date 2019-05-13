<?php
    /**
     * The for educators for the homepage
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
        'post_type'      => 'for_educators',
        'posts_per_page' => 3,
        'order'          => 'DESC',
        'orderby'        => 'ID',
    );

    $for_educators = new WP_Query( $args );
?>

<?php if ( $for_educators->have_posts() ): ?>
    <section class="section-for-educators border-top">
        <div class="row section-title">
            <div class="col-6">
                <a class="" href="<?= get_post_type_archive_link('for_educators'); ?>">
                    <h1>For Educators</h1>
                </a>
            </div>
            <div class="col-6">
                <p class="text-right align-middle for-educators-read-all">
                    <a class="" href="<?= get_post_type_archive_link('for_educators'); ?>">
                        SEE ALL &nbsp; <i class="fas fa-arrow-right"></i>
                    </a>
                </p>
            </div>
        </div>
        <div class="row">
            <?php while( $for_educators->have_posts() ): ?>
                <?php $for_educators->the_post(); ?>
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
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>
