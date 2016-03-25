<?php
/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @package Wanderer
 */

/**
 * Register widget areas.
 */
function wanderer_register_widget_areas() {
	register_sidebar( array(
		'id'            => 'sidebar-1',
		'name'          => __( 'Sidebar', 'wanderer' ),
		'description'   => __( 'Main sidebar area displayed on right side of page via trigger.', 'wanderer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );
}
add_action( 'widgets_init', 'wanderer_register_widget_areas' );