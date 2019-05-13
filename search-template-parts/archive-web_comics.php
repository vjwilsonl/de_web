<?php
    /**
     * The template for displaying archive pages
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
     *
     * @package Difference_Engine
     */
?>

<?php
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
                    READ COMIC <i class="fas fa-arrow-right"></i>
                </a>
            </p>
        </div>
    </div>


