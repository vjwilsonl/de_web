<?php 
/**
 * The social url
 *
 * This is the template that displays list of social url
 *
 * @author wilson(vjwilsonL@gmail.com)
 *
 * @link    https://developer.wordpress.org/reference/functions/get_template_part/
 *
 * @package difference-engine
 */
?>
<?php if ( class_exists('acf')): ?>
	<?= (get_field('facebook_url', 'options')) ? '<li class="list-inline-item btn-wrapper"><a class="link-animated after" href="'. get_field('facebook_url', 'options') . ' ">facebook</a></li>' : '' ; ?>
	<?= (get_field('instagram_url', 'options')) ? '<li class="list-inline-item btn-wrapper"><a class="link-animated after" href="'. get_field('instagram_url', 'options') . ' ">instagram</a></li>' : '' ; ?>
	<?= (get_field('twitter_url', 'options')) ? '<li class="list-inline-item btn-wrapper"><a class="link-animated after" href="'. get_field('twitter_url', 'options') . ' ">twitter</a></li>' : '' ; ?>
<?php endif; ?>