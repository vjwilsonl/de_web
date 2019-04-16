<!-- display details and description of web comics -->
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <main>
            <div class="container">
                <div class="row no-gutters">
                    <div class="wc-banner">
                        <img class="w-100" alt="<?= the_title(); ?>" src="<?= ( ! empty( get_field( 'banner_image' ) ) ) ? get_field( 'banner_image' )['url'] : '' ?>">
                    </div>
                </div>
            </div>
            <div class="container">
                <section class="section-webcomic-single">
                    <div class="row">
                        <div class="col-12 col-lg-9">
                            <div class="row mb-2">
                                <div class="col-12 section-title">
                                    <h1><?= the_title(); ?></h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="wc-content-wrapper">
                                        <?= the_content(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="share-buttons">
                                        <ul class="list-inline">
                                            <li class="list-inline-item" style="width: 100px;"><p>Share this comic!</p></li>
                                            <li class="list-inline-item">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" title="Share on Facebook.">
                                                    <span class="fa-stack">
                                                        <i class="fal fa-circle fa-stack-2x"></i>
                                                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="https://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" target="_blank" title="Tweet this!">
                                                    <span class="fa-stack">
                                                        <i class="fal fa-circle fa-stack-2x"></i>
                                                        <i class="fab fa-twitter fa-stack-1x"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="copy-link" data-clipboard-text="<?php the_permalink(); ?>" tabindex="0" data-trigger="click" data-toggle="tooltip" title="Copy Link">
                                                    <span class="fa-stack">
                                                        <i class="fal fa-circle fa-stack-2x"></i>
                                                        <i class="fas fa-link fa-stack-1x"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="mailto:?subject=Look at this website&body=Hi, I found this website and thought you might like it <?php the_title(); ?> - <?php the_permalink(); ?>" target="">
                                                    <span class="fa-stack">
                                                        <i class="fal fa-circle fa-stack-2x"></i>
                                                        <i class="fas fa-envelope fa-stack-1x"></i>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Chapter links -->
                            <?php if ( is_array( $chapter_arr_rev ) && count( $chapter_arr_rev ) ): ?>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="webcomic-chapters-wrapper">
                                            <?php foreach ( $chapter_arr_rev as $key => $value ): ?>
                                                <div class="row no-gutters webcomic-chapter">
                                                    <div class="col-sm-12 col-lg-5 chapter-cover">
                                                        <img alt="<?= $value['chapter_title']; ?>" class="chapter-image"  src="<?= ( $value['chapter_image']['url'] ) ? $value['chapter_image']['url'] : ''; ?>">
                                                    </div>
                                                    <div class="col-sm-12 col-lg-7 chapter-body">
                                                        <div class="row no-gutters">
                                                            <div class="col-8 webcomic-title" >
                                                                <p class="chapter-no"><?= $value['chapter_no']; ?> <?= ( ! $key ) ? '(Last Chapter)' : ''; ?></p><!-- <span class="up">UP</span> -->
                                                                <h6 class="chapter-title"><?= $value['chapter_title']; ?></h6>
                                                            </div>
                                                            <div class="col-4">
                                                                <p class="text-right align-middle chapter-read">
                                                                    <a href="?chapter=<?= count( $chapter_arr ) - $key; ?>">
                                                                        READ &nbsp; <i class="fas fa-arrow-right"></i>
                                                                    </a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Sidebar (Author) -->
                        <div class="col-12 col-lg-3">
                            <div class="sidebar">
                                <div class="row">
                                    <div class="col-12 section-title">
                                        <h2>Creator(s)</h2>
                                    </div>
                                </div>
                                <?php if ( is_array( $creator_arr ) && count( $creator_arr ) ): ?>
                                    <?php foreach ( $creator_arr as $key => $value ): ?>
                                        <div class="row">
                                            <div class="col-3">
                                                <img alt="<?= $value['name']; ?>" class="rounded-circle w-100" src="<?= ( $value['image']['url'] ) ? $value['image']['url'] : ''; ?>">
                                            </div>
                                            <div class="col-9 wc-creator-section">
                                                <h3><?= $value['name']; ?></h3>
                                                <strong><?= $value['role']; ?></strong>
                                                <?= $value['description']; ?>
                                            </div>
                                        </div>
                                        <br>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </main><!-- #main -->
</div><!-- #primary -->