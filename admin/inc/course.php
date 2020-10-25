<?php
/*
 * 診療科目の設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_course_dp_default_options' );


// Add label of logo tab
add_action( 'tcd_tab_labels', 'add_course_tab_label' );


// Add HTML of logo tab
add_action( 'tcd_tab_panel', 'add_course_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_course_theme_options_validate' );


// タブの名前
function add_course_tab_label( $tab_labels ) {
	$tab_labels['course'] = __( 'Course', 'tcd-w' );
	return $tab_labels;
}


// 初期値
function add_course_dp_default_options( $dp_default_options ) {

	$dp_default_options['course_slug'] = 'course';
	$dp_default_options['bc_course_title'] = __( 'Course', 'tcd-w' );

	$dp_default_options['archive_course_title'] = __( 'Course', 'tcd-w' );
	$dp_default_options['archive_course_sub_title'] = 'MEDICAL';
	$dp_default_options['archive_course_title_font_size'] = '28';
	$dp_default_options['archive_course_sub_title_font_size'] = '16';
	$dp_default_options['archive_course_title_font_size_mobile'] = '18';
	$dp_default_options['archive_course_sub_title_font_size_mobile'] = '14';
	$dp_default_options['archive_course_headline'] = __( 'Here is a course catchphrase.', 'tcd-w' );
	$dp_default_options['archive_course_headline_font_size'] = '36';
	$dp_default_options['archive_course_desc'] = __( 'Here is a course description. Here is a course description. Here is a course description.', 'tcd-w' ) . "\n" . __( 'Here is a course description. Here is a course description. Here is a course description.', 'tcd-w' );
	$dp_default_options['archive_course_image'] = false;
	$dp_default_options['archive_course_cat'] = '';

	$dp_default_options['show_course_next_post'] = 1;
	$dp_default_options['course_single_prev_label'] = __( 'Prev page', 'tcd-w' );
	$dp_default_options['course_single_next_label'] = __( 'Next page', 'tcd-w' );

	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_course_tab_panel( $options ) {

  global $dp_default_options;

?>

<div id="tab-content-course" class="tab-content">


   <?php // 基本設定 -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Basic setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Slug setting', 'tcd-w');  ?></h4>
     <div class="theme_option_message">
      <p><?php _e('Please enter word by alphabet only.<br />After changing slug, please update permalink setting form <a href="./options-permalink.php"><strong>permalink option page</strong></a>.', 'tcd-w'); ?></p>
     </div>
     <p><input id="dp_options[course_slug]" class="hankaku regular-text" type="text" name="dp_options[course_slug]" value="<?php echo sanitize_title( $options['course_slug'] ); ?>" /></p>
     <h4 class="theme_option_headline2"><?php _e('Breadcrumb link title', 'tcd-w');  ?></h4>
     <input id="dp_options[bc_course_title]" class="regular-text" type="text" name="dp_options[bc_course_title]" value="<?php echo esc_attr( $options['bc_course_title'] ); ?>" />
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // アーカイブページの設定 -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Archive page setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Title', 'tcd-w');  ?></h4>
     <input id="dp_options[archive_course_title]" class="regular-text" type="text" name="dp_options[archive_course_title]" value="<?php echo esc_attr( $options['archive_course_title'] ); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Sub title', 'tcd-w');  ?></h4>
     <input id="dp_options[archive_course_sub_title]" class="regular-text" type="text" name="dp_options[archive_course_sub_title]" value="<?php echo esc_attr( $options['archive_course_sub_title'] ); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Font size setting', 'tcd-w');  ?></h4>
     <p><?php _e('Title', 'tcd-w');  ?> <input id="dp_options[archive_course_title_font_size]" class="font_size hankaku" type="text" name="dp_options[archive_course_title_font_size]" value="<?php esc_attr_e( $options['archive_course_title_font_size'] ); ?>" /><span>px</span></p>
     <p><?php _e('Sub title', 'tcd-w');  ?> <input id="dp_options[archive_course_sub_title_font_size]" class="font_size hankaku" type="text" name="dp_options[archive_course_sub_title_font_size]" value="<?php esc_attr_e( $options['archive_course_sub_title_font_size'] ); ?>" /><span>px</span></p>
     <p><?php _e('Title for mobile device', 'tcd-w');  ?> <input id="dp_options[archive_course_title_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[archive_course_title_font_size_mobile]" value="<?php esc_attr_e( $options['archive_course_title_font_size_mobile'] ); ?>" /><span>px</span></p>
     <p><?php _e('Sub title for mobile device', 'tcd-w');  ?> <input id="dp_options[archive_course_sub_title_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[archive_course_sub_title_font_size_mobile]" value="<?php esc_attr_e( $options['archive_course_sub_title_font_size_mobile'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Image', 'tcd-w'); ?></h4>
     <p><?php _e( 'Recommend image size. Width:1450px, Height:440px', 'tcd-w' ); ?></p>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js archive_course_image">
       <input type="hidden" value="<?php echo esc_attr( $options['archive_course_image'] ); ?>" id="archive_course_image" name="dp_options[archive_course_image]" class="cf_media_id">
       <div class="preview_field"><?php if($options['archive_course_image']){ echo wp_get_attachment_image($options['archive_course_image'], 'medium'); }; ?></div>
       <div class="buttton_area">
        <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
        <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['archive_course_image']){ echo 'hidden'; }; ?>">
       </div>
      </div>
     </div>
     <h4 class="theme_option_headline2"><?php _e('Catchphrase', 'tcd-w');  ?></h4>
     <textarea id="dp_options[archive_course_headline]" class="large-text" cols="50" rows="2" name="dp_options[archive_course_headline]"><?php echo esc_textarea( $options['archive_course_headline'] ); ?></textarea>
     <h4 class="theme_option_headline2"><?php _e('Font size of catchphrase', 'tcd-w');  ?></h4>
     <p><input id="dp_options[archive_course_headline_font_size]" class="font_size hankaku" type="text" name="dp_options[archive_course_headline_font_size]" value="<?php esc_attr_e( $options['archive_course_headline_font_size'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Description', 'tcd-w');  ?></h4>
     <textarea id="dp_options[archive_course_desc]" class="large-text" cols="50" rows="4" name="dp_options[archive_course_desc]"><?php echo esc_textarea( $options['archive_course_desc'] ); ?></textarea>
     <h4 class="theme_option_headline2"><?php _e('Course list display setting', 'tcd-w');  ?></h4>
     <div class="theme_option_message">
      <p><?php _e('Enter a comma-seperated list of course category ID numbers, example 2,4,10<br />(Don\'t enter comma for last number).', 'tcd-w'); ?></p>
     </div>
     <p><input id="dp_options[archive_course_cat]" class="hankaku regular-text" type="text" name="dp_options[archive_course_cat]" value="<?php echo esc_attr( $options['archive_course_cat'] ); ?>" /></p>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // 詳細ページの設定 -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Single page setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><label><input id="dp_options[show_course_next_post]" name="dp_options[show_course_next_post]" type="checkbox" value="1" <?php checked( '1', $options['show_course_next_post'] ); ?> /> <?php _e('Display next prev link', 'tcd-w');  ?></label></p>
     <h4 class="theme_option_headline2"><?php _e('Previous page link', 'tcd-w');  ?></h4>
     <input id="dp_options[course_single_prev_label]" class="regular-text" type="text" name="dp_options[course_single_prev_label]" value="<?php echo esc_attr( $options['course_single_prev_label'] ); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Next page link', 'tcd-w');  ?></h4>
     <input id="dp_options[course_single_next_label]" class="regular-text" type="text" name="dp_options[course_single_next_label]" value="<?php echo esc_attr( $options['course_single_next_label'] ); ?>" />
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


</div><!-- END .tab-content -->

<?php
} // END add_course_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_course_theme_options_validate( $input ) {

  global $dp_default_options;

  //基本設定
  $input['course_slug'] = sanitize_title( $input['course_slug'] );
  $input['bc_course_title'] = wp_filter_nohtml_kses( $input['bc_course_title'] );

  //アーカイブページの設定
  $input['archive_course_title'] = wp_filter_nohtml_kses( $input['archive_course_title'] );
  $input['archive_course_sub_title'] = wp_filter_nohtml_kses( $input['archive_course_sub_title'] );
  $input['archive_course_image'] = wp_filter_nohtml_kses( $input['archive_course_image'] );
  $input['archive_course_headline'] = wp_filter_nohtml_kses( $input['archive_course_headline'] );
  $input['archive_course_headline_font_size'] = wp_filter_nohtml_kses( $input['archive_course_headline_font_size'] );
  $input['archive_course_desc'] = wp_filter_nohtml_kses( $input['archive_course_desc'] );
  $input['archive_course_cat'] = wp_filter_nohtml_kses( $input['archive_course_cat'] );
  $input['archive_course_title_font_size'] = wp_filter_nohtml_kses( $input['archive_course_title_font_size'] );
  $input['archive_course_sub_title_font_size'] = wp_filter_nohtml_kses( $input['archive_course_sub_title_font_size'] );
  $input['archive_course_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_course_title_font_size_mobile'] );
  $input['archive_course_sub_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_course_sub_title_font_size_mobile'] );

  //詳細ページの設定
  $input['course_single_next_label'] = wp_filter_nohtml_kses( $input['course_single_next_label'] );
  $input['course_single_prev_label'] = wp_filter_nohtml_kses( $input['course_single_prev_label'] );
  if ( ! isset( $input['show_course_next_post'] ) )
    $input['show_course_next_post'] = null;
    $input['show_course_next_post'] = ( $input['show_course_next_post'] == 1 ? 1 : 0 );


	return $input;

};


?>