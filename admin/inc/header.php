<?php
/*
 * ヘッダーの設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_header_dp_default_options' );


// Add label of logo tab
add_action( 'tcd_tab_labels', 'add_header_tab_label' );


// Add HTML of logo tab
add_action( 'tcd_tab_panel', 'add_header_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_header_theme_options_validate' );


// タブの名前
function add_header_tab_label( $tab_labels ) {
	$tab_labels['header'] = __( 'Header', 'tcd-w' );
	return $tab_labels;
}


// 初期値
function add_header_dp_default_options( $dp_default_options ) {

	$dp_default_options['header_fix'] = 'type1';
	$dp_default_options['mobile_header_fix'] = 'type1';

	$dp_default_options['show_header_button'] = 0;
	$dp_default_options['header_button_label'] = '';
	$dp_default_options['header_button_url'] = '';
	$dp_default_options['header_button_target'] = 0;
	$dp_default_options['header_button_bg_color'] = '#b0cfd2';
	$dp_default_options['header_button_bg_hover_color'] = '#6698a1';
	$dp_default_options['header_button_text_color'] = '#FFFFFF';
	$dp_default_options['header_button_text_hover_color'] = '#FFFFFF';

	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_header_tab_panel( $options ) {

  global $dp_default_options, $header_fix_options;

?>

<div id="tab-content-header" class="tab-content">


   <?php // ヘッダーの固定設定 ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Header position', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <fieldset class="cf select_type2">
      <?php
           if ( ! isset( $checked ) )
           $checked = '';
           foreach ( $header_fix_options as $option ) {
           $header_fix_setting = $options['header_fix'];
             if ( '' != $header_fix_setting ) {
               if ( $options['header_fix'] == $option['value'] ) {
                 $checked = "checked=\"checked\"";
               } else {
                 $checked = '';
               }
            }
      ?>
      <label class="description">
       <input type="radio" name="dp_options[header_fix]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
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


   <?php // スマホヘッダーの固定設定 ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Header position for mobile device', 'tcd-w'); ?></h3>
    <div class="theme_option_field_ac_content">
     <fieldset class="cf select_type2">
      <?php
           if ( ! isset( $checked ) )
           $checked = '';
           foreach ( $header_fix_options as $option ) {
           $header_fix_setting = $options['mobile_header_fix'];
             if ( '' != $header_fix_setting ) {
               if ( $options['mobile_header_fix'] == $option['value'] ) {
                 $checked = "checked=\"checked\"";
               } else {
                 $checked = '';
               }
            }
      ?>
      <label class="description">
       <input type="radio" name="dp_options[mobile_header_fix]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
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


   <?php // ヘッダーボタンの設定 -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Header button setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <div class="theme_option_message no_arrow">
      <p><?php _e('You can display a link button at the right end of the header. It is not displayed on smartphones and tablets.', 'tcd-w'); ?></p>
     </div>
     <p><label><input id="dp_options[show_header_button]" name="dp_options[show_header_button]" type="checkbox" value="1" <?php checked( '1', $options['show_header_button'] ); ?> /> <?php _e('Display header button', 'tcd-w');  ?></label></p>
     <h4 class="theme_option_headline2"><?php _e('Button label', 'tcd-w');  ?></h4>
     <input id="dp_options[header_button_label]" class="regular-text" type="text" name="dp_options[header_button_label]" value="<?php echo esc_attr( $options['header_button_label'] ); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Button link URL', 'tcd-w');  ?></h4>
     <p><input id="dp_options[header_button_url]" class="regular-text" type="text" name="dp_options[header_button_url]" value="<?php echo esc_attr( $options['header_button_url'] ); ?>" /></p>
     <p><label><input id="dp_options[header_button_target]" name="dp_options[header_button_target]" type="checkbox" value="1" <?php checked( '1', $options['header_button_target'] ); ?> /> <?php _e('Open link in new window', 'tcd-w');  ?></label></p>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


</div><!-- END .tab-content -->

<?php
} // END add_header_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_header_theme_options_validate( $input ) {

  global $dp_default_options, $header_fix_options;


  $input['header_fix'] = wp_filter_nohtml_kses( $input['header_fix'] );
  $input['mobile_header_fix'] = wp_filter_nohtml_kses( $input['mobile_header_fix'] );

  if ( ! isset( $input['show_header_button'] ) )
    $input['show_header_button'] = null;
    $input['show_header_button'] = ( $input['show_header_button'] == 1 ? 1 : 0 );
  $input['header_button_url'] = wp_filter_nohtml_kses( $input['header_button_url'] );
  if ( ! isset( $input['header_button_target'] ) )
    $input['header_button_target'] = null;
    $input['header_button_target'] = ( $input['header_button_target'] == 1 ? 1 : 0 );
  $input['header_button_label'] = wp_filter_nohtml_kses( $input['header_button_label'] );
  $input['header_button_bg_color'] = wp_filter_nohtml_kses( $input['header_button_bg_color'] );
  $input['header_button_bg_hover_color'] = wp_filter_nohtml_kses( $input['header_button_bg_hover_color'] );
  $input['header_button_text_color'] = wp_filter_nohtml_kses( $input['header_button_text_color'] );
  $input['header_button_text_hover_color'] = wp_filter_nohtml_kses( $input['header_button_text_hover_color'] );


	return $input;

};


?>