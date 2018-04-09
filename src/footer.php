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

<!-- COLORBOX DONATE -->
<div class='colorbox-popup-holder'>
	<div id='donate-popup'>
		<div class='paypal-donate'>
			<h3>Donate via PayPal</h3>
			<p class='donation-intro'>
				Mattering Press is run by a group of people who care about Open Access academic publishing. Your
				donations, however little, help us to keep Mattering Press going.
			</p>
			<form id="donate" action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" id="p3" name="p3" value="1">
				<input type="hidden" id="a3" name="a3" value="0">
				<input type="hidden" name="sra" value="1">
				<input type="hidden" name="src" value="1">
				<input type="hidden" name="no_shipping" value="1">
				<input type="hidden" name="no_note" value="1">
				<input type="hidden" id="cmd" name="cmd" value="_donations">
				<input type="hidden" name="business" value="L57TYH3XFBTHE">
				<input type="hidden" id="item_name" name="item_name" value="Donation to Mattering Press">
				<input type="hidden" name="return" value="https://www.matteringpress.org/support-mattering-press/thankyou" data-base-return='https://www.matteringpress.org/support-mattering-press/thankyou'>
				<input type="hidden" name="cancel_return" value="https://www.matteringpress.org">

				<div class='donation-line'>
					<label for="type">Donation Type:</label>
					<select id="t3" name="t3">
						<option value="0">One-time Donation</option>
						<option value="M">Monthly Subscription</option>
					</select>
					<small id="ppinfo">Does Not Require a PayPal Account</small>
				</div>
				<div class='donation-line'>
					<select name="currency_code" class="cur">
						<option value="USD">$</option>
						<option value="EUR" selected="selected">€</option>
						<option value="GBP">£</option>
						<option value="YEN">¥</option>
					</select>
					<ul class="amounts">
						
							<li><input type='radio' class='radio' name='amount' value='2000.00' id='amount-0'><label for='amount-0'>2000</label></li>
							<li><input type='radio' class='radio' name='amount' value='1000.00' id='amount-1'><label for='amount-1'>1000</label></li>
							<li><input type='radio' class='radio' name='amount' value='500.00' id='amount-2'><label for='amount-2'>500</label></li>
							<li><input type='radio' class='radio' name='amount' value='250.00' id='amount-3'><label for='amount-3'>250</label></li>
							<li><input type='radio' class='radio' checked='checked' name='amount' value='100.00' id='amount-4'><label for='amount-4'>100</label></li>
							<li><input type='radio' class='radio' name='amount' value='50.00' id='amount-5'><label for='amount-5'>50</label></li>
							<li><input type='radio' class='radio' name='amount' value='20.00' id='amount-6'><label for='amount-6'>20</label></li>
							<li><input type='radio' class='radio' name='amount' value='10.00' id='amount-7'><label for='amount-7'>10</label></li>
							<li><input type='radio' class='radio' name='amount' value='5.00' id='amount-8'><label for='amount-8'>5</label></li>
					</ul>
				</div>
				<div class='donation-line'>
					<label for="custom">or enter a donation amount:</label>
					<input type="text" id="amount" class="amount" name="amount">
				</div>
				<div class='donation-popup-footer'>
					<button type="submit" class="button button-green" name="donate" data-action='donate'>Donate</button>
					<a href='#' id='skip' data-action='skip'>Skip</a>
				</div>
			</form>
		</div>
	</div>
</div><!-- .colorbox-popup-holder -->

<?php wp_footer(); ?>
</body>
</html>
