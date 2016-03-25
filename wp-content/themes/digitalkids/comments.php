<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Wanderer
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comment on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'wanderer' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'wanderer' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'wanderer' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'wanderer' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 100,
					'callback'    => 'wanderer_custom_comments'
				) );
			?>
		</ul><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'wanderer' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'wanderer' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'wanderer' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'wanderer' ); ?></p>
	<?php endif; ?>

	<?php 
		ob_start();
		comment_form( 
			array(
				'comment_notes_before'=>'<div class="comment-notes">Your email address will not be published. Required fields are marked *</div>',
				'comment_notes_after'=>'',
				'comment_field' => '<p class="comment-form-comment">' .
				'<textarea id="comment" name="comment" class="form-control" rows="5" required></textarea>' . '<label for="comment">' . __( 'Comment', 'wanderer' ) . '</label>' .
				( $req ? ' <span class="required">*</span>' : '' ) . '</p>',
				'fields' => apply_filters( 'comment_form_default_fields', array(
			    'author' =>
			      '<p class="comment-form-author">' .
			      '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			      '" size="30" required/>' . '<label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
			      ( $req ? '<span class="required">*</span>' : '' ) . '</p>',
			
			    'email' =>
			      '<p class="comment-form-email">' . 
			      '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			      '" size="30" required/>' . '<label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
			      ( $req ? '<span class="required">*</span>' : '' ) . '</p>',
			    )
			  ),
			)
		); 
		$string = ob_get_contents();
	    $string = str_replace('<h3 id="reply-title"', '<h5 ', $string);
	    $string = str_replace('</h3>', '</h5>', $string);
	    $string = str_replace('<input name="submit"', '<input class="btn btn-primary" name="submit" ', $string);
	    ob_end_clean();
	
	    // submit
	    echo $string;
	?>

</div><!-- #comments -->
