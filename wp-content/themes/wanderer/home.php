<?php
/**
 * Main home.php
 *
 * @package Wanderer
 */

get_header();

get_template_part( 'parts/content', 'featured' );

?>

	<div id="primary" class="section group">
		<main id="main" class="main-content span_12_of_12" role="main">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'parts/content', 'index' ); ?>

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
