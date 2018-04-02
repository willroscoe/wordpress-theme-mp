<?php
/**
 * The template for the content bottom widget areas on posts and pages
 *
 * @package Mattering_Press
 * @subpackage Mattering_Press
 * @since Mattering Press 1.0
 */
?><?php
	$buy_book_link = get_buy_book_link();
	$downloadlinks = get_download_links();
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
		<ul class='link-block'>
			<?php if ($downloadlinks != "") : ?>
				<li><span class='label'>Download</span> <span class='links'><?php echo $downloadlinks ?></span></li>
			<?php endif; ?>

			<?php if ($buy_book_link != "") : ?>
				<li><span class='label'>Buy</span> <span class='links'><a href='<?php echo $buy_book_link ?>'>Paperback</a></a></li>
			<?php endif; ?>
		</ul>
	</section>
</aside><!-- #book-sidebar -->
