<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Wanderer
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php if(get_wanderer_option('favicon')) : ?>
		<link rel="icon" href="<?php echo get_wanderer_option('favicon'); ?>" type="image/x-icon">
	<?php else: ?>
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" type="image/x-icon">
	<?php endif; ?>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
	
	<?php include('inc/icons.svg'); ?>

	<?php get_template_part( 'style', 'options' ); ?>

	<!--[if lt IE 9]>
	    <script src="<?php echo get_template_directory_uri() . '/assets/js/html5shiv.min.js';?>"></script>
	    <script src="<?php echo get_template_directory_uri() . '/assets/js/respond.min.js';?>"></script>
	<![endif]-->

	<!--[if IE 9]> <html class="ie9" lang="en"> <![endif]-->

</head>

<body <?php body_class(); ?>>

<input id="toggle" type="checkbox" />



<div id="top" class="page-wrap">
	<div class="page-wrap-inner">
		<header role="banner">
			<div class="header-top">
				
					<h1 class="logo-dk"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Digital Kids - A blog by Eglé Cruchon</a></h1>

	
				
			</div>
		</header><!-- header -->
