<?php 
/**
 * The jumbotron for the homepage
 *
 * This is the template that displays jumbotron on home page
 *
 * @author wilson(vjwilsonL@gmail.com)
 *
 * @link    https://developer.wordpress.org/reference/functions/get_template_part/
 *
 * @package difference-engine
 */
?>
<!-- Jumbotron-->
<section class="section-jumbotron">
<div class="jumbotron">
	<div class="row no-gutters">
		<div class="col-sm-12 jumbotron-image-mobile">
			<img class="w-100" src="<?= get_template_directory_uri() ?>/assets/images/DE_jumbotron_artmobile.jpg">
		</div>
		<div class="col-sm-12 col-lg-6 jumbotron-image">
		</div>
		<div class="col-sm-12 col-lg-6 jumbotron-caption bg-blue align-middle">
			<h1>Difference Engine is a Singapore-based independent comics publishing house.</h1>
			<p>We are inspired by the wealth of stories coming from Asia and are driven by the commitment to share those narratives with the world. We believe in sparking imagination through the make-believe, in the ability of visual storytelling to shape ideas, and in a reality powered by comics.</p>
			<!--<a class="btn btn--white btn-animated" href="#" role="button">Learn more<i class="fas fa-chevron-right" style="margin-left: 0.5em"></i></a>-->
			<!-- Subscription form -->
		<div class="form-bluebg">
			<h4>Subscribe to our newsletter</h4>
			<form class="form-subscription">
			  <div class="form-row">
				    <div class="col-6">
				      <input type="text" class="form-control" placeholder="Full Name">
				    </div>
				    <div class="col-6">
				      <input type="text" class="form-control" placeholder="Email">
				    </div>
			   </div>
			   <div class="form-row">
				    <div class="col-12">
				    	<div class="form-check">
					    	<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
							<label class="form-check-label" for="defaultCheck1">I've read and accept the <a class="link-animated after" href="#">terms and conditions.</a></label>
						</div>
				    </div>
				    <div class="col-12">
				      <button type="submit" class="btn btn--white btn-animated">Submit</button>
				    </div>
			  </div>
			</form>
		</div>
		</div>
	</div>
</div>
</section>