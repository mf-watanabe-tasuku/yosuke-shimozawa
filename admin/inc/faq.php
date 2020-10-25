<?php
/*
 * FAQの設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_faq_dp_default_options' );


// Add label of logo tab
add_action( 'tcd_tab_labels', 'add_faq_tab_label' );


// Add HTML of logo tab
add_action( 'tcd_tab_panel', 'add_faq_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_faq_theme_options_validate' );


// タブの名前
function add_faq_tab_label( $tab_labels ) {
	$tab_labels['faq'] = __( 'FAQ', 'tcd-w' );
	return $tab_labels;
}


// 初期値
function add_faq_dp_default_options( $dp_default_options ) {

  //基本設定
	$dp_default_options['faq_slug'] = 'faq';

  //アーカイブページの設定
	$dp_default_options['archive_faq_title'] = __( 'FAQ', 'tcd-w' );
	$dp_default_options['archive_faq_sub_title'] = 'FAQ';
	$dp_default_options['archive_faq_headline'] = __( 'Here is a faq catchphrase.', 'tcd-w' );
	$dp_default_options['archive_faq_headline_font_size'] = '36';
	$dp_default_options['archive_faq_desc'] = __( 'Here is a faq description. Here is a faq description. Here is a faq description.', 'tcd-w' ) . "\n" . __( 'Here is a faq description. Here is a faq description. Here is a faq description.', 'tcd-w' );
	$dp_default_options['archive_faq_image'] = false;
	$dp_default_options['archive_faq_num'] = '10';
	$dp_default_options['archive_faq_title_font_size'] = '28';
	$dp_default_options['archive_faq_sub_title_font_size'] = '16';
	$dp_default_options['archive_faq_title_font_size_mobile'] = '18';
	$dp_default_options['archive_faq_sub_title_font_size_mobile'] = '14';
	$dp_default_options['archive_faq_answer_color'] = '#f6f9f9';

	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_faq_tab_panel( $options ) {

  global $dp_default_options;

?>

<div id="tab-content-faq" class="tab-content">


   <?php // 基本設定 -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Basic setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Slug setting', 'tcd-w');  ?></h4>
     <div class="theme_option_message">
      <p><?php _e('Please enter word by alphabet only.<br />After changing slug, please update permalink setting form <a href="./options-permalink.php"><strong>permalink option page</strong></a>.', 'tcd-w'); ?></p>
     </div>
     <p><input id="dp_options[faq_slug]" class="hankaku regular-text" type="text" name="dp_options[faq_slug]" value="<?php echo sanitize_title( $options['faq_slug'] ); ?>" /></p>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // アーカイブページの設定 -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('FAQ setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <div class="theme_option_message no_arrow">
      <p><?php printf( __('FAQ page URL<br />%s', 'tcd-w'), esc_url(get_post_type_archive_link('faq')) ); ?></p>
     </div>
     <h4 class="theme_option_headline2"><?php _e('Title', 'tcd-w');  ?></h4>
     <input id="dp_options[archive_faq_title]" class="regular-text" type="text" name="dp_options[archive_faq_title]" value="<?php echo esc_attr( $options['archive_faq_title'] ); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Sub title', 'tcd-w');  ?></h4>
     <input id="dp_options[archive_faq_sub_title]" class="regular-text" type="text" name="dp_options[archive_faq_sub_title]" value="<?php echo esc_attr( $options['archive_faq_sub_title'] ); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Font size setting', 'tcd-w');  ?></h4>
     <p><?php _e('Title', 'tcd-w');  ?> <input id="dp_options[archive_faq_title_font_size]" class="font_size hankaku" type="text" name="dp_options[archive_faq_title_font_size]" value="<?php esc_attr_e( $options['archive_faq_title_font_size'] ); ?>" /><span>px</span></p>
     <p><?php _e('Sub title', 'tcd-w');  ?> <input id="dp_options[archive_faq_sub_title_font_size]" class="font_size hankaku" type="text" name="dp_options[archive_faq_sub_title_font_size]" value="<?php esc_attr_e( $options['archive_faq_sub_title_font_size'] ); ?>" /><span>px</span></p>
     <p><?php _e('Title for mobile device', 'tcd-w');  ?> <input id="dp_options[archive_faq_title_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[archive_faq_title_font_size_mobile]" value="<?php esc_attr_e( $options['archive_faq_title_font_size_mobile'] ); ?>" /><span>px</span></p>
     <p><?php _e('Sub title for mobile device', 'tcd-w');  ?> <input id="dp_options[archive_faq_sub_title_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[archive_faq_sub_title_font_size_mobile]" value="<?php esc_attr_e( $options['archive_faq_sub_title_font_size_mobile'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Image', 'tcd-w'); ?></h4>
     <p><?php _e( 'Recommend image size. Width:1450px, Height:440px', 'tcd-w' ); ?></p>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js archive_faq_image">
       <input type="hidden" value="<?php echo esc_attr( $options['archive_faq_image'] ); ?>" id="archive_faq_image" name="dp_options[archive_faq_image]" class="cf_media_id">
       <div class="preview_field"><?php if($options['archive_faq_image']){ echo wp_get_attachment_image($options['archive_faq_image'], 'medium'); }; ?></div>
       <div class="buttton_area">
        <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
        <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['archive_faq_image']){ echo 'hidden'; }; ?>">
       </div>
      </div>
     </div>
     <h4 class="theme_option_headline2"><?php _e('Catchphrase', 'tcd-w');  ?></h4>
     <textarea id="dp_options[archive_faq_headline]" class="large-text" cols="50" rows="2" name="dp_options[archive_faq_headline]"><?php echo esc_textarea( $options['archive_faq_headline'] ); ?></textarea>
     <h4 class="theme_option_headline2"><?php _e('Font size of catchphrase', 'tcd-w');  ?></h4>
     <p><input id="dp_options[archive_faq_headline_font_size]" class="font_size hankaku" type="text" name="dp_options[archive_faq_headline_font_size]" value="<?php esc_attr_e( $options['archive_faq_headline_font_size'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Description', 'tcd-w');  ?></h4>
     <textarea id="dp_options[archive_faq_desc]" class="large-text" cols="50" rows="4" name="dp_options[archive_faq_desc]"><?php echo esc_textarea( $options['archive_faq_desc'] ); ?></textarea>
     <h4 class="theme_option_headline2"><?php _e('Number of post to display', 'tcd-w');  ?></h4>
     <p><input id="dp_options[archive_faq_num]" class="font_size hankaku" type="text" name="dp_options[archive_faq_num]" value="<?php esc_attr_e( $options['archive_faq_num'] ); ?>" /></p>
     <h4 class="theme_option_headline2"><?php _e('Background color of answer area', 'tcd-w');  ?></h4>
     <input type="text" name="dp_options[archive_faq_answer_color]" value="<?php echo esc_attr( $options['archive_faq_answer_color'] ); ?>" data-default-color="#f6f9f9" class="c-color-picker">
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


</div><!-- END .tab-content -->

<?php
} // END add_faq_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_faq_theme_options_validate( $input ) {

  global $dp_default_options;


  //基本設定
  $input['faq_slug'] = sanitize_title( $input['faq_slug'] );


  //アーカイブの設定
  $input['archive_faq_title'] = wp_filter_nohtml_kses( $input['archive_faq_title'] );
  $input['archive_faq_sub_title'] = wp_filter_nohtml_kses( $input['archive_faq_sub_title'] );
  $input['archive_faq_image'] = wp_filter_nohtml_kses( $input['archive_faq_image'] );
  $input['archive_faq_headline'] = wp_filter_nohtml_kses( $input['archive_faq_headline'] );
  $input['archive_faq_headline_font_size'] = wp_filter_nohtml_kses( $input['archive_faq_headline_font_size'] );
  $input['archive_faq_desc'] = wp_filter_nohtml_kses( $input['archive_faq_desc'] );
  $input['archive_faq_num'] = wp_filter_nohtml_kses( $input['archive_faq_num'] );
  $input['archive_faq_title_font_size'] = wp_filter_nohtml_kses( $input['archive_faq_title_font_size'] );
  $input['archive_faq_sub_title_font_size'] = wp_filter_nohtml_kses( $input['archive_faq_sub_title_font_size'] );
  $input['archive_faq_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_faq_title_font_size_mobile'] );
  $input['archive_faq_sub_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_faq_sub_title_font_size_mobile'] );
  $input['archive_faq_answer_color'] = wp_filter_nohtml_kses( $input['archive_faq_answer_color'] );


	return $input;

};


?>