<?php


//ブログ -----------------------------------------------------------
add_filter('manage_post_posts_columns', 'add_thumbnail_column_for_post', 5);
function add_thumbnail_column_for_post($columns){
	$columns['recommend_post'] = __('Recommend post', 'tcd-w');
  $columns['new_post_thumb'] = __('Featured Image', 'tcd-w');
  return $columns;
}

add_action('manage_post_posts_custom_column', 'display_thumbnail_column_for_post', 5, 2);
function display_thumbnail_column_for_post($column_name, $post_id){
  switch($column_name){
    case 'new_post_thumb':
      $post_thumbnail_id = get_post_thumbnail_id($post_id);
      if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
        echo '<img width="70" src="' . $post_thumbnail_img[0] . '" />';
      }
      break;
	  case 'recommend_post':
		  if(get_post_meta($post_id, 'recommend_post', true)) {  _e('Recommend post1<br />', 'tcd-w'); };
		  if(get_post_meta($post_id, 'recommend_post2', true)) {  _e('Recommend post2<br />', 'tcd-w'); };
		  if(get_post_meta($post_id, 'pickup_post', true)) {  _e('Pickup post', 'tcd-w'); };
      break;
  }
}


//お知らせ -----------------------------------------------------------
add_filter('manage_news_posts_columns', 'add_thumbnail_column_for_news', 5);
function add_thumbnail_column_for_news($columns){
  $columns['new_post_thumb'] = __('Featured Image', 'tcd-w');
  return $columns;
}

add_action('manage_news_posts_custom_column', 'display_thumbnail_column_for_news', 5, 2);
function display_thumbnail_column_for_news($column_name, $post_id){
  switch($column_name){
    case 'new_post_thumb':
      $post_thumbnail_id = get_post_thumbnail_id($post_id);
      if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
        echo '<img width="70" src="' . $post_thumbnail_img[0] . '" />';
      }
      break;
  }
}


//診療科目 -----------------------------------------------------------
add_filter('manage_course_posts_columns', 'add_thumbnail_column_for_course', 5);
function add_thumbnail_column_for_course($columns){
  $columns['new_post_thumb'] = __('Featured Image', 'tcd-w');
  return $columns;
}

add_action('manage_course_posts_custom_column', 'display_thumbnail_column_for_course', 5, 2);
function display_thumbnail_column_for_course($column_name, $post_id){
  switch($column_name){
    case 'new_post_thumb':
      $post_thumbnail_id = get_post_thumbnail_id($post_id);
      if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
        echo '<img width="70" src="' . $post_thumbnail_img[0] . '" />';
      }
      break;
  }
}


?>