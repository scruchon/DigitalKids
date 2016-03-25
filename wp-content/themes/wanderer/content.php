<?php
/**
 * @package Wanderer
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 id="title" class="entry-title-animate"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php if($subTitle = get_post_meta( get_the_ID(), 'wanderer_sub_title', true )) : ?>
            <h2 class="entry-subtitle"><?php echo sanitize_title($subTitle); ?></h2>
        <?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'wanderer' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry__footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'wanderer' ) );
				if ( $categories_list ) :
			?>
			<div class="cat-links">
				<?php printf( __( 'Categories: %1$s', 'wanderer' ), $categories_list ); ?>
			</div>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'wanderer' ) );
				if ( $tags_list ) :
			?>
			<div class="tags-links">
				<?php printf( __( 'Tagged: %1$s', 'wanderer' ), $tags_list ); ?>
			</div>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->