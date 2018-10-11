<?php 
/**
 * The features for the homepage
 *
 * This is the template that displays list of 2 features on home page
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
		'post_type'      => 'features',
		'posts_per_page' => 2,
		'order'          => 'DESC',
		'orderby'        => 'ID'
	);
	$features = new WP_Query( $args );
?>
<?php if ($features->have_posts()): ?>	
<section class="section-features">
	<div class="row">
		<div class="col-12 section-title">
			<h1>Features</h1>
		</div>
	</div>
	<div class="row blog-block mt-4">
		<?php while ( $features->have_posts() ): ?>
			<?php $features->the_post(); 

				$artist_name = (class_exists('acf')) ? ((get_field('artist_name')) ? get_field('artist_name') : '') : '' ;
				$trimmed_content = wp_trim_words( get_the_content(), 25, "" );
				$publish_date = get_the_date( 'F j, Y');

			?>
			<div class="col-sm-12 col-lg-6">
				<div class="card">
				    <div class="card-img-wrapper">
					    <img class="card-img-top" src="<?= get_the_post_thumbnail_url() ?>" alt="Card image cap">
					    <div class="caption">
	            			<h4><?= $artist_name; ?></h4>
						</div>
					</div>
				    <a class="blog-caption hvr-underline-from-left" href="<?= get_post_permalink() ?>">
					    <div class="card-body p-1">
					    	<p class="card-text"><?= $publish_date; ?></p>
						    <h3 class="card-title"><?= the_title(); ?></h3>
						    <p class="card-text"><?= $trimmed_content; ?> (...)</p>
				    	</div>
			    	</a>
			    </div>
			</div>
		<?php endwhile; ?>
	</div>
</section>
<?php endif; ?>