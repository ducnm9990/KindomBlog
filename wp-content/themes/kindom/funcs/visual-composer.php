<?php
/**
 * ===========================
 * Visual Composer Addons
 *
 * Theme Visual Composer addons integration
 * ===========================
 */

if(!class_exists('VisualComposerAddonSample')):
class VisualComposerAddonSample {


    /**
    * Constructor
    *
    * Add shortcode and hook into init action
    */
    public function __construct() {
        add_action('init', array($this, 'install'));
        add_shortcode('sample', array($this, 'render'));
    }


    /**
    * Install addon
    *
    * Convert shortcode to Visual Composer addon
    */
    public function install() {
        if(!defined('WPB_VC_VERSION')) {
            add_action('admin_notices', array($this, 'notice'));
            return;
        }
        vc_map(array(
            'name' => __('Sample', THEME_NAME),
            'description' => __('Just a sample addon', THEME_NAME),
            'base' => __('Sample', THEME_NAME),
            'class' => '',
            'controls' => 'full',
            'icon' => 'vc_icon-vc-gitem-image',
            'category' => 'Content',
            'params' => array(
                array(
                    'holder' => 'div',
                    'value' => array(
                        'Option 1' => '1',
                        'Option 2' => '2',
                    ),
                    'type' => 'dropdown',
                    'param_name' => 'sample_dropdown',
                    'heading' => __('Dropdown', THEME_NAME),
                    'description' => __('', THEME_NAME),
                ),
                array(
                    'type' => 'attach_image',
                    'param_name' => 'sample_attach_image',
                    'heading' => __('Image', THEME_NAME),
                    'description' => __('', THEME_NAME),
                ),
                array(
                    'type' => 'textfield',
                    'param_name' => 'sample_textfield',
                    'heading' => __('Title', THEME_NAME),
                    'description' => __('', THEME_NAME),
                ),
                array(
                    'type' => 'textarea',
                    'param_name' => 'sample_textarea',
                    'heading' => __('Description', THEME_NAME),
                    'description' => __('', THEME_NAME),
                ),
                array(
                    'type' => 'textarea_html',
                    'param_name' => 'content',
                    'heading' => __('Content', THEME_NAME),
                    'description' => __('', THEME_NAME),
                ),
                array(
                    'type' => 'colorpicker',
                    'param_name' => 'sample_color_picker',
                    'heading' => __('Background', THEME_NAME),
                    'description' => __('', THEME_NAME),
                ),
            )
        ));
    }


    /**
    * Render addon
    *
    * Render view of addon
    *
    * @param array $attributes
    */
    public function render($attributes) {
        extract(shortcode_atts(array(
            'sample_dropdown' => '',
            'sample_attach_image' => '',
            'sample_textfield' => '',
            'sample_textarea' => '',
            'sample_content' => '',
            'sample_color_picker' => '',
        ), $attributes));
        ob_start();
        include '../visual-composer/addons/template/sample.php';
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }


    /**
    * Notice
    *
    * Notice users if visual composer is not installed or activated yet
    */
    public function notice() {
        $plugin_data = get_plugin_data(__FILE__);
        echo '<div class="updated"><p>' . sprintf(__('<strong>%s</strong> requires <strong><a href="http://bit.ly/vcomposer" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', THEME_NAME), 'Sample') . '</p></div>';
    }


}
new VisualComposerAddonSample();
endif;