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
<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-75722527-1', 'auto');
  ga('send', 'pageview');

</script>
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
