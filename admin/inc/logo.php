<?php
/*
 * ロゴの設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_logo_dp_default_options' );


// Add label of logo tab
add_action( 'tcd_tab_labels', 'add_logo_tab_label' );


// Add HTML of logo tab
add_action( 'tcd_tab_panel', 'add_logo_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_logo_theme_options_validate' );


// タブの名前
function add_logo_tab_label( $tab_labels ) {
	$tab_labels['logo'] = __( 'Logo', 'tcd-w' );
	return $tab_labels;
}


// 初期値
function add_logo_dp_default_options( $dp_default_options ) {

	$dp_default_options['use_logo_image'] = 'no';
	$dp_default_options['logo_font_size'] = 31;
	$dp_default_options['logo_font_size_mobile'] = 18;
	$dp_default_options['header_logo_image'] = '';
	$dp_default_options['header_logo_image_mobile'] = '';
	$dp_default_options['header_logo_retina'] = '';
	$dp_default_options['header_logo_retina_mobile'] = '';

	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_logo_tab_panel( $options ) {

  global $dp_default_options, $logo_type_options;

?>

<div id="tab-content-logo" class="tab-content">


   <?php // ロゴのタイプ ----------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Logo type', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <fieldset class="cf select_type2" id="logo_type_select">
      <?php
           if ( ! isset( $checked ) )
           $checked = '';
           foreach ( $logo_type_options as $option ) {
           $logo_type_setting = $options['use_logo_image'];
             if ( '' != $logo_type_setting ) {
               if ( $options['use_logo_image'] == $option['value'] ) {
                 $checked = "checked=\"checked\"";
               } else {
                 $checked = '';
               }
            }
      ?>
      <label id="use_logo_image_<?php echo esc_attr_e( $option['value'] ); ?>">
       <input type="radio" name="dp_options[use_logo_image]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
       <?php echo $option['label']; ?>
      </label>
      <?php } ?>
     </fieldset>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // ヘッダーのロゴ ----------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Header logo', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <div class="logo_text_area" style="<?php if( $options['use_logo_image'] != 'yes' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e('Font size for text logo', 'tcd-w');  ?></h4>
      <input id="dp_options[logo_font_size]" class="font_size hankaku" type="text" name="dp_options[logo_font_size]" value="<?php esc_attr_e( $options['logo_font_size'] ); ?>" /><span>px</span>
     </div>
     <div class="logo_image_area" style="<?php if( $options['use_logo_image'] == 'yes' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e('Image for logo', 'tcd-w');  ?></h4>
      <p><?php _e('If the image is not registered, text will be displayed instead.','tcd-w'); ?></p>
      <p><?php _e('Recommend image size. Width:300px Height:120px (maximum height:140px)', 'tcd-w'); ?></p>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js header_logo_image">
        <input type="hidden" value="<?php echo esc_attr( $options['header_logo_image'] ); ?>" id="header_logo_image" name="dp_options[header_logo_image]" class="cf_media_id">
        <div class="preview_field"><?php if($options['header_logo_image']){ echo wp_get_attachment_image($options['header_logo_image'], 'full'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['header_logo_image']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
      <h4 class="theme_option_headline2"><?php _e('Option for Retina display', 'tcd-w');  ?></h4>
      <p><?php _e('If you upload a logo image for retina display, please check the following check boxes','tcd-w'); ?></p>
      <p><label><input id="dp_options[header_logo_retina]" name="dp_options[header_logo_retina]" type="checkbox" value="1" <?php checked( '1', $options['header_logo_retina'] ); ?> /> <?php _e('Use retina display logo image', 'tcd-w');  ?></label></p>
     </div>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // ヘッダーのロゴ（モバイル用） ----------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Header logo for mobile device', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <div class="logo_text_area" style="<?php if( $options['use_logo_image'] != 'yes' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e('Font size for text logo', 'tcd-w');  ?></h4>
      <input id="dp_options[logo_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[logo_font_size_mobile]" value="<?php esc_attr_e( $options['logo_font_size_mobile'] ); ?>" /><span>px</span>
     </div>
     <div class="logo_image_area" style="<?php if( $options['use_logo_image'] == 'yes' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e('Image for logo', 'tcd-w');  ?></h4>
      <p><?php _e('If the image is not registered, text will be displayed instead.','tcd-w'); ?></p>
      <p><?php _e('Recommend image size. Width:240px Height:40px (maximum height:50px)', 'tcd-w'); ?></p>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js header_logo_image_mobile">
        <input type="hidden" value="<?php echo esc_attr( $options['header_logo_image_mobile'] ); ?>" id="header_logo_image_mobile" name="dp_options[header_logo_image_mobile]" class="cf_media_id">
        <div class="preview_field"><?php if($options['header_logo_image_mobile']){ echo wp_get_attachment_image($options['header_logo_image_mobile'], 'full'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['header_logo_image_mobile']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
      <h4 class="theme_option_headline2"><?php _e('Option for Retina display', 'tcd-w');  ?></h4>
      <p><label><input id="dp_options[header_logo_retina_mobile]" name="dp_options[header_logo_retina_mobile]" type="checkbox" value="1" <?php checked( '1', $options['header_logo_retina_mobile'] ); ?> /> <?php _e('Use retina display logo image', 'tcd-w');  ?></label></p>
     </div>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


</div><!-- END .tab-content -->

<?php
} // END add_logo_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_logo_theme_options_validate( $input ) {

  global $dp_default_options, $logo_type_options;


  $input['logo_font_size'] = wp_filter_nohtml_kses( $input['logo_font_size'] );

  $input['header_logo_image'] = wp_filter_nohtml_kses( $input['header_logo_image'] );

  $input['header_logo_image_mobile'] = wp_filter_nohtml_kses( $input['header_logo_image_mobile'] );

  if ( ! isset( $input['header_logo_retina'] ) )
    $input['header_logo_retina'] = null;
    $input['header_logo_retina'] = ( $input['header_logo_retina'] == 1 ? 1 : 0 );

  if ( ! isset( $input['header_logo_retina_mobile'] ) )
    $input['header_logo_retina_mobile'] = null;
    $input['header_logo_retina_mobile'] = ( $input['header_logo_retina_mobile'] == 1 ? 1 : 0 );

  if ( ! isset( $input['use_logo_image'] ) )
    $input['use_logo_image'] = null;
  if ( ! array_key_exists( $input['use_logo_image'], $logo_type_options ) )
    $input['use_logo_image'] = null;


	return $input;

};


?>