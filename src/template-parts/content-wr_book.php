<?php
/**
 * The template used for displaying page content
 *
 * @package Mattering_Press
 * @subpackage Mattering_Press
 * @since Mattering Press 1.0
 */

$epub_file_url = get_epub_file_url();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div><?php echo get_book_subtitle(); ?></div>
	<div><?php echo get_book_authors(); ?></div>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'matteringpress' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'matteringpress' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
		<?php if ($epub_file_url != "") { ?>
		<p style="text-align: right;"><a href="<?php echo esc_url( get_permalink() ) . "read"; ?>" class="button button-blue" style="color:white; text-decoration:none;">Read online »</a></p>
		<?php } ?>
	</div><!-- .entry-content -->	
	<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'matteringpress' ),
				get_the_title()
			),
			'<footer class="entry-footer"><span class="edit-link">',
			'</span></footer><!-- .entry-footer -->'
		);
	?>

</article><!-- #post-## -->
