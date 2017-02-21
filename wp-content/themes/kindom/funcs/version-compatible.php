<?php
/**
 * Kindom version compatible functionality
 *
 * Prevents Kindom from running on WordPress versions prior to the required theme version,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in the required theme version 
 *
 * @package WordPress
 * @subpackage Kindomi
 * @since Kindom 1.0
 */

/**
 * Prevent switching to Kindom on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Kindom 1.0
 */
function kindom_switch_theme() {
	switch_theme(WP_DEFAULT_THEME, WP_DEFAULT_THEME);
	unset($_GET['activated']);
	add_action('admin_notices', 'kindom_upgrade_notice');
}
add_action('after_switch_theme', 'kindom_switch_theme');

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Kindom on WordPress versions prior to the required theme version 
 *
 * @since Kindom 1.0
 */
function kindom_upgrade_notice() {
	$message = sprintf(__('Kindom requires at least WordPress version %s. You are running version %s. Please upgrade and try again.', 'kindom'), WORDPRESS_VERSION_REQUIRED, $GLOBALS['wp_version']);
	printf('<div class="error"><p>%s</p></div>', $message);
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to the required theme version.
 *
 * @since Kindom 1.0
 */
function kindom_customize() {
	wp_die(sprintf(__('Kindom requires at least WordPress version %s. You are running version %s. Please upgrade and try again.', 'kindom'), WORDPRESS_VERSION_REQUIRED, $GLOBALS['wp_version']), '', array(
		'back_link' => true,
	));
}
add_action('load-customize.php', 'kindom_customize');

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to the required theme version 
 *
 * @since Kindom 1.0
 */
function kindom_preview() {
	if (isset( $_GET['preview'])) {
		wp_die(sprintf(__('Kindom requires at least WordPress version %. You are running version %s. Please upgrade and try again.', 'kindom'), WORDPRESS_VERSION_REQUIRED, $GLOBALS['wp_version']));
	}
}
add_action('template_redirect', 'kindom_preview');