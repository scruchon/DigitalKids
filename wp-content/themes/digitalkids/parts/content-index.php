<?php
/**
 * The template used for displaying content on home.php
 *
 * @package Wanderer
 */
?>

<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-index" <?php echo ( $url ? 'style="background-image: url(' . $url . ');"' : null ); ?> >
		<div class="entry-content">
			<span class="post-date"><?php echo get_the_date("F j, Y"); ?></span>
			<?php the_title( sprintf( '<h1 id="title" class="entry-title-index entry-title-hover"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			<?php if($subTitle = get_post_meta( get_the_ID(), 'wanderer_sub_title', true )) : ?>
	            <h2 class="entry-subtitle-index"><?php echo sanitize_text_field($subTitle); ?></h2>
	        <?php endif; ?>
	    </div>
	</header><!-- .entry-header -->
</article><!-- #post-## -->