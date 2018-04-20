<?php
/**
 * The template part for displaying list of books
 *
 * @package Mattering_Press
 * @subpackage Mattering_Press
 * @since Mattering Press 1.0
 */
?>
<?php
$book_subtitle = get_book_subtitle();
$book_authors = get_book_authors();
?>

<article id="book-<?php the_ID(); ?>" <?php post_class('book-list-view'); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="book-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ($book_subtitle != "") { echo sprintf( '<h3 class="book-subtitle">%s</h3>', $book_subtitle ); } ?>

		<?php if ($book_authors != "") { echo sprintf( '<h4 class="book-authors">%s</h4>', $book_authors ); } ?>

	</header><!-- .entry-header -->
	<div class='book-list-view-body'>
		<?php matteringpress_post_thumbnail("book-thumbnail"); ?>

		<?php get_book_links_block(); ?>

	</div>
	<div class="book-item-body">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer">
		<?php matteringpress_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'matteringpress' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
