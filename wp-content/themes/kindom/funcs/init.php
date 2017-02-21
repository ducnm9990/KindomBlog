<?php
/**
 * ==================
 * Init function
 * Initialize theme
 * ==================
 */

/**
 * Register custom post types for theme
 */
function kindom_post_types() {
	include 'post-types.php';
	oe_add_post_types($post_types);
}
add_action('init', 'kindom_post_types', 0);

/**
 * Initialize some necessary plugins
 */
function kindom_plugins() {
	$source = oe_get_theme_dir('plugins');
	$dest = dirname(dirname(oe_get_theme_dir())) . '/plugins';
	if(is_dir($source) && is_dir($dest)) {
        oe_copy_dir($source, $dest);
	}
}
add_action('init', 'kindom_plugins', 0);