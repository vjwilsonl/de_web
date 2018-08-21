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
<?php 

if (class_exists('acf')) {
	$jumbotron_title = get_field('jumbotron_title', 'options');
	$jumbotron_desc = get_field('jumbotron_description', 'options');
} else {
	$jumbotron_title = '';
	$jumbotron_desc = '';
}

?>
<section class="section-jumbotron">
<div class="jumbotron">
	<div class="row no-gutters">
		<div class="col-sm-12 jumbotron-image-mobile">
			<img class="w-100" src="<?= get_template_directory_uri() ?>/assets/images/DE_jumbotron_artmobile2.jpg">
		</div>
		<div class="col-sm-12 col-lg-6 jumbotron-image">
		</div>
		<div class="col-sm-12 col-lg-6 jumbotron-caption bg-blue align-middle">
			<h1><?= $jumbotron_title; ?></h1>
			<p><?= $jumbotron_desc; ?></p>
		<div class="form-bluebg">
			<h4>Subscribe to our newsletter</h4>
			<?php echo do_shortcode( '[contact-form-7 id="87" title="Mail Chimp" html_class="form-subscription"]' ); ?>
		</div>
		</div>
	</div>
</div>
</section>