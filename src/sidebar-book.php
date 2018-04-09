<?php
/**
 * The template for the content bottom widget areas on posts and pages
 *
 * @package Mattering_Press
 * @subpackage Mattering_Press
 * @since Mattering Press 1.0
 */
?><?php
	$book_subtitle = get_book_subtitle();
	$book_authors = get_book_authors();
?>

<aside id="book-sidebar" class="sidebar widget-area book-sidebar" role="complementary">
	<section id="subpages-widget-2" class="widget widget_subpages">
		<!--<h2 class="widget-title">
			<?php the_title(); ?>
		</h2>
		<h3><?php echo $book_subtitle; ?></h3>
		<h4><?php echo $book_authors; ?></h4>-->
	
		<?php matteringpress_post_thumbnail(); ?>
		
		<?php get_book_links_block(); ?>

	</section>
</aside><!-- #book-sidebar -->
