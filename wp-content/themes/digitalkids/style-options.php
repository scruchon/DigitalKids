<?php
/**
 * Style options for customizer
 *
 * @package Wanderer
 */

$primary_color = get_wanderer_option('primary_color');
$secondary_color = get_wanderer_option('secondary_color');
$opacity_color_setting = get_wanderer_option('opacity_color_setting');
$opacity_setting = get_wanderer_option('opacity_setting'); 

?>

<style type="text/css">

	<?php if( $primary_color ) : ?>
		.entry-title,
		.entry-title a,
		.entry-title-index a,
		.entry-title-animate,
		.entry-subtitle,
		.entry-subtitle-index,
		.comment-author,
		.comment-date,
		.post-author {
			color: <?php echo $primary_color; ?>;
		}
		.post-author::after {
			border-bottom: 3px solid <?php echo $primary_color; ?>;
		}
	<?php endif; ?>

	<?php if( $secondary_color ) : ?>
		table a:link {
			color: <?php echo $secondary_color; ?>;
		}
		a {
			color: <?php echo $secondary_color; ?>;
		}
		.widget ul li a:hover {
			color: <?php echo $secondary_color; ?>
		}
	<?php endif; ?>

	.featured::after {
		background: <?php echo $opacity_color_setting; ?>;
		opacity: <?php echo $opacity_setting; ?>;
		content: "";
		position: absolute;
		top: 0; right: 0; bottom: 0; left: 0;
		width: 100%;
	}
	
</style>