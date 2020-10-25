<?php

// カテゴリー編集用入力欄を出力 -------------------------------------------------------
function course_category_edit_extra_fields( $term ) {
	$term_meta = get_option( 'taxonomy_' . $term->term_id, array() );
	$term_meta = array_merge( array(
		'index_image' => null,
		'archive_image' => null,
		'color' => '#e0b2b5',
		'headline' => '',
		'index_desc' => '',
		'sub_title' => '',
		'archive_desc' => '',
	), $term_meta );
?>
<tr class="form-field">
	<th colspan="2">

<div class="custom_category_meta">
 <h3 class="ccm_headline"><?php _e( 'Additional setting', 'tcd-w' ); ?></h3>

 <div class="ccm_content clearfix">
  <h4 class="headline"><?php _e( 'Color', 'tcd-w' ); ?></h4>
  <div class="input_field">
   <p><input type="text" id="category-color" name="term_meta[color]" value="<?php echo esc_attr( $term_meta['color'] ); ?>" data-default-color="#e0b2b5" class="c-color-picker"></p>
  </div><!-- END input_field -->
 </div><!-- END ccm_content -->

 <div class="ccm_content clearfix">
  <h4 class="headline"><?php _e( 'Image for front page', 'tcd-w' ); ?></h4>
  <p><?php _e( 'Recommend image size. Width:510px, Height:300px', 'tcd-w' ); ?></p>
  <div class="input_field">
		<div class="image_box cf">
			<div class="cf cf_media_field hide-if-no-js">
				<input type="hidden" value="<?php if ( $term_meta['index_image'] ) echo esc_attr( $term_meta['index_image'] ); ?>" id="index_category_image" name="term_meta[index_image]" class="cf_media_id">
				<div class="preview_field"><?php if ( $term_meta['index_image'] ) echo wp_get_attachment_image( $term_meta['index_image'], 'medium'); ?></div>
				<div class="button_area">
					<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
					<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $term_meta['index_image'] ) echo 'hidden'; ?>">
				</div>
			</div>
		</div>
  </div><!-- END input_field -->
 </div><!-- END ccm_content -->

 <div class="ccm_content clearfix">
  <h4 class="headline"><?php _e( 'Short description for front page', 'tcd-w' ); ?></h4>
  <div class="input_field">
   <p><textarea id="caetgory-index_desc" cols="50" rows="2" name="term_meta[index_desc]"><?php echo esc_textarea( $term_meta['index_desc'] ); ?></textarea></p>
  </div><!-- END input_field -->
 </div><!-- END ccm_content -->

</div><!-- END .custom_category_meta -->

<div class="custom_category_meta">
 <h3 class="ccm_headline"><?php _e( 'Archive page setting', 'tcd-w' ); ?></h3>

 <div class="ccm_content clearfix">
  <h4 class="headline"><?php _e( 'Sub title', 'tcd-w' ); ?></h4>
  <div class="input_field">
   <p><input type="text" id="category-sub_title" name="term_meta[sub_title]" value="<?php echo esc_attr( $term_meta['sub_title'] ); ?>"></p>
  </div><!-- END input_field -->
 </div><!-- END ccm_content -->

 <div class="ccm_content clearfix">
  <h4 class="headline"><?php _e( 'Image', 'tcd-w' ); ?></h4>
  <p><?php _e( 'Recommend image size. Width:1450px, Height:440px', 'tcd-w' ); ?></p>
  <div class="input_field">
		<div class="image_box cf">
			<div class="cf cf_media_field hide-if-no-js">
				<input type="hidden" value="<?php if ( $term_meta['archive_image'] ) echo esc_attr( $term_meta['archive_image'] ); ?>" id="archive_category_image" name="term_meta[archive_image]" class="cf_media_id">
				<div class="preview_field"><?php if ( $term_meta['archive_image'] ) echo wp_get_attachment_image( $term_meta['archive_image'], 'medium'); ?></div>
				<div class="button_area">
					<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
					<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $term_meta['archive_image'] ) echo 'hidden'; ?>">
				</div>
			</div>
		</div>
  </div><!-- END input_field -->
 </div><!-- END ccm_content -->

 <div class="ccm_content clearfix">
  <h4 class="headline"><?php _e( 'Catchphrase', 'tcd-w' ); ?></h4>
  <div class="input_field">
   <p><textarea id="caetgory-headline" cols="50" rows="2" name="term_meta[headline]"><?php echo esc_textarea( $term_meta['headline'] ); ?></textarea></p>
  </div><!-- END input_field -->
 </div><!-- END ccm_content -->

 <div class="ccm_content clearfix">
  <h4 class="headline"><?php _e( 'Description', 'tcd-w' ); ?></h4>
  <div class="input_field">
   <p><textarea id="caetgory-archive_desc" cols="50" rows="2" name="term_meta[archive_desc]"><?php echo esc_textarea( $term_meta['archive_desc'] ); ?></textarea></p>
  </div><!-- END input_field -->
 </div><!-- END ccm_content -->

</div><!-- END .custom_category_meta -->

 </th>
</tr><!-- END .form-field -->
<?php
}
add_action( 'course_category_edit_form_fields', 'course_category_edit_extra_fields' );


// データを保存 -------------------------------------------------------
function course_category_save_extra_fileds( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$term_meta = get_option( "taxonomy_{$term_id}", array() );
		$meta_keys = array(
			'index_image',
			'archive_image',
			'color',
			'headline',
			'index_desc',
			'sub_title',
			'archive_desc',
		);
		foreach ( $meta_keys as $key ) {
			if ( isset( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}

		update_option( "taxonomy_{$term_id}", $term_meta );
	}
}
add_action( 'edited_course_category', 'course_category_save_extra_fileds' );




// 親カテゴリーのIDを出力 -----------------------------------------------------
function show_category_id() {
  global $post;
  $category = get_the_category();

  if(!empty($category)) {

  usort($category, "sort_by_cat_parent");
  $category_parent_id = $category[0]->category_parent; //配列の先頭のカテゴリーを取得
  if ( $category_parent_id != 0 ) { //もし親カテゴリーがある場合
    $category_parent = get_term( $category_parent_id, 'category' );
    $cat_id = $category_parent->term_id;
  } else { //親カテゴリーが無い場合はそのまま表示する
    $cat_id = $category[0]->term_id;
  }
  return esc_html($cat_id);

  };

};




// 親カテゴリーのIDを出力(カテゴリーページ用) ----------------------------------------
function show_category_id2() {
  $cat_data = get_queried_object();
  if(!empty($cat_data)) {
    $cat_id = $cat_data->term_id;
    return esc_html($cat_id);
  };
};


