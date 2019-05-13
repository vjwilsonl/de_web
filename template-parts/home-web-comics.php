<?php
    /**
     * The web comics for the homepage
     *
     * This is the template that displays list of 4 web comics on home page
     *
     * @author  wilson(vjwilsonL@gmail.com)
     *
     * @link    https://developer.wordpress.org/reference/functions/get_template_part/
     *
     * @package difference-engine
     */
?>
<?php
    $args = array(
        'post_type'      => 'web_comics',
        'posts_per_page' => 4,
        'order'          => 'DESC',
        'orderby'        => 'ID',
    );
    $web_comics = new WP_Query( $args );
?>

<?php if ( $web_comics->have_posts() ): ?>
    <section class="section-webcomics border-top">
        <div class="row section-title">
            <div class="col-6">
                <a class="" href="<?= get_post_type_archive_link('web_comics'); ?>">
                    <h1>Read Online</h1>
                </a>
            </div>
            <div class="col-6">
                <p class="text-right align-middle webcomics-read-all">
                    <a class="" href="<?= get_post_type_archive_link('web_comics'); ?>">
                        SEE ALL &nbsp;<i class="fas fa-arrow-right"></i>
                    </a>
                </p>
            </div>
        </div>
        <div class="row">
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

                        <h2 class="webcomics-title">
                            <a class="" href="<?= get_post_permalink() ?>"> <?= the_title(); ?> </a>
                        </h2>
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
                                READ COMIC &nbsp;<i class="fas fa-arrow-right"></i>
                            </a>
                        </p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>