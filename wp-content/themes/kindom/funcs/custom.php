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

/**
 * Add custom items to the navbar
 */
add_filter('wp_nav_menu_items', 'add_custom_items', 10, 2);
function add_custom_items($items, $args) {
	if($args->theme_location == 'primary') {
		if(is_user_logged_in()) {
			$items .= '<li><a href="'. wp_logout_url() .'">Log out</a></li>';
		} else {
			$items .= '<li><a href="'. site_url('wp-login.php') .'">Log in</a></li>';
			$items .= '<li><a href="'. site_url('wp-login.php?action=register') .'">Register</a></li>';
		}
	} 
	return $items;
}

/**
 * Remove p and br tags from generated content of shortcodes
 */
if(!function_exists('id_fix_shortcodes')) {
	function id_fix_shortcodes($content){
		$array = array (
			'<p>[' => '[',
			']</p>' => ']',
			']<br />' => ']'
		);
		$content = strtr($content, $array);
		return $content;
	}
	add_filter('the_content', 'id_fix_shortcodes');
}

/**
 * Add shortcodes
 */ 
function shortcode_row($atts, $content=null) {
	return '<div class="row">'	.  do_shortcode($content) . '</div>';
}
add_shortcode('row', 'shortcode_row');

function shortcode_col($atts, $content=null) {
	$attributes = shortcode_atts(array(
		'type' => 'col-xs-12',
		'offset' => 0,
		'push' => 0,
		'pull' => 0
	), $atts);
	
	$class = $attributes['class'];
	
	if($attributes['offset']) {
		$class .= ' col-sm-offset' . $attributes['offset'] . ' col-md-offset-' . $attributes['offset'];
	}
	
	if($attributes['push']) {
		$class .= ' col-md-push' . $attributes['push'] . ' col-md-push-' . $attributes['push'];
	}
	
	if($attributes['pull']) {
		$class .= ' col-md-pull' . $attributes['pull'] . ' col-md-pull-' . $attributes['pull'];
	}

	return '<div class="' . $class . '">' . $content . '</div>';
}
add_shortcode('col', 'shortcode_col');

function shortcode_col_half($atts, $content=null) {
	$attributes = shortcode_atts(array(
		'right' => false,
		'offset' => 0,
		'push' => 0,
		'pull' => 0
	), $atts);
	
	$class = 'col-xs-12 col-sm-6 col-md-6';

	if($attributes['right'] === 'true') {
		$class .= ' col-sm-offset-6 col-md-offset-6';
	} elseif($attributes['offset']) {
		$class .= ' col-sm-offset' . $attributes['offset'] . ' col-md-offset-' . $attributes['offset'];
	}

	if($attributes['push']) {
		$class .= ' col-md-push' . $attributes['push'] . ' col-md-push-' . $attributes['push'];
	}
	
	if($attributes['pull']) {
		$class .= ' col-md-pull' . $attributes['pull'] . ' col-md-pull-' . $attributes['pull'];
	}

	return '<div class="' . $class . '"><div class="section-text">' . do_shortcode($content) . '</div></div>';	
}
add_shortcode('col_half', 'shortcode_col_half');

function shortcode_col_third($atts, $content=null) {
	$attributes = shortcode_atts(array(
		'offset' => 0
	), $atts);
	
	$class = 'col-xs-12 col-sm-4 col-md-4';
	$offset = $attributes['offset'];
	if($offset && $offset < 9) {
		$class .= ' col-sm-offset- ' .$offset . 'col-md-offset-' . $offset;
	}
	return '<div class="' . $class . '"><div class="section-text">' . do_shortcode($content) . '</div></div>';	
}
add_shortcode('col_third', 'shortcode_col_third');

function shortcode_col_quarter($atts, $content=null) {
	$attributes = shortcode_atts(array(
		'offset' => 0
	), $atts);
	
	$class = 'col-xs-12 col-sm-3 col-md-3';
	$offset = $attributes['offset'];
	if($offset && $offset < 10) {
		$class .= ' col-sm-offset- ' .$offset . 'col-md-offset-' . $offset;
	}
	return '<div class="' . $class . '"><div class="section-text">' . do_shortcode($content) . '</div></div>';	
}
add_shortcode('col_quarter', 'shortcode_col_quarter');

function shortcode_title($atts, $content=null) {
	return '<h1 class="main-title">' . $content . '</h1>';
}
add_shortcode('title', 'shortcode_title');

function shortcode_subtitle($atts, $content=null) {
	return '<h2 class="main-subtitle">' . $content . '</h2>';
}
add_shortcode('subtitle', 'shortcode_subtitle');

function shortcode_description($atts, $content=null) {
	return '<p class="section-description font-light">' . $content . '</p>';
}
add_shortcode('description', 'shortcode_description');

function shortcode_image($atts, $content=null) {
	$attributes = shortcode_atts(array(
		'align' => 'left' 
	), $atts);
	return '<div class="image-wrapper text-' . $attributes['align'] . '">' . $content . '</div>';
}
add_shortcode('image', 'shortcode_image');

?>