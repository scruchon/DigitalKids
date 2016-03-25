<?php
/**
 * Custom Meta Boxes
 *
 * @package Wanderer
 */

/* Meta box setup function. */

add_action( 'load-post.php', 'wanderer_post_meta_boxes_setup', 10, 2  );
add_action( 'load-post-new.php', 'wanderer_post_meta_boxes_setup', 10, 2  );

/* Create one or more meta boxes to be displayed on the post editor screen. */
function wanderer_add_post_meta_boxes() {

  add_meta_box(
    'wanderer-sub-title',      // Unique ID
    esc_html__( 'Subtitle', 'example' ),    // Title
    'wanderer_sub_title_meta_box',   // Callback function
    'post',         // Admin page (or post type)
    'normal',         // Context
    'high'         // Priority
  );
}

function wanderer_sub_title_meta_box( $object, $box ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'wanderer_sub_title_nonce' ); ?>

  <p>
    <label for="wanderer-sub-title"><?php _e( "Add a subtitle to your blog post", 'example' ); ?></label>
    <br />
    <input class="widefat" type="text" name="wanderer-sub-title" id="wanderer-sub-title" value="<?php echo esc_attr( get_post_meta( $object->ID, 'wanderer_sub_title', true ) ); ?>" size="30" />
  </p>
<?php }

/* Meta box setup function. */
function wanderer_post_meta_boxes_setup() {
  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'wanderer_add_post_meta_boxes' );
  /* Save post meta on the 'save_post' hook. */
  add_action( 'save_post', 'wanderer_save_sub_title_meta', 10, 2 );
}

/* Save the meta box's post metadata. */
function wanderer_save_sub_title_meta( $post_id, $post ) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['wanderer_sub_title_nonce'] ) || !wp_verify_nonce( $_POST['wanderer_sub_title_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST['wanderer-sub-title'] ) ? $_POST['wanderer-sub-title'] : '' );

  /* Get the meta key. */
  $meta_key = 'wanderer_sub_title';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}
