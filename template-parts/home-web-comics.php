<?php 
/**
 * The web comics for the homepage
 *
 * This is the template that displays list of 4 web comics on home page
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
		'post_type'      => 'web_comics',
		'posts_per_page' => 4,
		'order'          => 'DESC',
		'orderby'        => 'ID'
	);
	$web_comics = new WP_Query( $args );
?>	
	
<?php if ( $web_comics->have_posts() ): ?>
<div class="container">
	<section class="section-webcomics">
			<div class="row">
				<div class="col-12 section-title">
					<h1>Web Comics</h1>
				</div>
			</div>
			<div class="row webcomics-block mt-4">
				<?php while ($web_comics->have_posts()): ?>
					<?php 
						$web_comics->the_post();
						$artist_name = (class_exists('acf')) ? ((get_field('artist_name')) ? get_field('artist_name') : '') : '' ;
						$status_flag = (class_exists('acf')) ? ((get_field('status_flag')) ? get_field('status_flag') : '') : '' ;
						$flag_class = ($status_flag) ? ((strtolower($status_flag) == 'new') ? 'flag-new' : 'flag-comingsoon') : '';
					?>
				<div class="col-sm-6 col-lg-3">
					<!-- Image thumbnail -->
				    <a class="thumbnail text-left hvr-underline-from-left" href="<?= get_post_permalink() ?>">
				    	<div class="caption">
				            <h2><?= the_title(); ?></h2>
				            <p>By <?= $artist_name; ?></p>
				        </div>	
				        <div class="overlay">
				        	<img src="<?= get_the_post_thumbnail_url() ?>" alt="" class="webcomics-cover">
				        </div>
				  	</a>
			        <!-- New flag -->
			        <?php if ($status_flag && (strtolower($status_flag) != 'none')): ?>
				        <div class="flag-wrapper">
							<strong class="<?= $flag_class; ?> flag"><?= $status_flag; ?></strong>
						</div>  
					<?php endif; ?>  
				</div>
				<?php endwhile; ?>
			</div>
	</section>
</div>
<?php endif; ?>