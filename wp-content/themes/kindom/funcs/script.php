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
      'handle' => 'kindom-main-css',
      'src' => 'assets/css/main.css',
    )
  ));
  oe_register_scripts(array(
    array(
      'handle' => 'kindom-vendor-js',
      'src' => 'assets/js/vendor.js',
    ),
    array(
      'handle' => 'kindom-plugins-js',
      'src' => 'assets/js/plugins.js',
    ),
    array(
      'handle' => 'kindom-main-js',
      'src' => 'assets/js/main.js',
    ),
  ));
}
add_action('wp_enqueue_scripts', 'kindom_script');