<?php
/**
 * The sidebar containing the main widget areas.
 *
 * @package Wanderer
 */
?>

<?php

	$user_id = get_wanderer_option('user');
	$user_info = (($user_id)) ? get_userdata($user_id) : get_userdata(1);
	$email = $user_info->user_email;
	$first_name = $user_info->user_firstname;
	$last_name = $user_info->user_lastname;
?>

	<div class="aside-container">
		<div class="profile">
			
			<div class="profile-name">
				<h6 class="name"><?php echo $first_name . ' ' . $last_name; ?></h6>
			</div>
			<div class="profile-social">
				<?php 

					$social_icons = array('facebook', 'twitter', 'linkedin', 'instagram', 'pinterest');

					foreach($social_icons as $icon) {
						if($url = get_wanderer_option($icon)) :
							echo '<a href="' . $url . '"><svg class="icon icon-' . $icon . '" viewBox="0 0 32 32"><use xlink:href="#icon-' . $icon .'"></use></svg></a>';
						endif;
					}
					
				?>
			</div>
		</div>

		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

			<aside id="archives" class="widget">
				<h3 class="widget-title"><?php _e( 'Archives', 'wanderer' ); ?></h3>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h3 class="widget-title"><?php _e( 'Meta', 'wanderer' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>
		<?php endif; // end sidebar widget area ?>
	</div><!-- aside container -->
