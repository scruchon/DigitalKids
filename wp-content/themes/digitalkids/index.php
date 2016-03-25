<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wanderer
 */

get_header(); ?>

	<div id="primary" class="section group">
		<main id="main" class="main-content span_12_of_12" role="main">

		<?php if ( have_posts() ) : ?>
		
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'parts/content', 'page' ); ?>

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
