<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Wanderer
 * @since 3.0.0
 */

if ( ! function_exists( 'wanderer_get_category_list' ) ) :
/**
 * Get Category List
 *
 * Utility function to get the category list and
 * return array of category ID and Name.
 *
 * @return Array Category ID, Name, and Count
 */
function wanderer_get_category_list( $args = array() ) {

	$list = array();
	$categories = get_categories( $args );
	$list[''] = __( 'All categories', 'wanderer' );

	foreach ( (array) $categories as $category ) {
		$list[$category->cat_ID] = $category->cat_name;
		if ( ! isset( $args['show_count'] ) ) {
			$list[$category->cat_ID] .= ' (' . number_format_i18n( $category->category_count ) . ')';
		}
	}

	return $list;

}
endif;

if ( ! function_exists( 'wanderer_get_user_list' ) ) :
/**
 * Get User List
 *
 * Utility function to get the user list and
 * return array of user ID and Name.
 *
 * @return Array User ID, Name, and Count
 */
function wanderer_get_user_list( $args = array() ) {

	$list = array();
	$users = get_users( $args );

	$list[''] = __( 'All users', 'wanderer' );

	foreach ( (array) $users as $user ) {
		$list[$user->ID] = $user->display_name;
	}

	return $list;

}
endif;


if ( ! function_exists( 'wanderer_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function wanderer_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'wanderer' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'wanderer' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, 64 ); ?>
		
		<section id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php printf( __( '%s', 'wanderer' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'wanderer' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					<?php edit_comment_link( __( 'Edit', 'wanderer' ), '<span class="edit-link">', '</span>' ); ?>
					
					<?php
						comment_reply_link( array_merge( $args, array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<div class="reply">',
							'after'     => '</div>',
						) ) );
					?>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'wanderer' ); ?></p>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for wanderer_comment()


/**
 * Archives title
 *
 */
function wanderer_archives_title() {
	if ( is_category() ) { /* If this is a category archive */
		printf( __( '<span>Browsing Category: </span><br /> %s', 'wanderer' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) { /* If this is a tag archive */
		printf( __( '<span>Browsing Tags: </span><br /> %s', 'wanderer' ), single_tag_title( '', false ) );
	} elseif ( is_day() ) { /* If this is a daily archive */
		printf( __( '<span>Archive For: </span><br /> %s', 'wanderer' ), get_the_time(  'F jS, Y', 'wanderer' ) );
	} elseif ( is_month() ) { /* If this is a monthly archive */
		printf( __( '<span>Archive For: </span><br /> %s', 'wanderer' ), get_the_time(  'F, Y', 'wanderer' ) );
	} elseif ( is_year() ) { /* If this is a yearly archive */
		printf( __( '<span>Archive For: </span><br /> %s', 'wanderer' ), get_the_time(  'Y', 'wanderer' ) );
	} elseif ( is_search() ) { /* If this is a search archive */
		printf( __( '<span>Search Results For: </span><br /> %s', 'wanderer' ), get_search_query() );
	} elseif ( is_author() ) { /* If this is an author archive */
		printf( __( '<span>Posts By: </span><br /> %s', 'wanderer' ), get_the_author() );
	} elseif ( is_paged() ) { /* If this is a paged archive */
		_e( '<span>Browsing: </span> Blog Archives', 'wanderer' );
	}
}


/** 
 * The below functionality is used because the query is set
 * in a page template, the "paged" variable is available. However,
 * if the query is on a page template that is set as the websites
 * static posts page, "paged" is always set at 0. In this case, we
 * have another variable to work with called "page", which increments
 * the pagination properly.
 * 
 * Hat Tip: @nathanrice
 * 
 * @link http://wordpress.org/support/topic/wp-30-bug-with-pagination-when-using-static-page-as-homepage-1
 */
if ( ! function_exists( 'wanderer_get_paged_query_var' ) ) :
function wanderer_get_paged_query_var() {
	if ( get_query_var( 'paged' ) ) {
		$paged = get_query_var( 'paged' );
	} elseif ( get_query_var( 'page' ) ) {
		$paged = get_query_var( 'page' );
	} else {
		$paged = 1;
	}
	return $paged;
}
endif;

/**
 * Get Attachment Image
 *
 * Print the attached image with a link to the next attached image.
 *
 * @since 4.0
 */
if ( ! function_exists( 'wanderer_the_attached_image' ) ) :
	
	function wanderer_the_attached_image() {
		/**
		 * Filter the image attachment size to use.
		 *
		 * @since Twenty thirteen 1.0
		 *
		 * @param array $size {
		 *     @type int The attachment height in pixels.
		 *     @type int The attachment width in pixels.
		 * }
		 */
		$attachment_size     = apply_filters( 'wanderer_attachment_size', array( 724, 724 ) );
		$next_attachment_url = wp_get_attachment_url();
		$post                = get_post();
	
		/*
		 * Grab the IDs of all the image attachments in a gallery so we can get the URL
		 * of the next adjacent image in a gallery, or the first image (if we're
		 * looking at the last image in a gallery), or, in a gallery of one, just the
		 * link to that image file.
		 */
		$attachment_ids = get_posts( array(
			'post_parent'    => $post->post_parent,
			'fields'         => 'ids',
			'numberposts'    => -1,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ID'
		) );
	
		// If there is more than 1 attachment in a gallery...
		if ( count( $attachment_ids ) > 1 ) {
			foreach ( $attachment_ids as $attachment_id ) {
				if ( $attachment_id == $post->ID ) {
					$next_id = current( $attachment_ids );
					break;
				}
			}
	
			// get the URL of the next image attachment...
			if ( $next_id )
				$next_attachment_url = get_attachment_link( $next_id );
	
			// or get the URL of the first image attachment.
			else
				$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	
		printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
			esc_url( $next_attachment_url ),
			the_title_attribute( array( 'echo' => false ) ),
			wp_get_attachment_image( $post->ID, $attachment_size )
		);
	}
	
endif;

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	* Filters wp_title to print a neat <title> tag based on what is being viewed.
	*
	* @param string $title Default title text for current view.
	* @param string $sep Optional separator.
	* @return string The filtered title.
	*/
	function wanderer_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'wanderer' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'wanderer_wp_title', 10, 2 );

	/**
	* Title shim for sites older than WordPress 4.1.
	*
	* @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	* @todo Remove this function when WordPress 4.3 is released.
	*/
	function wanderer_render_title() { ?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php }

	add_action( 'wp_head', 'wanderer_render_title' );
endif;