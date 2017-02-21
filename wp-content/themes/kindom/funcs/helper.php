<?php
/**
 * =======================
 * Helper function
 * Some useful functions
 * =======================
 */ 

/**
 * Register styles
 * @param array|string $style
 */
function oe_register_styles($style) {
	$style = !is_array($style[0]) ? array($style) : $style;
	foreach($style as $item) {
		
		// Register styles
		wp_register_style(
			$item['handle']
		  	, oe_get_theme_script_src($item['src'])
		  	, isset($item['deps']) ? $item['deps'] : array()
		  	, isset($item['version']) ? $item['version'] : '1.0'
		  	, isset($styles['media']) ? $item['media'] : ''
		);
		wp_enqueue_style($item['handle']);
		
		// Add condition for stylesheet if exist
		if($item['conditional']) {
			wp_style_add_data($item['handle'], 'conditional', $item['conditional']);
		}
	}
}

/**
 * Register scripts
 * 
 * @param array|string $script
 */
function oe_register_scripts($script) {
	$script = !is_array($script[0]) ? array($script) : $script;
	foreach($script as $item) {
		
		// Register scripts
		wp_register_script(
			$item['handle']
			, oe_get_theme_script_src($item['src'])
		  	, isset($item['deps']) ? $item['deps'] : array()
		  	, isset($item['version']) ? $item['version'] : '1.0'
			, isset($item['in_footer']) ? $item['in_footer'] : false
		);
		
		// Localize scripts if necessary
		if(isset($item['localize'])) {
			$localizeScript = $item['localize'];
			wp_localize_script(
				$item['handle']
				, $localizeScript['object_name']
				, $localizeScript['data']
			);
		}
		wp_enqueue_script($item['handle']);

		// Add condition for scripts if exist
		if($item['conditional']) {
			wp_script_add_data($item['handle'], 'conditional', $item['conditional']);
		}
	}
}

/**
 * Add post types
 * 
 * @param array|string $post_types
 */
function oe_add_post_types($post_types) {
	$post_types = !isset($post_types[0]) ? array($post_types) : $post_types;
	foreach($post_types as $post_type) {
		$labels = array(
			'name'                => $post_type['name'],
			'singular_name'       => $post_type['singular_name'],
			'menu_name'           => $post_type['menu_name'],
			'parent_item_colon'   => __('Parent Item:', THEME_NAME),
			'all_items'           => __('All Items', THEME_NAME),
			'view_item'           => __('View Item', THEME_NAME),
			'add_new_item'        => __('Add New Item', THEME_NAME),
			'add_new'             => __('Add New', THEME_NAME),
			'edit_item'           => __('Edit Item', THEME_NAME),
			'update_item'         => __('Update Item', THEME_NAME),
			'search_items'        => __('Search Item', THEME_NAME),
			'not_found'           => __('Not found', THEME_NAME),
			'not_found_in_trash'  => __('Not found in Trash', THEME_NAME),
		);
		$rewrite = array(
			'slug'                => $post_type['slug'],
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => isset($post_type['label']) ? $post_type['label'] : '',
			'description'         => isset($post_type['desc']) ? $post_type['desc'] : '',
			'labels'              => $labels,
			'supports'            => isset($post_type['supports']) ? $post_type['supports'] : array('title', 'editor'),
			'taxonomies' 		  => isset($post_type['taxonomies']) ? $post_type['taxonomies'] : array(),
			'hierarchical'        => isset($post_type['hierarchical']) ? $post_type['hierarchical'] : false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'menu_icon'           => $post_type['icon'],
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'page',
		);
		register_post_type($post_type['slug'], $args);
		oe_generate_post_type_file($post_type['slug']);
	}
}

/**
 * Generate post-type file
 * For example: single-post-type.php, archive-post-type.php, ...
 * 
 * @param string $post_type
 */
function oe_generate_post_type_file($post_type) {

	//Generate single file
	if(is_file(oe_get_theme_dir('templates/frontend/single-post-type.php'))) {
		$template = file_get_contents(oe_get_theme_dir('templates/frontend/single-post-type.php'));
		$filename = oe_get_theme_dir('single-' . $post_type . '.php');
		oe_make_file($filename, $template);
	}
	
	// Generate archive file
	if(is_file(oe_get_theme_dir('templates/frontend/archive-post-type.php'))) {
        $template = file_get_contents(oe_get_theme_dir('templates/frontend/archive-post-type.php'));
        $filename = oe_get_theme_dir('archive-' . $post_type . '.php');
        oe_make_file($filename, $template);
	}
}

/**
 * Create file by filename and content
 * 
 * @param string $filename
 * @param text $content
 */
function oe_make_file($filename, $content) {
	if(!file_exists($filename)) {
		$file = fopen($filename, 'w') or die('Unable to open file!');
		fwrite($file, $content);
		fclose($file);
	}
}

/**
 * Copy directory recursively
 * 
 * @param string $source
 * @param string $dest
 */
function oe_copy_dir($source, $dest) {
	if(is_dir($source)) {
		$dir_handle = opendir($source);
		while($file = readdir($dir_handle)) 
		{
			if($file!='.' && $file != '..') 
			{
				$source_file = $source . '/' . $file;
				$dest_file = $dest . '/' . $file;
				if(is_dir($source_file)) {
					if(!is_dir($dest_file)) {
						mkdir($dest_file);
					}
					oe_copy_dir($source_file, $dest_file);
				} else {
					if(!file_exists($dest_file)) {
						copy($source_file, $dest_file);
					}
				}
			}
		}
		closedir($dir_handle);
	} else {
		copy($source, $dest);
	}
}

/**
 * Get src of script
 * 
 * @param string $src
 * @return string
 */
function oe_get_theme_script_src($src) {
	if(oe_is_absolute_uri($src)) {
		return $src;
	}
	return oe_get_theme_uri($src);
}

/**
 * Get directory|file path of theme
 * 
 * @param string $subdir
 * @return string path of directory|file
 */
function oe_get_theme_dir($subdir = '') {
	return $subdir ? get_template_directory() . '/' . $subdir : get_template_directory();	
}

/**
 * Get uri of file
 * 
 * @param string $sub_path
 * @return string uri of directory|file
 */
function oe_get_theme_uri($sub_path = '') {
	return $sub_path ? get_template_directory_uri() . '/' . $sub_path : get_template_directory_uri();	
}

/**
 * Get component of theme
 * 
 * @param string $path
 * @return mixed $component
 */
function oe_get_component($path) {
	if(is_file(oe_get_theme_dir('components/' . $path))) {
		include oe_get_theme_dir('components/' . $path);
	}
}

/*
 * Update multiple fields of post
 * 
 * @param array $fields
 * @param int $postID
 */
function oe_update_fields($fields, $postID) {
	foreach ($fields as $key => $value) {
		update_field($key, $value, $postID);
	}
}

/**
 * Check uri is absolute or not
 * 
 * @param string $uri
 * @return boolean true|false
 */
function oe_is_absolute_uri($uri) {
	if(strpos($uri, 'http://') === 0 || strpos($uri, 'https://') === 0) {
		return true;
	}
	return false;
}

?>