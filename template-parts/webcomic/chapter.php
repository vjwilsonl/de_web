<?php
    global $wp;
    $current_url     = home_url( $wp->request );
    $current_url_w_q = home_url( $wp->request ) . '/?chapter=' . $chapter;
    $curr_chapter    = $chapter_arr[ ( $chapter - 1 ) ];
    $has_previous    = ( $chapter > 1 ) ? TRUE : FALSE;
    $has_next        = ( $chapter < count( $chapter_arr ) ) ? TRUE : FALSE;

    $sticky_header_logo     = get_field( 'sticky_header_logo', 'option' );
    $sticky_header_logo_url = ( isset( $sticky_header_logo['url'] ) ) ? $sticky_header_logo['url'] : get_template_directory_uri() . '/assets/images/DifferenceEngine-StickyLogo.svg';
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <title><?= the_title() ?> | <?= $curr_chapter['chapter_title']; ?></title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri() ?>/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri() ?>/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= get_template_directory_uri() ?>/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= get_template_directory_uri() ?>/assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?= get_template_directory_uri() ?>/assets/favicon/safari-pinned-tab.svg" color="#0077c8">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap CSS & JS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

    <?php wp_head(); ?>
</head>

<body class="webcomic-chapter-read">
<div class="container-fluid">
    <header class="webcomic-chapter-header">
        <!--Web Header -->
        <div class="webcomic-chapter-header-web hidden-md-down">
            <div class="container">
                <div class="row no-gutters">

                    <div class="col-4">
                        <div class="row">
                            <div class="col-4 text-center">
                                <a href="/">
                                    <img alt="Difference Engine" src="<?= $sticky_header_logo_url ?>" class="img-fluid header-logo" />
                                </a>
                            </div>
                            <div class="col-8 text-center">
                                <h4 class="chapter-title"><?= the_title() ?> | <?= $curr_chapter['chapter_title']; ?></h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <nav aria-label="Chapter navigation">
                            <ul class="pagination justify-content-center" >
                                <li class="page-item <?= ( ! $has_previous ) ? 'disabled' : ''; ?>">
                                    <a class="page-link" href="<?= '?chapter=' . ( $chapter - 1 ); ?>" tabindex="-1"><i class="fas fa-angle-left"></i></a>
                                </li>
                                <li class="page-item">
                                    <button class="chapter-no toggle-button"><span class="chapter-pg">CHAPTER <?= $chapter; ?></span></button>
                                </li>
                                <li class="page-item <?= ( ! $has_next ) ? 'disabled' : ''; ?>">
                                    <a class="page-link" href="<?= '?chapter=' . ( $chapter + 1 ); ?>"><i class="fas fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>

        <!-- Mobile header -->
        <div class="webcomic-chapter-header-mobile hidden-lg-up">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-1">
                        <a href="/" class="homeLink">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                    <div class="col-11 text-center">
                        <h6>
                            <button class="chapter-no toggle-button">
                                <span class="chapter-pg">CHAPTER <?= $chapter; ?> | <?= $curr_chapter['chapter_title']; ?></span>
                            </button>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>

<!-- Chapter Bar -->
<div class="webcomic-chapter-bar-top" style="display: none;">
    <div class="container-fluid">
        <div class="row mx-auto my-auto">
            <div class="col-1 text-center">
                <p class="carousel-control">
                    <a class="" href="#chapter-bar-top" role="button" data-slide="prev">
                        <span class="carousel-control-icon slide-left" aria-hidden="true">
                            <i class="fas fa-angle-left"></i>
                        </span>
                    </a>
                </p>
            </div>
            <div class="col-10">
                <div id="chapter-bar-top" class="carousel" >
                    <div class="carousel-inner col-12" role="listbox">
                        <!-- Chapter links -->
                        <?php if ( is_array( $chapter_arr_rev ) && count( $chapter_arr_rev ) ): ?>
                            <?php $row = 1 ?>
                            <?php foreach ( $chapter_arr_rev as $key => $value ): ?>

                                <div class="carousel-item <?= ( (count( $chapter_arr ) - $key) == $row )? "active" : ""?>">
                                    <div class="d-block col-12 col-sm-12 col-md-6 col-lg-3 chapter-card <?= ( (count( $chapter_arr ) - $key) == $chapter )? "active" : ""?>">
                                        <div class="d-block col-12 chapter-cover">
                                            <a href="<?= '?chapter='. ((count( $chapter_arr ) - $key)); ?>" >
                                                <img alt="<?= $value['chapter_title']; ?>" class="chapter-image"  src="<?= ( $value['chapter_image']['url'] ) ? $value['chapter_image']['url'] : ''; ?>">
                                            </a>
                                        </div>
                                        <div class="d-block col-12 chapter-body">
                                            <div class="webcomic-title" >
                                                <a href="<?= '?chapter='. ((count( $chapter_arr ) - $key)); ?>" >
                                                    <p class="chapter-no"><?= $value['chapter_no']; ?> <?= ( ! $key ) ? '(Final Chapter)' : ''; ?></p><!-- <span class="up">UP</span> -->
                                                    <h6 class="chapter-title"><?= $value['chapter_title']; ?></h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-1 text-center">
                <p class="carousel-control">
                    <a class="" href="#chapter-bar-top" role="button" data-slide="next">
                        <span class="carousel-control-icon slide-right" aria-hidden="true">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="row no-gutters toggle-bar">
        <div class="col-12 text-center">
            <button class="toggle-button">
                <i class="fas fa-angle-up"></i>
            </button>
        </div>
    </div>
