<?php
/**
 * =====================================
 * Custom function
 * Write the additional functions here 
 * =====================================
 */

/* Hide admin bar */
show_admin_bar(false);

// Remove the comment below to hide ACF menu from admin panel before production phase
// add_filter('acf/settings/show_admin', '__return_false');

// Add options page
if(function_exists('acf_add_options_page')) {
	$args = array(
		'page_title' => 'Theme Options',
		'menu_title' => 'Theme Options',
		'capability' => 'edit_posts'
	);
	acf_add_options_page($args);
}

?>