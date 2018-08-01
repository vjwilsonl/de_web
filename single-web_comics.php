<?php
/**
 * The template for displaying web comics single page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Difference_Engine
 */

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php 
		while ( have_posts() ) :
			the_post();
			$creator_arr = get_field('creator');
			$chapter_arr = get_field('chapter');
			if (!empty($chapter_arr)) {
				$chapter_arr = array_reverse($chapter_arr);

			}
			?>

			<main>
				<div class="container-fluid no-gutters px-0">
					<div class="row no-gutters">
						<div class="wc-banner">
							<img class="w-100" src="<?= (!empty(get_field('banner_image'))) ? get_field('banner_image')['url'] : '' ?>">
						</div>
					</div>
				</div>
				<div class="container">
					<section class="section-wc-single">
						<div class="row">
							<div class="wc-banner">
								<img src="">
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-lg-8">
								<div class="row mb-2">
									<div class="col-12 section-title">
										<h1><?= the_title(); ?></h1>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="wc-content-wrapper">
											<p><?= the_content(); ?></p>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="wc-share">
											<h6>Share:</h6>
											<ul class="list-inline">
												<li class="list-inline-item"><a class="w-inline-block social-share-btn fb" href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;">
<i class="fab fa-facebook-f circle-icon"></i></a></li>
												<li class="list-inline-item"><a class="w-inline-block social-share-btn tw" href="https://twitter.com/intent/tweet?" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=%20Check%20up%20this%20awesome%20content' + encodeURIComponent(document.title) + ':%20 ' + encodeURIComponent(document.URL)); return false;"><i class="fab fa-twitter circle-icon"></i></a></li>
												<li class="list-inline-item"><a href="facebook.com"><i class="fas fa-link circle-icon"></i></a></li>
												<li class="list-inline-item"><a href="facebook.com"><i class="fas fa-envelope circle-icon"></i></a></li>
											</ul>
										</div>
									</div>
								</div>

								<!-- Chapter links -->
								<div class="row">
									<div class="col-12">
										<div class="wc-chapter-wrapper mt-4">
											<?php foreach ($chapter_arr as $key => $value): ?>
												<div class="row no-gutters mb-4">
													<div class="col-sm-12 col-lg-4">
														<img class="w-100" src="<?= ($value['chapter_image']['url']) ? $value['chapter_image']['url'] : '' ; ?>">
													</div>
													<a class="col-sm-12 col-lg-8 chapter-link chapter-link--primary chapter-link-animated">
														<h6><?= $value['chapter_title']; ?> <?= (!$key) ? '(Last Chapter)' : '' ; ?></h6><!-- <span class="up">UP</span> -->
													</a>
												</div>
											<?php endforeach; ?>
										</div>
									</div>
								</div>
							</div>

							<!-- Sidebar (Author) -->
							<div class="col-12 col-lg-4">
								<div class="sidebar">
									<div class="row">
										<div class="col-12 section-title">
											<h2>About Creator(s)</h2>
										</div>
									</div>
									<?php foreach ($creator_arr as $key => $value): ?>
										<div class="row">
											<div class="col-3">
												<img class="rounded-circle w-100" src="<?= ($value['image']['url']) ? $value['image']['url'] : '' ; ?>">			
											</div>
											<div class="col-9">
												<h3><?= $value['name']; ?></h3>
												<strong><?= $value['role']; ?></strong>
												<?= $value['description']; ?>
											</div>
										</div>
										<br>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</section>
				</div>
			</main>
			<?php


		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
