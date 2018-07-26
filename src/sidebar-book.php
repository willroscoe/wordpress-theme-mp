<?php
/**
 * The template for the content bottom widget areas on posts and pages
 *
 * @package Mattering_Press
 * @subpackage Mattering_Press
 * @since Mattering Press 1.0
 */
?>

<aside id="book-sidebar" class="sidebar widget-area book-sidebar" role="complementary">
	<section id="subpages-widget-2" class="widget widget_subpages">

		<?php matteringpress_post_thumbnail(); ?>
		<h2><?php the_title(); ?></h2>
		<?php do_action( 'mp_books_get_book_meta_info' ); ?>
		
		<?php do_action('mp_books_get_book_links'); ?>

	</section>
</aside><!-- #book-sidebar -->
