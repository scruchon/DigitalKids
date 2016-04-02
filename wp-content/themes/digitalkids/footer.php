<?php  
/**
 * @package Wanderer
 */
?>	
<?php get_sidebar(); ?>
		<footer>
			<div class="copyright">
				<p><?php echo get_wanderer_option('footer_text'); ?></p>

				<?php if( get_wanderer_option('copyright')) : ?>
					<p>
					<?php printf( __( 'Copyright %s by', 'wanderer' ), date('Y') ); ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'wanderer' ); ?>" rel="generator" class="midwestmade-themes-link">
						<?php bloginfo( 'name' ); ?>
					</a>
					<?php printf( __( ' - Wanderer, a %s Theme by', 'wanderer' ), 'WordPress' ); ?>
					<a href="<?php echo esc_url( 'http://press75.com' ); ?>">
						<?php _e( 'Press75', 'wanderer'); ?>
					</a>
					</p>
				<?php endif; ?>
			</div>
		</footer><!-- footer -->
	</div><!-- page-wrap__inner -->	
</div><!-- page-wrap -->

<?php wp_footer(); ?>

</body>
</html>