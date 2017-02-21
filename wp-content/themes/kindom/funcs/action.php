<?php 
/**
 * ==============================================
 * Action function
 * Handle all request from backend and frontend
 * ==============================================
 */

/**
 * Handle post-type submit from frontend
 * This is the demo template for handling request of custom post type
 * You can utilize this template in order to make your own handle
 */
function handle_post_type_submit() {
	if(isset($_POST['form_post_type_submit']) && $_POST['form_post_type_submit'] == 1) {
		global $wpdb;
		$data = $_POST;
		
		// Create new post with custom post type
		$post_data = array(
			'post_title' => '{{your_post_title}}',
			'post_status' => 'publish',
			'post_author' => 1,
			'post_type' => '{{your_post_type}}',
			'post_date' => date('Y-m-d H:i:s', time())
		);
		$post_id = wp_insert_post($post_data);
				
		// Update fields if necessary
		$fields = array(
			'post_type_field1' => $data['post_type_field1'],
			'post_type_field2' => $data['post_type_field2'],
			'post_type_field3' => $data['post_type_field3'],
		);
		oe_update_fields($fields, $post_id);
	}		
}
add_action('init', 'handle_post_type_submit');
?>