</div>

<!-- Main -->
<main>
    <div class="container">
        <section class="section-webcomic-content">
            <br>
            <?php if ( is_array( $curr_chapter['comic_gallery'] ) && count( $curr_chapter['comic_gallery'] ) ): ?>
                <div class="row no-gutters">
                    <div class="webcomic-img-area" style="max-width: 600px; margin: auto">
                        <?php foreach ( $curr_chapter['comic_gallery'] as $key => $value ): ?>
                            <img alt="<?= $curr_chapter['chapter_title']; ?>" src="<?= $value['url']; ?>" class="w-100">
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="row no-gutters">
                <div class="col-12">
                    <div class="webcomic-share text-center">
                        <h6>Share this comic <br/> and show support for the creator!</h6>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $current_url_w_q; ?>" target="_blank" title="Share on Facebook.">
                                    <span class="fa-stack">
                                        <i class="fal fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://twitter.com/home/?status=<?= the_title() . ' - ' . $curr_chapter['chapter_title']; ?> - <?= $current_url_w_q; ?>" target="_blank" title="Tweet this!">
                                    <span class="fa-stack">
                                        <i class="fal fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="copy-link" data-clipboard-text="<?= $current_url_w_q; ?>" tabindex="0" data-trigger="click" data-toggle="tooltip" title="Copy Link">
                                    <span class="fa-stack">
                                        <i class="fal fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-link fa-stack-1x"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="mailto:?subject=Look at this website&body=Hi, I found this website and thought you might like it <?= the_title() . ': ' . $curr_chapter['chapter_title']; ?> - <?= $current_url_w_q; ?>" target="">
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
        </section>
    </div>
</main>

<!-- Chapter Bar -->
<div class="webcomic-chapter-bar-bottom" >
    <div class="row mx-auto my-auto">
        <div class="col-1 text-center">
            <p class="carousel-control">
                <a class="" href="#chapter-bar-bottom" role="button" data-slide="prev">
                    <span class="carousel-control-icon slide-left" aria-hidden="true">
                        <i class="fas fa-angle-left"></i>
                    </span>
                </a>
            </p>
        </div>
        <div class="col-10 w-100">
            <div id="chapter-bar-bottom" class="carousel w-100" >
                <div class="carousel-inner w-100" role="listbox">
                    <!-- Chapter links -->
                    <?php if ( is_array( $chapter_arr_rev ) && count( $chapter_arr_rev ) ): ?>
                        <?php $row = 1 ?>
                        <?php foreach ( $chapter_arr_rev as $key => $value ): ?>

                            <div class="carousel-item <?= ( (count( $chapter_arr ) - $key) == $row )? "active" : ""?>">
                                <div class="d-block col-12 col-sm-12 col-md-6 col-lg-3 chapter-card <?= ( (count( $chapter_arr ) - $key) == $chapter )? "active" : ""?>">
                                    <div class="d-block col-12 chapter-cover">
                                        <a href="<?= '?chapter='. ((count( $chapter_arr ) - $key)); ?>" >
                                            <img alt="<?= $value['chapter_title']; ?>" class="chapter-image img-fluid"  src="<?= ( $value['chapter_image']['url'] ) ? $value['chapter_image']['url'] : ''; ?>">
                                        </a>
                                    </div>
                                    <div class="d-block col-12 chapter-body">
                                        <div class="webcomic-title" >
                                            <a href="<?= '?chapter='. ((count( $chapter_arr ) - $key)); ?>" >
                                                <p class="chapter-no"><?= $value['chapter_no']; ?> <?= ( ! $key ) ? '(Final Chapter)' : ''; ?></p><!-- <span class="up">UP</span> -->
                                                <h6 class="chapter-title"><?= $value['chapter_title']; ?></h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-1 text-center">
            <p class="carousel-control">
                <a class="" href="#chapter-bar-bottom" role="button" data-slide="next">
                    <span class="carousel-control-icon slide-right" aria-hidden="true">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </p>
        </div>
    </div>
</div>

<script>
  // Add your javascript here

  $('.carousel .carousel-item').each(function(){
    let next = $(this).next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    // for (let i = 0; i < 4; i++) {
    //   next=next.next();
    //   if (!next.length) {
    //     next = $(this).siblings(':first');
    //   }
    //   next.children(':first-child').clone().appendTo($(this));
    // }
  });

  $(".toggle-button").click(function () {
    $(".webcomic-chapter-bar-top").slideToggle("slow");
  })

</script>

</body>
</html>