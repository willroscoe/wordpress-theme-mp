<?php
/**
 * Mattering Press back compat functionality
 *
 * Prevents Mattering Press from running on WordPress versions prior to 4.4,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.4.
 *
 * @package Mattering_Press
 * @subpackage Mattering_Press
 * @since Mattering Press 1.0
 */

/**
 * Prevent switching to Mattering Press on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Mattering Press 1.0
 */
function matteringpress_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'matteringpress_upgrade_notice' );
}
add_action( 'after_switch_theme', 'matteringpress_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Mattering Press on WordPress versions prior to 4.4.
 *
 * @since Mattering Press 1.0
 *
 * @global string $wp_version WordPress version.
 */
function matteringpress_upgrade_notice() {
	$message = sprintf( __( 'Mattering Press requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'matteringpress' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.4.
 *
 * @since Mattering Press 1.0
 *
 * @global string $wp_version WordPress version.
 */
function matteringpress_customize() {
	wp_die( sprintf( __( 'Mattering Press requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'matteringpress' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'matteringpress_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.4.
 *
 * @since Mattering Press 1.0
 *
 * @global string $wp_version WordPress version.
 */
function matteringpress_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Mattering Press requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'matteringpress' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'matteringpress_preview' );
