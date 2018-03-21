<?php
/**
 * The template part for displaying list of books
 *
 * @package Mattering_Press
 * @subpackage Mattering_Press
 * @since Mattering Press 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'matteringpress' ); ?></span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->
	
	<?php matteringpress_post_thumbnail(); ?>
	
	<?php
		$downloadlinks = "";
		$epub_file = get_post_meta( get_the_ID(), 'epub_file_attachment', true );
		if ($epub_file != "") {
			$downloadlinks .= sprintf("<a href='%s'>ePub</a>", $epub_file['url']);
		}
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
