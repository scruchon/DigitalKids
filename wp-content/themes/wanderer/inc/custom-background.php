<?php
/**
 * Setup the WordPress core custom header feature.
 *
 * @package Wanderer
 */

function wanderer_custom_background_setup() {

	$args = array(
		'default-color' => 'f7f7f7',
	);

	add_theme_support( 'custom-background', apply_filters( 'wanderer_custom_background_args', $args ) );

}

add_action( 'after_setup_theme', 'wanderer_custom_background_setup' );
