<?php
/**
 * =======================================
 * Activate theme
 * Do something when theme is activated
 * =======================================
 */

/* Version compatibility check */
if (version_compare($GLOBALS['wp_version'], WORDPRESS_VERSION_REQUIRED, '<' )) {
	require oe_get_theme_dir('funcs/version-compatible.php');
}

/* Theme setup */
if(!function_exists('kindom_setup')):

function kindom_setup() {
	
	// Make theme available for translation
	load_theme_textdomain('kindom', oe_get_theme_dir('langs'));
	
	// Let WordPres manage the document title
	add_theme_support('title-tag');
	
	// Enable support for Post Thumbnails on posts and pages
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(825, 510, true);
	
	// Register nav menu
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'kindom')
	));
	
	// Switch default core markup for search form, comment form and comments to output valid HTML5
	add_theme_support('html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	));
	
	// Enable support for Post Formats
	add_theme_support('post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat' 
	)); 
}

endif;
add_action('after_setup_theme', 'kindom_setup');

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @global int $paged WordPress archive pagination page count.
 * @global int $page  WordPress paginated post page count.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function kindom_wp_title($title, $sep) {
	global $paged, $page;

	if (is_feed()) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo('name', 'display');

	// Add the site description for the home/front page.
	$site_description = get_bloginfo('description', 'display');
	if ($site_description && (is_home() || is_front_page())) {
		$title = $title . ' ' . $sep . ' ' . $site_description;
	}

	// Add a page number if necessary.
	if (($paged >= 2 || $page >= 2) && ! is_404()) {
		$title = $title. ' ' .  $sep . ' ' . sprintf(__('Page %s', THEME_NAME), max($paged, $page));
	}
	
	return $title;
}
add_filter('wp_title', 'kindom_wp_title', 10, 2);