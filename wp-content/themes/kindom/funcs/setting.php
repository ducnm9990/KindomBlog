<?php
/*
 * Setting function
 * Write some setting function for the theme here
 */

// Add custom setting page
function setup_theme_admin_menus() {
	add_menu_page('Theme settings', 'Theme settings', 'manage_options', 'theme_settings', 'theme_setting_page', 'dashicons-hammer');
	add_submenu_page('theme_settings','Front Page Elements', 'Front Page', 'manage_options', 'theme_settings', 'theme_front_page_settings');
}
function theme_setting_page() {

}
function theme_front_page_settings() {
	?>
	<div class="wrap">
		<?php screen_icon('themes'); ?> <h2>Front page elements</h2>
        <form method="POST" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="num_elements">
                            Number of elements on a row:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="num_elements" size="25" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
<?php 
}
// This tells WordPress to call the function named "setup_theme_admin_menus"
// when it's time to create the menu pages.
add_action("admin_menu", "setup_theme_admin_menus");

// Check that the user is allowed to update options
if (!current_user_can('manage_options')) {
	wp_die('You do not have sufficient permissions to access this page.');
}

?>