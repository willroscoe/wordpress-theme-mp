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
$epub_file_url = get_epub_file_url();
$buy_book_link = get_buy_book_link();
$downloadlinks = get_download_links();
?>

<article id="book-<?php the_ID(); ?>" <?php post_class('book-list-view'); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ($book_subtitle != "") { echo sprintf( '<h3 class="book-subtitle">%s</h3>', $book_subtitle ); } ?>

		<?php if ($book_authors != "") { echo sprintf( '<h4 class="book-authors">%s</h4>', $book_authors ); } ?>

	</header><!-- .entry-header -->
	<div class='book-list-view-body'>
		<?php matteringpress_post_thumbnail(); ?>
		<ul class='link-block'>
			<?php if ($epub_file_url != "") : ?>
				<li><span class='label'>Read</span> <span class='links'><a href='<?php echo esc_url( get_permalink() ) . "read"; ?>' class='colorbox donate' data-colorbox-href='#donate-popup' data-colorbox-inline='true'>online</a></a></li>
			<?php endif; ?>

			<?php if ($downloadlinks != "") : ?>
				<li><span class='label'>Download</span> <span class='links'><?php echo $downloadlinks ?></span></li>
			<?php endif; ?>

			<?php if ($buy_book_link != "") : ?>
				<li><span class='label'>Buy</span> <span class='links'><a href='<?php echo $buy_book_link ?>'>Paperback</a></a></li>
			<?php endif; ?>
		</ul>
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
