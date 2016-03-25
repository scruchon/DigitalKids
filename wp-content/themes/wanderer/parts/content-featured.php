<?php
/**
 * The template used for displaying featured banner
 *
 * @package Wanderer
 */
?>

<?php if(is_front_page()) : ?>
	
<?php $featured_id = get_wanderer_option('featured'); ?>
	
	<?php if($featured_id) : 

		$args = array(
				'cat' => $featured_id,
				'posts_per_page' => 1,
				'post_type' => 'post',
				'post_status' => 'published'
			);
	
		$featured_query = new WP_Query( $args ); ?>

		<?php while ($featured_query->have_posts()) : $featured_query->the_post(); ?>

		<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

			<div class="featured" <?php echo ( $url ? 'style="background-image: url(' . $url . ');"' : null ); ?>>
				<div id="featured" class="featured-content">
					<span class="featured-date"><?php echo get_the_date("n / d / y"); ?></span>
					<h1 class="featured-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<?php if($subTitle = get_post_meta( get_the_ID(), 'wanderer_sub_title', true )) : ?>
		                <h2 class="featured-subtitle"><?php echo sanitize_text_field($subTitle); ?></h2>
		            <?php endif; ?>
		            <svg class="icon icon-arrow-down" viewBox="0 0 32 32"><use xlink:href="#icon-arrow-down"></use></svg>
				</div>
			</div>

		<?php endwhile; wp_reset_postdata(); ?>

	<?php else: ?>

		<div id="featured" class="header-no-img"></div>
		
	<?php endif; ?>	
<?php endif; ?>