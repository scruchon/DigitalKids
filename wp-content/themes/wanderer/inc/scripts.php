<?php
/**
 * wanderer Scripts
 *
 * @package Wanderer
 */

/**
 * Required Theme Styles
 *
 */
function wanderer_theme_styles() {
	wp_enqueue_style( 'wanderer-fonts', wanderer_fonts_url(), array(), null );
	wp_enqueue_style( 'wanderer', get_stylesheet_uri(), array(), wanderer_version_id() );
}
add_action( 'wp_enqueue_scripts', 'wanderer_theme_styles' );

/**
 * Add editor styles
 */
function wanderer_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'after_setup_theme', 'wanderer_add_editor_styles' );

/**
 * Required Theme Scripts
 *
 */
function wanderer_theme_scripts() {
	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins-min.js', array(), wanderer_version_id(), true );
	wp_enqueue_script( 'wanderer', get_template_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), wanderer_version_id(), true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) && !is_page_template('templates/template-portfolio.php') ) {
		wp_enqueue_script( 'comment-reply' );
	}
}