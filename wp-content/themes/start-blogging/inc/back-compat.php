<?php
/**
 * Start Blogging back compat functionality
 *
 * Prevents This theme from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package WordPress
 * @subpackage Start_Blogging
 * @since 1.0.0
 */

/**
 * Prevent switching to Start Blogging on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Start Blogging 1.0.0
 */
function start_blogging_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'start_blogging_upgrade_notice' );
}
add_action( 'after_switch_theme', 'start_blogging_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Start Blogging on WordPress versions prior to 4.7.
 *
 * @since Start Blogging 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function start_blogging_upgrade_notice() {
	$message = sprintf( __( 'Start Blogging requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'start-blogging' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since Start Blogging 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function start_blogging_customize() {
	wp_die( sprintf( __( 'Start Blogging requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'start-blogging' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'start_blogging_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since Start Blogging 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function start_blogging_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Start Blogging requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'start-blogging' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'start_blogging_preview' );
