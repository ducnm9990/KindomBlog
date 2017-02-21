<?php
/**
 * ===========================
 * Script function
 * Theme script integration
 * ===========================
 */

/**
 * Theme scripts 
 */
function kindom_script() {
  oe_register_styles(array(
    array(
      'handle' => 'kindom-app-css',
      'src' => 'assets/css/app.css',
    )
  ));
  oe_register_scripts(array(
    array(
      'handle' => 'kindom-app-js',
      'src' => 'assets/js/app.js',
    )
  ));
}
add_action('wp_enqueue_scripts', 'kindom_script');