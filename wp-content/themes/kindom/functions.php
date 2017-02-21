<?php
/**
 * ========================
 * Main function of theme
 * ========================
 */

$themeIncludes = array(
	'funcs/visual-composer.php',	// Visual Composer 
	'funcs/constant.php',			// Constant
  	'funcs/helper.php',		  		// Helper function
  	'funcs/activate.php',		  	// Activate function
	'funcs/init.php',           	// Init function
  	'funcs/script.php',		  		// Script function
  	'funcs/user.php',			  	// User function
  	'funcs/data.php',				// Data function
  	'funcs/action.php', 		  	// Action function
 	'funcs/nav.php',				// Navigation function
 	'funcs/custom.php'				// Custom function
);

foreach ($themeIncludes as $file) {
	if (!$filepath = locate_template($file)) {
    	trigger_error(sprintf(__('Error locating %s for inclusion', 'kindom'), $file), E_USER_ERROR);
  	}
  	require_once $filepath;
}
unset($file, $filepath);
