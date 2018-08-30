<!-- display details and description of web comics -->
<div id="primary" class="content-area">
	<main id="main" class="site-main">
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
										<?= the_content(); ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="wc-share">
										<h6>Share:</h6>
										<ul class="list-inline">
											<li class="list-inline-item"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" title="Share on Facebook."><i class="fab fa-facebook-f circle-icon"></i></a></li>
											<li class="list-inline-item"><a href="https://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" target="_blank" title="Tweet this!"><i class="fab fa-twitter circle-icon"></i></a></li>
											<li class="list-inline-item"><a class="copy-link" data-clipboard-text="<?php the_permalink(); ?>" tabindex="0" data-trigger="click" data-toggle="tooltip" title="Copy Link"><i class="fas fa-link circle-icon"></i></a></li>
											<li class="list-inline-item"><a href="mailto:?subject=Look at this website&body=Hi, I found this website and thought you might like it <?php the_title(); ?> - <?php the_permalink(); ?>" target=""><i class="fas fa-envelope circle-icon"></i></a></li>
										</ul>
									</div>
								</div>
							</div>

							<!-- Chapter links -->
							<?php if ( is_array($chapter_arr_rev) && count($chapter_arr_rev)): ?>
								<div id="chapters" class="row">
									<div class="col-12">
										<div class="wc-chapter-wrapper mt-4">
											<?php foreach ($chapter_arr_rev as $key => $value): ?>
												<div class="row no-gutters mb-4">
													<div class="col-sm-12 col-lg-4">
														<img class="w-100" src="<?= ($value['chapter_image']['url']) ? $value['chapter_image']['url'] : '' ; ?>">
													</div>
													<a class="col-sm-12 col-lg-8 chapter-link chapter-link--primary chapter-link-animated" href="?chapter=<?= count($chapter_arr) - $key; ?>">
														<h6><?= $value['chapter_title']; ?> <?= (!$key) ? '(Last Chapter)' : '' ; ?></h6><!-- <span class="up">UP</span> -->
													</a>
												</div>
											<?php endforeach; ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
						</div>

						<!-- Sidebar (Author) -->
						<div class="col-12 col-lg-4">
							<div class="sidebar">
								<div class="row">
									<div class="col-12 section-title">
										<h2>About Creator(s)</h2>
									</div>
								</div>
								<?php if ( is_array($creator_arr) && count($creator_arr)): ?>
									<?php foreach ($creator_arr as $key => $value): ?>
										<div class="row">
											<div class="col-3">
												<img class="rounded-circle w-100" src="<?= ($value['image']['url']) ? $value['image']['url'] : '' ; ?>">			
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