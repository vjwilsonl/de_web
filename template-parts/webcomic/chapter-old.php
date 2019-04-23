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
    <!-- Bootstrap CSS & JS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Archivo:400,600" rel="stylesheet">
    <link href="//cloud.typenetwork.com/projects/2596/fontface.css/" rel="stylesheet" type="text/css">

    <?php wp_head(); ?>
</head>

<body class="webcomic-chapter-read">
<div class="container-fluid">
    <header class="webcomic-chapter-header">
        <!--Web Header -->
        <div class="webcomic-chapter-header-web">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-4">
                        <div class="row">
                            <div class="col-4 text-center">
                                <a href="/">
                                    <img alt="Difference Engine" src="<?= $sticky_header_logo_url ?>" class=" header-logo" />
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
                                    <span class="chapter-pg">CHAPTER <?= $chapter; ?></span>
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
<!--        <div class="webcomic-chapter-header">-->
<!--            <div class="row no-gutters">-->
<!--                <div class="col-8">-->
<!--                    <div class="row">-->
<!--                        <div class="col-1">-->
<!--                            <a href="/">-->
<!--                                <i class="fas fa-home"></i>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                        <div class="col">-->
<!--                            <h6>--><?//= the_title() ?><!-- | --><?//= $curr_chapter['chapter_title']; ?><!--</h6>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-4 pr-3">-->
<!--                    <div class="wc-read-share text-right" id="#wc-read-share">-->
                        <!-- Share button -->
<!--                        <button type="button" class="p-2 share-buttons" data-toggle="modal" data-target="#share-modal">-->
<!--                            <i class="fa fa-share-alt" aria-hidden="true"></i>-->
<!--                        </button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </header>
</div>

<!-- Fixed prev next bar for mobile -->
<div class="webcomic-chapter-fix">
    <div class="row mx-auto my-auto">
        <div id="recipeCarousel" class="carousel slide w-100" >
            <div class="carousel-inner w-100" role="listbox">
                <!-- Chapter links -->
                <?php if ( is_array( $chapter_arr_rev ) && count( $chapter_arr_rev ) ): ?>
                    <?php foreach ( $chapter_arr_rev as $key => $value ): ?>

                        <div class="carousel-item <?= ( (count( $chapter_arr ) - $key) == $chapter )? "active" : ""?>">
                            <div class="d-block col-3">
                                <div class="col-12 chapter-cover">
                                    <img alt="<?= $value['chapter_title']; ?>" class="chapter-image"  src="<?= ( $value['chapter_image']['url'] ) ? $value['chapter_image']['url'] : ''; ?>">
                                </div>
                                <div class="col-12 chapter-body">
                                    <div class="webcomic-title" >
                                        <p class="chapter-no"><?= $value['chapter_no']; ?> <?= ( ! $key ) ? '(Final Chapter)' : ''; ?></p><!-- <span class="up">UP</span> -->
                                        <h6 class="chapter-title"><?= $value['chapter_title']; ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<script>
  $('#recipeCarousel').carousel('pause');

  $('.carousel .carousel-item').each(function(){
    let next = $(this).next();
    if (!next.length) {
      // next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (let i = 0; i < 4; i++) {
      next=next.next();
      if (!next.length) {
        // next = $(this).siblings(':first');
      }

      next.children(':first-child').clone().appendTo($(this));
    }
  });

</script>

</body>
</html>


<!--<div class="row chapterSlide">-->
<!--    --><?php //if ( is_array( $chapter_arr_rev ) && count( $chapter_arr_rev ) ): ?>
<!--        --><?php //foreach ( $chapter_arr_rev as $key => $value ): ?>
<!--            <div class="d-block --><?//= ( (count( $chapter_arr ) - $key) == $chapter )? "active" : ""?><!--">-->
<!--                <a href="?chapter=--><?//= count( $chapter_arr ) - $key; ?><!--">-->
<!--                    <div class="col-12 chapter-cover">-->
<!--                        <img alt="--><?//= $value['chapter_title']; ?><!--" class="chapter-image"  src="--><?//= ( $value['chapter_image']['url'] ) ? $value['chapter_image']['url'] : ''; ?><!--">-->
<!--                    </div>-->
<!--                    <div class="col-12 chapter-body">-->
<!--                        <div class="webcomic-title" >-->
<!--                            <p class="chapter-no">--><?//= $value['chapter_no']; ?><!-- --><?//= ( ! $key ) ? '(Final Chapter)' : ''; ?><!--</p><!-- <span class="up">UP</span> -->-->
<!--                            <h6 class="chapter-title">--><?//= $value['chapter_title']; ?><!--</h6>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--        --><?php //endforeach; ?>
<!--    --><?php //endif; ?>
<!--</div>-->