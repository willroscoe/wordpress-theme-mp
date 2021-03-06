<?php
/**
 * The template for displaying Author archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mattering_Press
 * @subpackage Mattering_Press
 * @since Mattering Press 1.0
 */

$authorname = $wp_query->get('author_name');

// restrict posts to only include 'blog' ('making') category posts
$wp_query = null;
$wp_query = new WP_Query( array( 'category_name' => 'blog', 'author_name' => $authorname ) );

get_header();

?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( $wp_query->have_posts() ) : ?>

			<header class="archive-header">
				<h1 class="archive-title">
					<?php
						/*
						 * Queue the first post, that way we know what author
						 * we're dealing with (if that is the case).
						 *
						 * We reset this later so we can run the loop properly
						 * with a call to rewind_posts().
						 */
						$wp_query->the_post();

						printf( __( 'All posts by %s', 'matteringpress' ), get_the_author() );
					?>
				</h1>
				<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<div class="author-description"><?php the_author_meta( 'description' ); ?></div>
				<?php endif; ?>
			</header><!-- .archive-header -->
			<?php
					/*
					 * Since we called the_post() above, we need to rewind
					 * the loop back to the beginning that way we can run
					 * the loop properly, in full.
					 */
					$wp_query->rewind_posts();

					// Start the Loop.
					while ( $wp_query->have_posts() ) : $wp_query->the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;
					// Previous/next page navigation.
					// Previous/next page navigation.
					the_posts_pagination( array(
						'prev_text'          => __( 'Previous page', 'matteringpress' ),
						'next_text'          => __( 'Next page', 'matteringpress' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'matteringpress' ) . ' </span>',
					) );

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>

		</main><!-- #content -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
