<?php
/**
* @package Upload Media
* @version 1.0
*/
/*
Plugin Name: Upload Media
Plugin URL: 
Description: A skeleton of a media upload plugin
Version: 1.0
Author URI: 
*/

//Assign a name to your tab
function upload_test_media_menu($tabs) {
	$tabs['test_upload']='Test Upload';
	return $tabs;
}

//Adds your scripts to your plugin
function upload_test_scripts() {	
	//Adds css
	$myStyleUrl = plugins_url('upload-media.css', __FILE__);
	wp_register_style('myStyleSheets', $myStyleUrl);
	wp_enqueue_style( 'myStyleSheets');

	//Adds JQuery 
	wp_deregister_script('jquery');
  	wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
  	wp_enqueue_script( 'jquery' );

	//Adds your custom script
	wp_deregister_script( 'upload-media-script' );
	wp_register_script( 'upload-media-script', '/wp-content/plugins/upload-media/upload-media.js');
	wp_enqueue_script( 'upload-media-script' );
}

//This is our form for the plugin
function upload_test_upload_form () {
	//echos the tabs at the top of the media window
	media_upload_header();

	//Adds your javascript
	upload_test_scripts();
	?>
	<div class="test-form">
		<input type='text' id='name' />
		<input id='insert_shortcode' type='button' class='button' value='Insert Shortcode'>
	</div> 	

<?php }

//Returns the iframe that your plugin will be returned in
function upload_test_menu_handle() {
	return wp_iframe('upload_test_upload_form');
}

//Needed script to make sure wordpresses media upload scripts are inplace
wp_enqueue_script('media-upload');

//Adds your tab to the media upload button
add_filter('media_upload_tabs', 'upload_test_media_menu');

//Adds your menu handle to when the media upload action occurs
add_action('media_upload_test_upload', 'upload_test_menu_handle');

?>