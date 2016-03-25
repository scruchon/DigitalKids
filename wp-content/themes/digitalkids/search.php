<?php
/**
 * The template for displaying search results pages.
 *
 * @package Wanderer
 */

get_header(); ?>

<div id="featured" class="header-no-img"></div>

<div id="primary" class="section group">
	<main id="main" class="main-content span_12_of_12" role="main">

		<?php if ( have_posts() ) : ?>
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'parts/content', 'index' );
				?>

			<?php endwhile; ?>

			<div class="pagination">
				<?php echo paginate_links( array( 'prev_next' => false ) ); ?>
			</div>

		<?php else : ?>

			<?php get_template_part( 'parts/content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
