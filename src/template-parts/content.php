<?php
/**
 * The template part for displaying content
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

	<?php if (get_post_type() == 'post') { ?>
		<p class="post-word-count"><?php echo matteringpress_post_word_count(3); ?></p>
	<?php } ?>
	<div class="entry-main-content">
	<?php matteringpress_post_thumbnail(); ?>
	
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
