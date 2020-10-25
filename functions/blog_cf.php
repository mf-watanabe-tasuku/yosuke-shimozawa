<?php
function blog_meta_box() {
  add_meta_box(
    'blog_meta_box',//ID of meta box
    __('Additional blog function', 'tcd-w'),//label
    'show_blog_meta_box',//callback function
    'post',// post type
    'normal',// context
    'high'// priority
  );
}
add_action('add_meta_boxes', 'blog_meta_box');

function show_blog_meta_box() {
  global $post;

  $pagenation_type =
    array(
			'name' => __( 'Pagenation settings', 'tcd-w' ),
      'description' => __( 'Please select the pagenation type.', 'tcd-w' ),
      'id' => 'pagenation_type',
      'type' => 'radio',
      'std' => 'type3',
      'options' => array(
        'type1' => array( 'value' => 'type1', 'label' => __( 'Page numbers', 'tcd-w' ) ),
        'type2' => array( 'value' => 'type2', 'label' => __( 'Read more button', 'tcd-w' ) ),
        'type3' => array( 'value' => 'type3', 'label' => __( 'Use theme options settings', 'tcd-w' ) )
      )
    );
  $pagenation_type_meta = get_post_meta($post->ID, 'pagenation_type', true);


  // ---------------------------------------------------------------------

  echo '<input type="hidden" name="blog_custom_fields_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

  //“ü—Í—“ ***************************************************************************************************************************************************************************************

  echo '<dl class="ml_custom_fields">';

  echo '<dt class="label"><label for="' , $pagenation_type['id'] , '">' , $pagenation_type['name'] , '</label></dt>';
  echo '<dd class="content">';
  echo '<select name="' , $pagenation_type['id'] , '">';
	foreach ($pagenation_type['options'] as $pagenation_type_option) {
   echo '<option value="', $pagenation_type_option['value'], '"', ( $pagenation_type_meta == $pagenation_type_option['value'] || (!$pagenation_type_meta && $pagenation_type['std'] == $pagenation_type_option['value']) ) ? ' selected="selected"' : '', ' />', $pagenation_type_option['label'] , '</option>';
  }
  echo '</select>';
  echo '</dd>';

  echo '</dl>';

}

function save_blog_meta_box( $post_id ) {

  // verify nonce
  if (!isset($_POST['blog_custom_fields_meta_box_nonce']) || !wp_verify_nonce($_POST['blog_custom_fields_meta_box_nonce'], basename(__FILE__))) {
    return $post_id;
  }

  // check autosave
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return $post_id;
  }

  // check permissions
  if ('page' == $_POST['post_type']) {
    if (!current_user_can('edit_page', $post_id)) {
      return $post_id;
    }
  } elseif (!current_user_can('edit_post', $post_id)) {
      return $post_id;
  }

  // save or delete
  $cf_keys = array('pagenation_type');
  foreach ($cf_keys as $cf_key) {
    $old = get_post_meta($post_id, $cf_key, true);

    if (isset($_POST[$cf_key])) {
      $new = $_POST[$cf_key];
    } else {
      $new = '';
    }

    if ($new && $new != $old) {
      update_post_meta($post_id, $cf_key, $new);
    } elseif ('' == $new && $old) {
      delete_post_meta($post_id, $cf_key, $old);
    }
  }

}
add_action('save_post', 'save_blog_meta_box');



?>