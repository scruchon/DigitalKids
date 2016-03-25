<?php
/**
  * The template used for displaying single content in single.php
 *
 * @package Wanderer
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if($author = get_the_author()) { ?>
			<h6 class="post-author"><?php _e('An article by ', 'wanderer'); echo $author; ?></h6>
		<?php } ?>
		
		<?php if($subTitle = get_post_meta( get_the_ID(), 'wanderer_sub_title', true )) : ?>
            <h2 class="entry-subtitle"><?php echo sanitize_text_field($subTitle); ?></h2>
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

	<footer class="entry-footer">
		<?php
			// translators: used between list items, there is a space after the comma
			$category_list = get_the_category_list( __( ', ', 'wanderer' ) );

			// translators: used between list items, there is a space after the comma
			$tag_list = get_the_tag_list( '', __( ', ', 'wanderer' ) );
			
			// But this blog has loads of categories so we should probably display them here
			if ( '' != $tag_list ) {
				$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'wanderer' );
			} else {
				$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'wanderer' );
			}

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>
		<?php edit_post_link( __( 'Edit', 'wanderer' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
