<?php

/* フォーム用 画像フィールド出力 */
function mlcf_media_form($cf_key, $label) {
	global $post;
	if (empty($cf_key)) return false;
	if (empty($label)) $label = $cf_key;

	$media_id = get_post_meta($post->ID, $cf_key, true);
?>
  <div class="cf cf_media_field hide-if-no-js <?php echo esc_attr($cf_key); ?>">
    <input type="hidden" class="cf_media_id" name="<?php echo esc_attr($cf_key); ?>" id="<?php echo esc_attr($cf_key); ?>" value="<?php echo esc_attr($media_id); ?>" />
    <div class="preview_field"><?php if ($media_id) the_mlcf_image($post->ID, $cf_key); ?></div>
    <div class="buttton_area">
     <input type="button" class="cfmf-select-img button" value="<?php _e('Select Image', 'tcd-w'); ?>" />
     <input type="button" class="cfmf-delete-img button<?php if (!$media_id) echo ' hidden'; ?>" value="<?php _e('Remove Image', 'tcd-w'); ?>" />
    </div>
  </div>
<?php
}




/* 画像フィールドで選択された画像をimgタグで出力 */
function the_mlcf_image($post_id, $cf_key, $image_size = 'medium') {
	echo get_mlcf_image($post_id, $cf_key, $image_size);
}

/* 画像フィールドで選択された画像をimgタグで返す */
function get_mlcf_image($post_id, $cf_key, $image_size = 'medium') {
	global $post;
	if (empty($cf_key)) return false;
	if (empty($post_id)) $post_id = $post->ID;

	$media_id = get_post_meta($post_id, $cf_key, true);
	if ($media_id) {
		return wp_get_attachment_image($media_id, $image_size, $image_size);
	}

	return false;
}

/* 画像フィールドで選択された画像urlを返す */
function get_mlcf_image_url($post_id, $cf_key, $image_size = 'medium') {
	global $post;
	if (empty($cf_key)) return false;
	if (empty($post_id)) $post_id = $post->ID;

	$media_id = get_post_meta($post_id, $cf_key, true);
	if ($media_id) {
		$img = wp_get_attachment_image_src($media_id, $image_size);
		if (!empty($img[0])) {
			return $img[0];
		}
	}

	return false;
}

/* 画像フィールドで選択されたメディアのURLを出力 */
function the_mlcf_media_url($post_id, $cf_key) {
	echo get_mlcf_media_url($post_id, $cf_key);
}

/* 画像フィールドで選択されたメディアのURLを返す */
function get_mlcf_media_url($post_id, $cf_key) {
	global $post;
	if (empty($cf_key)) return false;
	if (empty($post_id)) $post_id = $post->ID;

	$media_id = get_post_meta($post_id, $cf_key, true);
	if ($media_id) {
		return wp_get_attachment_url($media_id);
	}

	return false;
}



// カスタムフィールド -------------------------------------------------------------------------------------------------------------------------

function page_meta_box() {
  add_meta_box(
    'page_meta_box1',//ID of meta box
    __('Additional page function', 'tcd-w'),//label
    'show_page_meta_box',//callback function
    'page',// post type
    'normal',// context
    'high'// priority
  );
}
add_action('add_meta_boxes', 'page_meta_box');

function show_page_meta_box() {
  global $post;
  $options =  get_design_plus_option();

  $sub_title = array( 'name' => __('Sub title', 'tcd-w'), 'desc' => '', 'id' => 'sub_title', 'type' => 'input', 'std' => '' );
  $sub_title_meta = esc_html(get_post_meta($post->ID, 'sub_title', true));

  $header_image = array( 'name' => __('Header image', 'tcd-w'), 'desc' => '', 'id' => 'header_image', 'type' => 'image', 'std' => '' );

  $show_nav = array( 'name' => __('Page navigation setting', 'tcd-w'), 'label' => __('Display page navigation', 'tcd-w'), 'id' => 'show_nav', 'type' => 'checkbox', 'value' => 'on', 'std' => '');
  $show_nav_meta = esc_html(get_post_meta($post->ID, 'show_nav', true));

  // ---------------------------------------------------------------------

  echo '<input type="hidden" name="page_custom_fields_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

  //入力欄 ***************************************************************************************************************************************************************************************

  echo '<dl class="ml_custom_fields">';

  echo '<dt class="label"><label for="' , $sub_title['id'] , '">' , $sub_title['name'] , '</label></dt>';
  echo '<dd class="content"><input type="text" name="', $sub_title['id'], '" id="', $sub_title['id'], '" value="', $sub_title_meta ? $sub_title_meta : $sub_title['std'], '" size="30" style="width:100%" /></dd>';

  echo '<dt class="label"><label>' , $header_image['name'] ,'</label></dt>';
  echo '<dd class="content">';
  mlcf_media_form('header_image', __('Header image', 'tcd-w'));
  echo '</dd>';

  echo '<dt class="label">' , $show_nav['name'] , '</dt>';
  echo '<dd class="content"><label for="' , $show_nav['id'] , '"><input type="checkbox" name="', $show_nav['id'], '" id="', $show_nav['id'], '" value="', $show_nav['value'], '"', ($show_nav_meta == $show_nav['value'] || !empty($show_nav_meta) ) ? ' checked="checked"' : '', '/>' , $show_nav['label'] , '</label></dd>';

  echo '</dl>';

}

function save_page_meta_box( $post_id ) {

  // verify nonce
  if (!isset($_POST['page_custom_fields_meta_box_nonce']) || !wp_verify_nonce($_POST['page_custom_fields_meta_box_nonce'], basename(__FILE__))) {
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
  $cf_keys = array('show_nav','sub_title','header_image');
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
add_action('save_post', 'save_page_meta_box');




?>
