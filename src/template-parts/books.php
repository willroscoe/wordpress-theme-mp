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
// read online
$epub_file_url = "";
$enable_readonline = get_post_meta( get_the_ID(), 'enable_readonline', true );
$epub_file_attachment = get_post_meta( get_the_ID(), 'epub_file_attachment', true );
if ($epub_file_attachment != "" and $enable_readonline == TRUE)
{
	$epub_file_url = $epub_file_attachment['url'];
}

// buy online
$buy_book_link = get_post_meta( get_the_ID(), 'buy_book_link', true );

// download links
$downloadlinks = "";
build_download_link("PDF", "PDF");
build_download_link("ePub", "ePub");
build_download_link("mobi", "Kindle (mobi)");

function build_download_link($filetype, $filedesc)
{
	$thefile = get_post_meta( get_the_ID(), $filetype . '_file_attachment', true );
	if ($thefile != "") {
		if ($GLOBALS["downloadlinks"] != "") {
			$GLOBALS["downloadlinks"] .= ", ";
		}
		$GLOBALS["downloadlinks"] .= sprintf("<a href='%s'>" . $filedesc . "</a>", $thefile['url']);
	}
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'matteringpress' ); ?></span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->
	<div class='book-list-view-body'>
		<?php matteringpress_post_thumbnail(); ?>
		<ul class='link-block'>
			<?php if ($epub_file_url != "") : ?>
				<li><span class='label'>Read</span> <span class='links'><a href='/books/imagining-classrooms/read' class='colorbox donate' data-colorbox-href='#donate-popup' data-colorbox-inline='true'>online</a></a></li>
			<?php endif; ?>

			<?php if ($downloadlinks != "") : ?>
				<li><span class='label'>Download</span> <span class='links'><?php echo $downloadlinks ?></span></li>
			<?php endif; ?>

			<?php if ($buy_book_link != "") : ?>
				<li><span class='label'>Buy</span> <span class='links'><a href='<?php echo $buy_book_link ?>'>Paperback</a></a></li>
			<?php endif; ?>
		</ul>
	</div>

	
	
	<?php
		
	?>
	<?php if ($downloadlinks != "") { ?>
	<p>Download: <?php echo $downloadlinks ;?></p>
	<?php } ?>

	<?php the_excerpt(); ?>

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
