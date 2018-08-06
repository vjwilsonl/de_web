<?php 

function de_enqueue() {
	wp_register_style('de-style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_register_style('de-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	wp_register_style('de-fontawesome', get_template_directory_uri() . '/assets/lib/fontawesome/css/all.css' );

	wp_enqueue_style('de-style');
	wp_enqueue_style('de-responsive');
	wp_enqueue_style('de-fontawesome');

	wp_register_script('de-jseffects', get_template_directory_uri() . '/assets/js/effects.js');

	wp_enqueue_script('de-jseffects');

    //if (is_post_type_archive('news') || is_post_type_archive('features') || is_post_type_archive('web_comics')) {
    wp_register_script('de-clipboard', get_template_directory_uri() . '/assets/js/clipboard.js' , array(), FALSE, TRUE);

    wp_enqueue_script('de-clipboard');
    //}
}

?>