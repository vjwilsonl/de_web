<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">


    <!-- Bootstrap CSS & JS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Archivo:400,600" rel="stylesheet">


	<?php wp_head(); ?>
</head>
<?php 
    global $wp;
    $current_url     = home_url( $wp->request ); 
    $current_url_w_q = home_url( $wp->request ). '/?chapter='. $chapter; 
    $curr_chapter    = $chapter_arr[($chapter - 1)];
    $has_previous    = ($chapter > 1) ? true : false;
    $has_next        = ($chapter < count($chapter_arr)) ? true : false;
?>
<header class="wc-header">
    <!--Web Header -->
    <div class="wc-pagination-web p-2">
        <div class="row no-gutters">
            <div class="col-4 pl-3">
                <div class="row p-2">
                    <div class="col-1">
                        <a href="<?= $current_url ?>#chapters">
                            <i class="fas fa-list-ul" style="color: white"></i>
                        </a>
                    </div>
                    <div class="col">
                        <h6 style="color: white; margin-bottom: 0"><?= the_title() ?> - <?= $curr_chapter['chapter_title']; ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <nav aria-label="Chapter navigation">
                  <ul class="pagination justify-content-center" style="margin-bottom: 0">
                    <li class="page-item p-0 <?= (!$has_previous) ? 'disabled' : ''; ?>">
                      <a class="page-link" href="<?= '?chapter='. ($chapter - 1); ?>" tabindex="-1"><i class="fas fa-angle-left"></i></a>
                    </li>
                    <li class="page-item p-0"><span class="chapter-pg">Ch. <?= $chapter; ?></span></li>
                    <li class="page-item p-0 <?= (!$has_next) ? 'disabled' : ''; ?>">
                      <a class="page-link" href="<?= '?chapter='. ($chapter + 1); ?>"><i class="fas fa-angle-right"></i></a>
                    </li>
                  </ul>
                </nav>
            </div>
            <div class="col-4 pr-3">
                <div class="wc-read-share text-right" id="#wc-read-share">
                    <ul class="list-inline p-0 m-0">
                        <li class="list-inline-item"><a href="https://www.facebook.com/sharer/sharer.php?u=<?= $current_url_w_q; ?>" target="_blank" title="Share on Facebook."><i class="fab fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="https://twitter.com/home/?status=<?= the_title(). ' - ' . $curr_chapter['chapter_title'] ; ?> - <?= $current_url_w_q; ?>" target="_blank" title="Tweet this!"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a class="copy-link" data-clipboard-text="<?= $current_url_w_q; ?>" tabindex="0" data-trigger="click" data-toggle="tooltip" title="Copy Link"><i class="fas fa-link"></i></a></li>
                        <li class="list-inline-item"><a href="mailto:?subject=Look at this website&body=Hi, I found this website and thought you might like it <?= the_title(). ': ' . $curr_chapter['chapter_title']; ?> - <?= $current_url_w_q; ?>" target=""><i class="fas fa-envelope"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile header -->
    <div class="wc-pagination-mobile p-2">
        <div class="row no-gutters">
            <div class="col-8 pl-3">
                <div class="row p-2">
                    <div class="col-1">
                        <i class="fas fa-list-ul" style="color: white"></i>
                    </div>
                    <div class="col">
                        <h6 style="color: white; margin-bottom: 0"><?= the_title() ?> - <?= $curr_chapter['chapter_title']; ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-4 pr-3">
                <div class="wc-read-share text-right" id="#wc-read-share">
                    <!-- Share button -->
                    <button type="button" class="p-2 share-buttons" data-toggle="modal" data-target="#share-modal">
                      <i class="fa fa-share-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Modal -->
<div class="modal fade" id="share-modal" tabindex="-1" role="dialog" aria-labelledby="share-modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Share this comic!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center">Share this webcomic and show support to the creator</p>
        <ul class="list-inline text-center m-0">
            <li class="list-inline-item"><a href="https://www.facebook.com/sharer/sharer.php?u=<?= $current_url_w_q; ?>" target="_blank" title="Share on Facebook."><i class="fab fa-facebook-f circle-icon"></i></a></li>
            <li class="list-inline-item"><a href="https://twitter.com/home/?status=<?= the_title(). ' - ' . $curr_chapter['chapter_title'] ; ?> - <?= $current_url_w_q; ?>" target="_blank" title="Tweet this!"><i class="fab fa-twitter circle-icon"></i></a></li>
            <li class="list-inline-item"><a class="copy-link" data-clipboard-text="<?= $current_url_w_q; ?>" tabindex="0" data-trigger="click" data-toggle="tooltip" title="Copy Link"><i class="fas fa-link circle-icon"></i></a></li>
            <li class="list-inline-item"><a href="mailto:?subject=Look at this website&body=Hi, I found this website and thought you might like it <?= the_title(). ': ' . $curr_chapter['chapter_title']; ?> - <?= $current_url_w_q; ?>" target=""><i class="fas fa-envelope circle-icon"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Fixed prev next bar for mobile -->
    <div class="wc-control wc-pagination-fix-mobile p-2">
        <div class="row no-gutters">
            <div class="col-12">
                <nav aria-label="Previous next navigation">
                  <ul class="pagination justify-content-center" style="margin-bottom: 0">
                    <li class="page-item p-0 <?= (!$has_previous) ? 'disabled' : ''; ?>">
                      <a class="page-link" href="<?= '?chapter='. ($chapter - 1); ?>" tabindex="-1"><i class="fas fa-angle-left"></i> Prev</a>
                    </li>
                    <li class="page-item p-0 mx-4"><span class="chapter-pg">Ch. <?= $chapter; ?></span></li>
                    <li class="page-item p-0 <?= (!$has_next) ? 'disabled' : ''; ?>">
                      <a class="page-link" href="<?= '?chapter='. ($chapter + 1); ?>">Next <i class="fas fa-angle-right"></i></a>
                    </li>
                  </ul>
                </nav>
            </div>
        </div>
    </div>

<!-- Main -->
<main>
    <div class="container">
        <section class="section-wc-content">
            <?php if (count($curr_chapter['comic_gallery'])): ?>
            <div class="row no-gutters">
                <div class="wc-img-area" style="max-width: 600px; margin: auto">
                    <?php foreach ($curr_chapter['comic_gallery'] as $key => $value): ?>
                    <img src="<?= $value['url'] ?>" class="w-100">
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="wc-share text-center">
                        <h6>Share this webcomic and show support for the creator!</h6>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="https://www.facebook.com/sharer/sharer.php?u=<?= $current_url_w_q; ?>" target="_blank" title="Share on Facebook."><i class="fab fa-facebook-f circle-icon"></i></a></li>
                            <li class="list-inline-item"><a href="https://twitter.com/home/?status=<?= the_title(). ' - ' . $curr_chapter['chapter_title'] ; ?> - <?= $current_url_w_q; ?>" target="_blank" title="Tweet this!"><i class="fab fa-twitter circle-icon"></i></a></li>
                            <li class="list-inline-item"><a class="copy-link" data-clipboard-text="<?= $current_url_w_q; ?>" tabindex="0" data-trigger="click" data-toggle="tooltip" title="Copy Link"><i class="fas fa-link circle-icon"></i></a></li>
                            <li class="list-inline-item"><a href="mailto:?subject=Look at this website&body=Hi, I found this website and thought you might like it <?= the_title(). ': ' . $curr_chapter['chapter_title']; ?> - <?= $current_url_w_q; ?>" target=""><i class="fas fa-envelope circle-icon"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<?php wp_footer(); ?>