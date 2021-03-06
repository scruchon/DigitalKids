<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Wanderer
 */

get_header(); ?>

<?php if ( has_post_thumbnail() ) {

	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
	<a id="backhome" href="/"><i class="icon-arrow-left"></i>Home</a>

	<div class="featured" <?php echo ( $url ? 'style="background-image: url(' . $url . ');"' : null ); ?>>
		<div id="featured" class="featured-content">
			<span class="featured-date"><?php echo get_the_date("n / d / y"); ?></span>
			<h1 class="featured-title"><?php the_title(); ?></h1>
			<?php if($subTitle = get_post_meta( get_the_ID(), 'wanderer_sub_title', true )) : ?>
	            <h2 class="featured-subtitle"><?php echo $subTitle; ?></h2>
	        <?php endif; ?>
	        <svg class="icon icon-arrow-down" viewBox="0 0 32 32"><use xlink:href="#icon-arrow-down"></use></svg>
		</div>
	</div>
<?php } else { ?>	
	<div id="featured" class="header-no-img"></div>
<?php } ?>

	<div id="primary" class="section group">
		<div class="container">
			<main id="main" class="main-content span_12_of_12" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'parts/content', 'page' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // end of the loop. ?>
			
			</main><!-- #main -->
		</div><!-- end container -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>
