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

<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_directory'); ?>/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_directory'); ?>/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory'); ?>/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php bloginfo('template_directory'); ?>/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory'); ?>/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('template_directory'); ?>/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory'); ?>/favicon-16x16.png">
<link rel="manifest" href="<?php bloginfo('template_directory'); ?>/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php bloginfo('template_directory'); ?>/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

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
<meta property="og:image" content="http://digital-kids.ch/wp-content/uploads/2016/03/Digital-kids-ebooksvsbooks.jpeg" />
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
