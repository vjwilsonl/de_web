<?php
    /**
     * The carousel for the homepage
     *
     * This is the template that displays carousel on home page
     *
     * @author  wilson(vjwilsonL@gmail.com)
     *
     * @link    https://developer.wordpress.org/reference/functions/get_template_part/
     *
     * @package difference-engine
     */
?>
    <!-- Carousel-->
<?php if ( class_exists( 'acf' ) ): ?>
    <?php $carousel = get_field( 'carousel_images', 'option' ); ?>
    <section class="section-carousel">
        <div class="row no-gutters">
            <div class="col-12">
                <div id="homeCarouselIndicators" class="carousel slide home-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach ( $carousel as $key => $value ): ?>
                            <?php if ( isset( $value['poster']['url'] ) && $value['poster']['url'] ): ?>
                                <div class="carousel-item <?= ( ! $key ) ? 'active' : '' ?>">
                                    <a href="<?= ($value['url']) ? $value['url'] : ''?>" class="<?= ($value['url']) ? '' : 'disabled' ?>" >
                                        <img class="d-block w-100" src="<?= $value['poster']['url']; ?>" alt="<?= $value['poster']['alt'] ?>">
                                    </a>
                                    <div class="row no-gutters carousel-bottom">
                                        <div class="col-1 text-center">
                                            <p class="carousel-control">
                                                <a class="" href="#homeCarouselIndicators" role="button" data-slide="prev">
                                                    <span class="carousel-control-icon slide-left" aria-hidden="true">
                                                        <i class="fas fa-arrow-left"></i>
                                                    </span>
                                                </a>
                                            </p>
                                        </div>
                                        <div class="col-10 text-center">
                                            <p class="carousel-title">
                                                <a href="<?= ($value['url']) ? $value['url'] : ''?>" class=" <?= ($value['url']) ? '' : 'disabled' ?>" >
                                                    <?= ($value['title']) ? $value['title'] : ''?>
                                                </a>
                                            </p>
                                        </div>
                                        <div class="col-1 text-center">
                                            <p class="carousel-control">
                                                <a class="" href="#homeCarouselIndicators" role="button" data-slide="next">
                                                    <span class="carousel-control-icon slide-right" aria-hidden="true">
                                                        <i class="fas fa-arrow-right"></i>
                                                    </span>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-12">
                            <ol class="carousel-indicators">
                                <?php foreach ( $carousel as $key => $value ): ?>
                                    <li data-target="#homeCarouselIndicators" data-slide-to="<?= $key; ?>"
                                        class="<?= ( $key == 0 ) ? 'active' : ''; ?>">
                                    </li>
                                <?php endforeach; ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>