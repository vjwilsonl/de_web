<?php 
/**
 * The carousel for the homepage
 *
 * This is the template that displays carousel on home page
 *
 * @author wilson(vjwilsonL@gmail.com)
 *
 * @link    https://developer.wordpress.org/reference/functions/get_template_part/
 *
 * @package difference-engine
 */
?>
<!-- Carousel-->
<?php if (class_exists('acf')): ?>
<?php 
	$carousel = get_field('carousel_images', 'option'); 
	// d($carousel);
?>
<section class="section-carousel">
	<div class="row no-gutters">
		<div class="col-12">
	   		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			  	<?php foreach ($carousel as $key => $value): ?>
			  		<?php if (isset($value['poster']['url']) && $value['poster']['url']): ?>
					    <div class="carousel-item <?= (!$key) ? 'active' : '' ?>">
					      <img class="d-block w-100" src="<?= $value['poster']['url']; ?>" alt="<?= $value['poster']['alt'] ?>">
					    </div>
					<?php endif; ?>
				<?php endforeach; ?>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			  	<span class="carousel-control-icon hvr-backward" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
			    <!--<span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			  	<span class="carousel-control-icon hvr-forward" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
			    <!--<span class="carousel-control-next-icon" aria-hidden="true"></span>-->
			    <span class="sr-only">Next</span>
			  </a>
			  <ol class="carousel-indicators">
			  	<?php foreach ($carousel as $key => $value): ?>
			    	<li data-target="#carouselExampleIndicators" data-slide-to="<?= $key; ?>" 
			    		class="<?= ($key == 0) ? 'active' : '' ; ?>">
			    	</li>
				<?php endforeach; ?>
			  </ol>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>