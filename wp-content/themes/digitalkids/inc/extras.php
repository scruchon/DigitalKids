<?php
/**
 * Remove default gallery style
 *
 * Removes inline styles printed when the 
 * gallery shortcode is used.
 *
 * @since 3.0
 * @package Wanderer
 */

/**
 * Custom Excerpt Length
 *
 */
function wanderer_new_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'wanderer_new_excerpt_length' );


/**
 * Custom Excerpt More
 *
 */
function wanderer_new_excerpt_more( $more ) {
	return ' ...';
}
add_filter( 'excerpt_more', 'wanderer_new_excerpt_more' );

/**
 * Pings Callback Setup
 *
 * @since 3.0
 */
if ( ! function_exists( 'wanderer_pings_callback' ) ) {
	function wanderer_pings_callback( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		?>
		<li class="ping" id="li-comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
		<?php
	}
}

/**
 * Callback for gereration custom comment html
 *
 * @since 1.0
 */
function wanderer_custom_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   <?php if ($comment->comment_approved == '0') : ?>
      <em><?php _e('Your comment is awaiting moderation.', 'wanderer') ?></em>
   <?php endif; ?>
		
		<div class="comment-body">
			<div class="comment-avatar">
				<?php echo get_avatar( $comment ); ?>
			</div>
			<div class="comment-entry">
				<h5 class="comment-author"><?php comment_author(); ?></h5>
				<h6 class="comment-date"><?php comment_date(); ?> | <?php comment_time(); ?> </h6>
				<p><?php comment_text(); ?></p>
			</div>
			<div class="reply">
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>
		</div>

<?php }

/**
 * Modify main query to show Category set in Theme Options if set.
 *
 * @param WP_Query $query
 * @return WP_Query
 */
function wanderer_main_query_pre_get_posts( $query ) {
	// Bail if not the home page, not a query, not main query
	if ( ! is_home() || ! is_a( $query, 'WP_Query' ) || ! $query->is_main_query() ) {
		return;
	}

	$hide_featured_id = get_wanderer_option( 'hide_featured' );
	$featured_cat = get_wanderer_option( 'featured' );

	if( $featured_cat && $hide_featured_id ){
		$query->set( 'cat', - $featured_cat );
	}

	$query->set( 'paged', wanderer_get_paged_query_var() );
}

/**
 * Custom content width for jetpack galleries.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 750;
}

/**
 * Remove featured post except from current post tagged with it.
 * @param $post_id
 */
function wanderer_set_featured_post( $post_id ) {

	$featured_id = get_wanderer_option('featured');
	$featured_id = preg_replace('#^https?://#', '', $featured_id);

    $featured = (int)$featured_id;

    if( has_category( $featured, $post_id ) ) {

        $current_post = $post_id;

        $args = array(
        	'post_type' => 'post',
        	'posts_per_page' => -1,
        	'post__not_in' => array($current_post)
        	);

        $posts = get_posts($args);

        foreach( $posts as $post ) {
            wp_remove_object_terms( $post->ID, $featured, 'category' );
        }
    }
}

add_action('save_post', 'wanderer_set_featured_post');
add_action('publish_post', 'wanderer_set_featured_post');