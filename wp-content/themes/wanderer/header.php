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

<?php get_sidebar(); ?>

<div id="top" class="page-wrap">
	<div class="page-wrap-inner">
		<header role="banner">
			<div class="header-top">
				<div class="logo">
				<?php if($logo = get_wanderer_option('logo') ) : ?>
					<a href="<?php echo esc_url( home_url( '/' )); ?>">
						<img src="<?php echo $logo; ?>" class="logo-img"/>
					</a>
				<?php else: ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h4 class="site-description"><?php bloginfo( 'description' ); ?></h4>
				<?php endif; ?>
				</div>
	
				<label for="toggle">
					<div id="menu-icon" class="menu-icon-container">
					    <div class="menu-icon">
					      <div class="menu-global menu-top"></div>
					      <div class="menu-global menu-middle"></div>
					      <div class="menu-global menu-bottom"></div>
					    </div>
					</div>
				</label>
			</div>
		</header><!-- header -->
