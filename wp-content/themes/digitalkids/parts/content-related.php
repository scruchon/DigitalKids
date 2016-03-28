<?php
/**
 * The template used for more blog posts on single.php
 *
 * @package Wanderer
 */
?>

<div class="more-posts">
	<p class="more-posts-title"><?php printf( __( 'More Blog Posts', 'wanderer' ) ); ?></p>
	<div class="section group">
		<div class="span_12_of_12">
			<div id="owl" class="owl-carousel">
				<?php

				$current_post = get_the_ID();

				$args = array(
						'posts_per_page' => 6,
						'post_type' => 'post',
						'post__not_in' => array($current_post)
					);

				$the_query = new WP_Query( $args );

					while ($the_query->have_posts()) : $the_query->the_post(); ?>
					
					<?php if ( has_post_thumbnail() ) : ?>

					<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

						<div class="item" <?php echo ( $url ? 'style="background-image: url(' . $url . ');"' : null ); ?>>
							<div class="overlay"></div>
							
				            <a href="<?php the_permalink(); ?>">
				                <div class="item-content">
					                <span class="item-date"><?php echo get_the_date("n / d / y"); ?></span>
									<h1 class="item-title"><?php the_title(); ?></h1>
									<?php if($subTitle = get_post_meta( get_the_ID(), 'wanderer_sub_title', true )) : ?>
						                <h2 class="item-subtitle"><?php echo sanitize_text_field($subTitle); ?></h2>
						            <?php endif; ?>
					            </div>
					        </a>
			            </div>
			        <?php endif; ?>
						
				<?php endwhile; wp_reset_postdata(); ?>

	        </div> <!-- end owl-carousel -->
		</div><!-- end span 12 of 12 -->
	</div><!-- end section group -->
</div><!-- end more posts -->


