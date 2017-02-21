<?php
/*
 * ==========================
 * Navigation function
 * Create custom navigation 
 * ==========================
 */ 

/*
 * Register Custom Navigation Walker
 */ 
require_once(oe_get_theme_dir('wp-bootstrap-navwalker.php'));
register_nav_menus(array(
	'primary' => __('Primary Menu', THEME_NAME),
));
?>