<?php 
/**
 * The news for the homepage
 *
 * This is the template that displays list of 2 news on home page
 *
 * @author wilson(vjwilsonL@gmail.com)
 *
 * @link    https://developer.wordpress.org/reference/functions/get_template_part/
 *
 * @package difference-engine
 */
?>
<?php 
	$args = array(
		'post_type'      => 'news',
		'posts_per_page' => 2,
		'order'          => 'DESC',
		'orderby'        => 'ID'
	);
	$news = new WP_Query( $args );
?>
<section class="section-news">
	<div class="row">
		<div class="col-12 section-title">
			<h1>News</h1>
		</div>
	</div>
	<div class="row blog-block mt-4">
		<?php while ( $news->have_posts() ): ?>
			<?php $news->the_post(); 
				$trimmed_content = wp_filter_nohtml_kses( wp_trim_words( get_the_content(), 25, "" ) );
				$publish_date = get_the_date( 'F j, Y');
			?>
			<div class="col-sm-12 col-lg-6">
				<div class="card">
				    <img class="card-img-top" src="<?= get_the_post_thumbnail_url() ?>" alt="Card image cap">
				    <a class="blog-caption hvr-underline-from-left" href="<?= get_post_permalink() ?>">
					    <div class="card-body p-1">
						    	<p class="card-text"><?= $publish_date ?></p>
							    <h3 class="card-title"><?= the_title(); ?></h3>
							    <p class="card-text"><?= $trimmed_content; ?></p>
				    	</div>
			    	</a>
			    </div>
			</div>
		<?php endwhile; ?>
	</div>
</section>