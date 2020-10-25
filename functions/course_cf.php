<?php

function course_meta_box() {
  add_meta_box(
    'course_meta_box',//ID of meta box
    __('Course data', 'tcd-w'),//label
    'show_course_meta_box',//callback function
    'course',// post type
    'normal',// context
    'high'// priority
  );
}
add_action('add_meta_boxes', 'course_meta_box');

function show_course_meta_box() {
  global $post;
  $options =  get_design_plus_option();

  $catch = array( 'name' => __('Catchphrase', 'tcd-w'), 'desc' => '', 'id' => 'catch', 'type' => 'input', 'std' => '' );
  $catch_meta = esc_html(get_post_meta($post->ID, 'catch', true));

  $desc = array( 'name' => __('Description', 'tcd-w'), 'desc' => '', 'id' => 'desc', 'type' => 'input', 'std' => '' );
  $desc_meta = esc_html(get_post_meta($post->ID, 'desc', true));

  $short_desc = array( 'name' => __('Short description for course list', 'tcd-w'), 'desc' => '', 'id' => 'short_desc', 'type' => 'input', 'std' => '' );
  $short_desc_meta = esc_html(get_post_meta($post->ID, 'short_desc', true));

  $header_image = array( 'name' => __('Header Image', 'tcd-w'), 'desc' => __('Recommend image size. Width:1180px, Height:360px', 'tcd-w'), 'id' => 'header_image', 'type' => 'image', 'std' => '' );

  // ---------------------------------------------------------------------

  echo '<input type="hidden" name="course_custom_fields_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

  //入力欄 ***************************************************************************************************************************************************************************************

  echo '<dl class="ml_custom_fields">';

  echo '<dt class="label"><label>' , $header_image['name'] ,'</label></dt>';
  echo '<dd class="content"><p class="desc">' , $header_image['desc'] , '</p>';
  mlcf_media_form('header_image', __('Image', 'tcd-w'));
  echo '</dd>';

  echo '<dt class="label"><label for="' , $catch['id'] , '">' , $catch['name'] , '</label></dt>';
  echo '<dd class="content">';
  echo '<textarea name="', $catch['id'], '" id="', $catch['id'], '" cols="100" rows="2">', $catch_meta ? $catch_meta : $catch['std'], '</textarea>';
  echo '</dd>';

  echo '<dt class="label"><label for="' , $desc['id'] , '">' , $desc['name'] , '</label></dt>';
  echo '<dd class="content">';
  echo '<textarea name="', $desc['id'], '" id="', $desc['id'], '" cols="100" rows="10">', $desc_meta ? $desc_meta : $desc['std'], '</textarea>';
  echo '</dd>';

  echo '<dt class="label"><label for="' , $short_desc['id'] , '">' , $short_desc['name'] , '</label></dt>';
  echo '<dd class="content">';
  echo '<textarea name="', $short_desc['id'], '" id="', $short_desc['id'], '" cols="100" rows="2">', $short_desc_meta ? $short_desc_meta : $short_desc['std'], '</textarea>';
  echo '</dd>';

  echo '</dl>';

}

function save_course_meta_box( $post_id ) {

  // verify nonce
  if (!isset($_POST['course_custom_fields_meta_box_nonce']) || !wp_verify_nonce($_POST['course_custom_fields_meta_box_nonce'], basename(__FILE__))) {
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
  $cf_keys = array('header_image','catch','desc','short_desc');
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
add_action('save_post', 'save_course_meta_box');




?>
