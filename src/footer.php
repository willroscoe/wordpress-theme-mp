<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Mattering_Press
 * @subpackage Mattering_Press
 * @since Mattering Press 1.0
 */
?>

		</div><!-- .site-content -->

		<footer class="site-footer" role="contentinfo">
			<?php if ( is_active_sidebar( 'footer-sidebar' )  ) : ?>
				<?php dynamic_sidebar( 'footer-sidebar' ); ?>
			<?php endif; ?>

			<div class='icons'>
				<ul>
					<li><a href='https://en.wikipedia.org/wiki/Open_access' id='open-access'>Open Access</a></li>
					<li><a href='https://twitter.com/matteringpress' id='twitter'>Twitter</a></li>
					<li><a href='https://www.facebook.com/MatteringPress' id='facebook'>Facebook</a></li>
				</ul>
			</div>
			
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
