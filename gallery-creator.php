<?php
/**
 * @package gallery-creator
 * @author Johnny Chadda
 * @version 1.0.1
 */
/*
Plugin Name: Gallery Creator
Version: 1.0.1
Description: Gallery Creator is a plugin which reveals hidden gallery settings in WordPress.
Author: Johnny Chadda
Plugin URI: http://johnny.chadda.se/projects/gallery-creator/
Author URI: http://johnny.chadda.se/
*/

class GalleryCreator
{
	// The main entry point for the plugin
	function GalleryCreator()
	{
		// Add the button to the post form
		add_action('media_buttons', array($this, 'add_gallery_button'), 30);
		
		// Create a new media upload type
		add_action('media_upload_gallerycreator', array($this, 'media_upload_gallerycreator'));
		
		// Register the javascript file
		//wp_register_script('gallerycreator', WP_PLUGIN_URL.'/gallery-creator/gallery-creator.js');
	}
	
	// Adds a button to the post form
	function add_gallery_button()
	{
		global $post_ID, $temp_ID;
		$uploading_iframe_ID = (int) ($post_ID == 0 ? $temp_ID : $post_ID);
		$media_gallerycreator_iframe_src = apply_filters('media_gallerycreator_iframe_src', "media-upload.php?post_id=$uploading_iframe_ID&amp;type=gallerycreator&amp;tab=gallerycreator");
		
		echo "<a href='{$media_gallerycreator_iframe_src}&amp;TB_iframe=true&amp;height=500&amp;width=640&amp;' class='thickbox' title='Gallery Creator'><img src='".WP_PLUGIN_URL."/gallery-creator/gallery-creator-icon.gif'/></a>";
	}
	
	// Creates a new media upload type
	function media_upload_gallerycreator()
	{
        wp_iframe('media_upload_type_gallerycreator');
    }
    
    // Set custom tabs for the media upload form
	function set_media_tabs($tabs)
	{
		return array (
			'gallerycreator' =>	 'Gallery Creator'
		);
	}
}

// Outputs the configuration form
function media_upload_type_gallerycreator()
{
	global $gallerycreator;
	
	// Include the javascript in the header
	//wp_enqueue_script('gallerycreator');
	// Sorry about this..
	echo '<script type="text/javascript" src="'.WP_PLUGIN_URL.'/gallery-creator/gallery-creator.js"></script>';
	echo '<link rel="stylesheet" type="text/css" href="'.WP_PLUGIN_URL.'/gallery-creator/gallery-creator.css" />';
	
	// Get the custom tabs and show the tab header
	add_filter('media_upload_tabs', array($gallerycreator, 'set_media_tabs'));
	media_upload_header();
	
	// Include the form
	include("gallery-form.php");
}

// Instantiate the plugin 
$gallerycreator = new GalleryCreator();

?>