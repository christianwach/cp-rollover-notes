<?php
/*
--------------------------------------------------------------------------------
Plugin Name: CommentPress Rollover Footnotes
Version: 0.1
Plugin URI: http://www.futureofthebook.org/commentpress/
Description: This plugin allows for notes to be placed in the page content. Please refer to the javascript file for instructions.
Author: Institute for the Future of the Book
Author URI: http://www.futureofthebook.org
Plugin URI: http://www.futureofthebook.org
--------------------------------------------------------------------------------
*/



// set our version here
define( 'CP_ROLLOVER_FOOTNOTES_VERSION', '0.1' );

// store reference to this file
if ( !defined( 'CP_ROLLOVER_FOOTNOTES_FILE' ) ) {
	define( 'CP_ROLLOVER_FOOTNOTES_FILE', __FILE__ );
}

// store URL to this plugin's directory
if ( !defined( 'CP_ROLLOVER_FOOTNOTES_URL' ) ) {
	define( 'CP_ROLLOVER_FOOTNOTES_URL', plugin_dir_url( CP_ROLLOVER_FOOTNOTES_FILE ) );
}
// store PATH to this plugin's directory
if ( !defined( 'CP_ROLLOVER_FOOTNOTES_PATH' ) ) {
	define( 'CP_ROLLOVER_FOOTNOTES_PATH', plugin_dir_path( CP_ROLLOVER_FOOTNOTES_FILE ) );
}



// enable the plugin at the appropriate point
add_action( 'wp', 'cprn_enable_plugin' );



/**
 * Enables jQuery rollover notes
 */
function cprn_enable_plugin() {

	// kick out if...
	
	// we're in the WP back end
	if ( is_admin() ) { return; }
	
	// okay, we're through...
	
	// add our javascripts
	add_action( 'wp_print_scripts', 'cprn_add_javascripts', 20 );

	// add our css
	add_action( 'wp_print_styles', 'cprn_add_css', 20 );

}



/** 
 *Add our plugin JavaScripts
 */
function cprn_add_javascripts() {
	
	// add tooltip script
	wp_enqueue_script( 
	
		'jquery-tooltip', // handle
		plugins_url( 'assets/js/jquery-tooltip/jquery.tooltip.js', CP_ROLLOVER_FOOTNOTES_FILE ),
		array('jquery'), // dependencies
		CP_ROLLOVER_FOOTNOTES_VERSION, // version
		false // in footer
		
	);

	// add our custom implementation
	wp_enqueue_script(
	
		'cprn-tooltip', // handle
		plugins_url( 'assets/js/cp-rollover-notes.js', CP_ROLLOVER_FOOTNOTES_FILE ),
		array('jquery-tooltip'), // dependencies
		CP_ROLLOVER_FOOTNOTES_VERSION, // version
		false // in footer
		
	);

}



/** 
 * Add our plugin CSS
 */
function cprn_add_css() {
	
	// add our custom css
	wp_enqueue_style(
	
		'cprn-css', // handle
		plugins_url( 'assets/css/cp-rollover-notes.css', CP_ROLLOVER_FOOTNOTES_FILE ),
		false, // in footer
		CP_ROLLOVER_FOOTNOTES_VERSION, // version
		'screen' // media
		
	);
	
}



