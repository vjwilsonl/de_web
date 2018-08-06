<?php
/**
 * The template for displaying web comics single page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Difference_Engine
 */
while ( have_posts() ) :
	the_post();
	$creator_arr = get_field('creator');
	$chapter_arr = get_field('chapter');
	if (!empty($chapter_arr)) {
		$chapter_arr_rev = array_reverse($chapter_arr);

	}

	if (isset($_GET['chapter'])) {
		$chapter = strip_tags( trim( $_GET['chapter']));
		$valid_chapter = (count($chapter_arr) >= $chapter && !( $chapter <= 0)) ? true : false ;
	}
?>
			<?php if ($valid_chapter) : ?> <!-- show reader -->
				<?php include( locate_template( 'template-parts/webcomic/chapter.php', false, false )); ?>
			<?php else: ?> <!-- show web comic info -->
				<?php get_header(); ?>
				<?php include( locate_template( 'template-parts/webcomic/info.php', false, false )); ?>
				<?php get_footer(); ?>
			<?php endif; ?>
<?php
endwhile; // End of the loop.

