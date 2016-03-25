<?php
/**
 * Functions
 *
 * @package Wanderer
 */

define( 'THEME_VERSION', '1.2.1' );

function wanderer_version_id() {
	if ( WP_DEBUG )
		return time();
	return THEME_VERSION;
}

/**
 * Theme Setup
 *
 */

function wanderer_setup() {

	// Add automatic feed links in header
	add_theme_support( 'automatic-feed-links' );

	// Add title tag support
	add_theme_support( 'title-tag' );

	// Add Post Thumbnail Image sizes and support
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'featured-image', 1300, 800, true );
	add_image_size( 'more-posts-thumb', 400, 400, true );

	// Other WordPress hooks
	add_action( 'pre_get_posts',      'wanderer_main_query_pre_get_posts' );
	add_action( 'wp_enqueue_scripts', 'wanderer_theme_styles' );
	add_action( 'wp_enqueue_scripts', 'wanderer_theme_scripts' );
}

add_action( 'after_setup_theme', 'wanderer_setup' );

/**
 * Returns the Google font stylesheet URL, if available.
 */
function wanderer_fonts_url() {
	$fonts_url = '';

	/* translators: If there are characters in your language that are not supported
	   by dosis, translate this to 'off'. Do not translate into your own language. */
	$opensans = _x( 'on', 'Open Sans: on or off', 'wanderer' );

	if ( 'off' !== $opensans ) {
		$query_args = array(
			'family' => 'Open+Sans:300,400|Playfair+Display|Montserrat:400,700',
		);

		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;	
}

/**
 * Load additional files and functions.
 */
require( get_template_directory() . '/inc/template-tags.php' );
require( get_template_directory() . '/inc/extras.php' );
require( get_template_directory() . '/inc/customizer.php' );
require( get_template_directory() . '/inc/scripts.php');
require( get_template_directory() . '/inc/meta-boxes.php');
require( get_template_directory() . '/inc/widgets.php');
require( get_template_directory() . '/inc/shortcodes.php');