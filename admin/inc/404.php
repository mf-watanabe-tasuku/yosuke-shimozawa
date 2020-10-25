<?php
/*
 * 404設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_404_dp_default_options' );


// Add label of basic tab
add_action( 'tcd_tab_labels', 'add_404_tab_label' );


// Add HTML of basic tab
add_action( 'tcd_tab_panel', 'add_404_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_404_theme_options_validate' );


// タブの名前
function add_404_tab_label( $tab_labels ) {
	$tab_labels['404'] = __( '404 page', 'tcd-w' );
	return $tab_labels;
}


// 初期値
function add_404_dp_default_options( $dp_default_options ) {

	// 404 ページ
	$dp_default_options['header_image_404'] = '';
	$dp_default_options['header_txt_404'] = '';
	$dp_default_options['header_sub_txt_404'] = '';
	$dp_default_options['header_txt_size_404'] = 38;
	$dp_default_options['header_sub_txt_size_404'] = 16;
	$dp_default_options['header_txt_size_404_mobile'] = 28;
	$dp_default_options['header_sub_txt_size_404_mobile'] = 14;
	$dp_default_options['header_txt_color_404'] = '#FFFFFF';
	$dp_default_options['dropshadow_404_h'] = 2;
	$dp_default_options['dropshadow_404_v'] = 2;
	$dp_default_options['dropshadow_404_b'] = 2;
	$dp_default_options['dropshadow_404_c'] = '#888888';
	$dp_default_options['font_type_404'] = 'type1';

	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_404_tab_panel( $options ) {

  global $dp_default_options,  $font_type_options;

?>

<div id="tab-content-basic" class="tab-content">


   <?php // 404 ページ ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e( 'Settings for 404 page', 'tcd-w' ); ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e( 'Header image', 'tcd-w' ); ?></h4>
     <p><?php _e( 'Recommend image size. Width:1150px, Height:650px', 'tcd-w' ); ?></p>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js header_image_404">
       <input type="hidden" value="<?php echo esc_attr( $options['header_image_404'] ); ?>" id="header_image_404" name="dp_options[header_image_404]" class="cf_media_id">
       <div class="preview_field"><?php if ( $options['header_image_404'] ) { echo wp_get_attachment_image( $options['header_image_404'], 'medium' ); } ?></div>
       <div class="button_area">
        <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
        <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $options['header_image_404'] ) { echo 'hidden'; } ?>">
       </div>
      </div>
     </div>
     <h4 class="theme_option_headline2"><?php _e( 'Headline', 'tcd-w' ); ?></h4>
     <textarea id="dp_options[header_txt_404]" class="large-text" cols="50" rows="2" name="dp_options[header_txt_404]"><?php echo esc_textarea( $options['header_txt_404'] ); ?></textarea>
     <h4 class="theme_option_headline2"><?php _e( 'Font size of headline', 'tcd-w' ); ?></h4>
     <p><input id="dp_options[header_txt_size_404]" class="font_size hankaku" type="text" name="dp_options[header_txt_size_404]" value="<?php echo esc_attr( $options['header_txt_size_404'] ); ?>"><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e( 'Font size of headline for mobile device', 'tcd-w' ); ?></h4>
     <p><input id="dp_options[header_txt_size_404_mobile]" class="font_size hankaku" type="text" name="dp_options[header_txt_size_404_mobile]" value="<?php echo esc_attr( $options['header_txt_size_404_mobile'] ); ?>"><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e( 'Font type', 'tcd-w' ); ?></h4>
     <fieldset class="cf select_type2">
      <?php
           if ( ! isset( $checked ) )
           $checked = '';
           foreach ( $font_type_options as $option ) {
           $font_type_setting = $options['font_type_404'];
             if ( '' != $font_type_setting ) {
               if ( $options['font_type_404'] == $option['value'] ) {
                 $checked = "checked=\"checked\"";
               } else {
                 $checked = '';
               }
            }
      ?>
      <label class="description">
       <input type="radio" name="dp_options[font_type_404]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
       <?php echo $option['label']; ?>
      </label>
      <?php } ?>
     </fieldset>
     <h4 class="theme_option_headline2"><?php _e( 'Font color of headline', 'tcd-w' ); ?></h4>
     <input type="text" name="dp_options[header_txt_color_404]" value="<?php echo esc_attr( $options['header_txt_color_404'] ); ?>" data-default-color="#FFFFFF" class="c-color-picker">
     <h4 class="theme_option_headline2"><?php _e( 'Dropshadow of headline', 'tcd-w' ); ?></h4>
     <p><?php _e( 'Enter "0" if you don\'t want to use dropshadow.', 'tcd-w' ); ?></p>
     <ul class="headline_option">
      <li><label><?php _e( 'Dropshadow position (left)', 'tcd-w'); ?></label><input id="dp_options[dropshadow_404_h]" class="font_size hankaku" type="text" name="dp_options[dropshadow_404_h]" value="<?php echo esc_attr( $options['dropshadow_404_h'] ); ?>"><span>px</span></li>
      <li><label><?php _e( 'Dropshadow position (top)', 'tcd-w'); ?></label><input id="dp_options[dropshadow_404_v]" class="font_size hankaku" type="text" name="dp_options[dropshadow_404_v]" value="<?php echo esc_attr( $options['dropshadow_404_v'] ); ?>"><span>px</span></li>
      <li><label><?php _e( 'Dropshadow size', 'tcd-w' ); ?></label><input id="dp_options[dropshadow_404_b]" class="font_size hankaku" type="text" name="dp_options[dropshadow_404_b]" value="<?php echo esc_attr( $options['dropshadow_404_b'] ); ?>"><span>px</span></li>
      <li><label><?php _e( 'Dropshadow color', 'tcd-w' ); ?></label><input type="text" name="dp_options[dropshadow_404_c]" value="<?php echo esc_attr( $options['dropshadow_404_c'] ); ?>" data-default-color="#FFFFFF" class="c-color-picker"></li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e( 'Sub title', 'tcd-w' ); ?></h4>
     <textarea id="dp_options[header_sub_txt_404]" class="large-text" cols="50" rows="2" name="dp_options[header_sub_txt_404]"><?php echo esc_textarea( $options['header_sub_txt_404'] ); ?></textarea>
     <h4 class="theme_option_headline2"><?php _e( 'Font size of sub title', 'tcd-w' ); ?></h4>
     <p><input id="dp_options[header_sub_txt_size_404]" class="font_size hankaku" type="text" name="dp_options[header_sub_txt_size_404]" value="<?php echo esc_attr( $options['header_sub_txt_size_404'] ); ?>"><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e( 'Font size of sub title for mobile device', 'tcd-w' ); ?></h4>
     <p><input id="dp_options[header_sub_txt_size_404_mobile]" class="font_size hankaku" type="text" name="dp_options[header_sub_txt_size_404_mobile]" value="<?php echo esc_attr( $options['header_sub_txt_size_404_mobile'] ); ?>"><span>px</span></p>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


</div><!-- END .tab-content -->

<?php
} // END add_basic_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_404_theme_options_validate( $input ) {

  global $dp_default_options,  $font_type_options;


  // 404 ページ
  $input['header_image_404'] = wp_filter_nohtml_kses( $input['header_image_404'] );
  $input['header_txt_404'] = wp_filter_nohtml_kses( $input['header_txt_404'] );
  $input['header_sub_txt_404'] = wp_filter_nohtml_kses( $input['header_sub_txt_404'] );
  $input['header_txt_size_404'] = wp_filter_nohtml_kses( $input['header_txt_size_404'] );
  $input['header_sub_txt_size_404'] = wp_filter_nohtml_kses( $input['header_sub_txt_size_404'] );
  $input['header_txt_size_404_mobile'] = wp_filter_nohtml_kses( $input['header_txt_size_404_mobile'] );
  $input['header_sub_txt_size_404_mobile'] = wp_filter_nohtml_kses( $input['header_sub_txt_size_404_mobile'] );
  $input['header_txt_color_404'] = wp_filter_nohtml_kses( $input['header_txt_color_404'] );
  $input['dropshadow_404_h'] = wp_filter_nohtml_kses( $input['dropshadow_404_h'] );
  $input['dropshadow_404_v'] = wp_filter_nohtml_kses( $input['dropshadow_404_v'] );
  $input['dropshadow_404_b'] = wp_filter_nohtml_kses( $input['dropshadow_404_b'] );
  $input['dropshadow_404_c'] = wp_filter_nohtml_kses( $input['dropshadow_404_c'] );
  $input['font_type_404'] = wp_filter_nohtml_kses( $input['font_type_404'] );


	return $input;

};


?>