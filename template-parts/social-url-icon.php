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
	<?= (get_field('facebook_url', 'options')) ? '<li class="list-inline-item"><a href="'. get_field('facebook_url', 'options') . ' "><i class="fab fa-facebook"></i></a></li>' : '' ; ?>
	<?= (get_field('instagram_url', 'options')) ? '<li class="list-inline-item"><a href="'. get_field('instagram_url', 'options') . ' "><i class="fab fa-twitter"></i></a></li>' : '' ; ?>
	<?= (get_field('twitter_url', 'options')) ? '<li class="list-inline-item"><a href="'. get_field('twitter_url', 'options') . ' "><i class="fab fa-instagram"></i></a></li>' : '' ; ?>
<?php endif; ?>