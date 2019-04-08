<?php
/**
 * Difference Engine functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Difference_Engine
 */

if ( ! function_exists( 'difference_engine_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function difference_engine_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Difference Engine, use a find and replace
		 * to change 'difference-engine' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'difference-engine', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'difference-engine' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'difference_engine_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'difference_engine_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function difference_engine_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'difference_engine_content_width', 640 );
}
add_action( 'after_setup_theme', 'difference_engine_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function difference_engine_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'difference-engine' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'difference-engine' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'difference_engine_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function difference_engine_scripts() {
	wp_enqueue_style( 'difference-engine-style', get_stylesheet_uri() );

	wp_enqueue_script( 'difference-engine-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'difference-engine-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'difference_engine_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Includes
include( get_template_directory() . '/include/enqueue.php' );

// Hooks
add_action('wp_enqueue_scripts', 'de_enqueue');

/**
*	Custom Theme Options Page
*
**/
if ( function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' => 'Theme Options',
		'menu_title' => 'Theme Options',
		'menu_slug'	 => 'theme-options',
		'capability' => 'edit_posts',
		'parent_slug'=> '',
		'position'   => false,
		'icon_url'	 => false
		)
	);


}

// Nav walker

require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

//remove span from contact form 7 element
// add_filter('wpcf7_form_elements', function($content) {
//     $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

//     return $content;
// });

/**
 * Posts per page for CPT archive
 * prevent 404 if posts per page on main query
 * is greater than the posts per page for product cpt archive
 *
 */

function prefix_change_cpt_archive_per_page( $query ) {

	if ( $query->is_main_query() && ! is_admin() && is_post_type_archive( 'news' ) ) {
		$query->set( 'posts_per_page', '6' );
	}

    if ( $query->is_main_query() && ! is_admin() && is_post_type_archive( 'features' ) ) {
        $query->set( 'posts_per_page', '6' );
    }

    if ( $query->is_main_query() && ! is_admin() && is_post_type_archive( 'web_comics' ) ) {
        $query->set( 'posts_per_page', '9' );
    }

}
add_action( 'pre_get_posts', 'prefix_change_cpt_archive_per_page' );


// Pagination
function get_bootstrap_paginate_links($query) {
	global $paged;
	$pages = $query->max_num_pages;

	if(!$pages)
		$pages = 1;


	if(1 != $pages)
	{
		echo '<nav aria-label="Page navigation">';
		echo '<ul class="pagination justify-content-center">';
		//echo '<li class="page-item disabled hidden-md-down d-none d-lg-block"><span class="page-link">Page '.$paged.' of '.$pages.'</span></li>';

		if($paged > 1) {
			echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( $paged - 1 ) . '" aria-label="Previous Page"><span class="d-md-block">Previous</span></a></li>';
		} else {
			echo '<li class="page-item disabled"><span class="page-link d-md-block">Previous</span></li>';
		}

		for ($i=1; $i <= $pages; $i++)
		{
			echo ($paged == $i)? '<li class="page-item active"><span class="page-link">'.$i.'</span></li>' : '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($i).'"><span class="sr-only">Page </span>'.$i.'</a></li>';
		}

		if ($paged < $pages) {
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged + 1).'" aria-label="Next Page"><span class="d-md-block">Next </span></a></li>';
		} else {
			echo '<li class="page-item disabled"><span class="page-link d-md-block">Next</span></li>';
		}


		echo '</ul>';
		echo '</nav>';
	}
}