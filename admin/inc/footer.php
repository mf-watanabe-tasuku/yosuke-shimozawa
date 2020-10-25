<?php
/*
 * フッターの設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_footer_dp_default_options' );


// Add label of logo tab
add_action( 'tcd_tab_labels', 'add_footer_tab_label' );


// Add HTML of logo tab
add_action( 'tcd_tab_panel', 'add_footer_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_footer_theme_options_validate' );


// タブの名前
function add_footer_tab_label( $tab_labels ) {
	$tab_labels['footer'] = __( 'Footer', 'tcd-w' );
	return $tab_labels;
}


// 初期値
function add_footer_dp_default_options( $dp_default_options ) {

	$dp_default_options['copyright'] = 'Copyright &copy; 2018';
	$dp_default_options['copyright_bg_color'] = '#65989f';
	$dp_default_options['copyright_text_color'] = '#FFFFFF';

	$dp_default_options['footer_contact_area_display_type'] = 'type1';

	$dp_default_options['show_footer_tel'] = 1;
	$dp_default_options['footer_tel_headline'] = __( 'Telephone area headline', 'tcd-w' );
	$dp_default_options['footer_tel_number'] = '060-123-4567';
	$dp_default_options['footer_tel_number_font_type'] = 'type3';
	$dp_default_options['footer_tel_time'] = __( 'Reception time / AM 8:00 - 13:00 PM 14:30 - 18:30', 'tcd-w' );
	$dp_default_options['show_footer_contact'] = 1;
	$dp_default_options['footer_contact_headline'] = __( 'Contact area headline', 'tcd-w' );
	$dp_default_options['footer_contact_button_label'] = __( 'Sample button', 'tcd-w' );
	$dp_default_options['footer_contact_url'] = '#';
	$dp_default_options['footer_contact_target'] = 0;

	for ( $i = 1; $i <= 3; $i++ ) {
		$dp_default_options['footer_content_image' . $i] = false;
		$dp_default_options['footer_content_title' . $i] = sprintf( __( 'Footer content %s', 'tcd-w' ), $i );
		$dp_default_options['footer_content_url' . $i] = '#';
		$dp_default_options['footer_content_target' . $i] = '';
	}
	$dp_default_options['show_footer_content'] = 1;
	$dp_default_options['footer_content_bg_color'] = '#f1f5f0';

	// フッターの固定メニュー
	$dp_default_options['footer_bar_display'] = 'type3';
	$dp_default_options['footer_bar_tp'] = 0.8;
	$dp_default_options['footer_bar_bg'] = '#FFFFFF';
	$dp_default_options['footer_bar_border'] = '#DDDDDD';
	$dp_default_options['footer_bar_color'] = '#000000';
	$dp_default_options['footer_bar_btns'] = array(
		array(
			'type' => 'type1',
			'label' => '',
			'url' => '',
			'number' => '',
			'target' => 0,
			'icon' => 'file-text'
		)
	);

	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_footer_tab_panel( $options ) {

  global $dp_default_options, $footer_bar_display_options, $footer_bar_button_options, $footer_bar_icon_options, $fixed_footer_content_type_options, $fixed_footer_sub_content_type_options, $footer_contact_area_options, $font_type_options;

?>

<div id="tab-content-footer" class="tab-content">


   <?php // 電話番号の設定 ------------------------------------------------------------ ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Telephone and contact area setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
     <fieldset class="cf select_type2" style="margin-bottom:20px;">
      <?php
           if ( ! isset( $checked ) )
           $checked = '';
           foreach ( $footer_contact_area_options as $option ) {
           $footer_contact_area_display_type_setting = $options['footer_contact_area_display_type'];
             if ( '' != $footer_contact_area_display_type_setting ) {
               if ( $options['footer_contact_area_display_type'] == $option['value'] ) {
                 $checked = "checked=\"checked\"";
               } else {
                 $checked = '';
               }
            }
      ?>
      <label class="description">
       <input type="radio" name="dp_options[footer_contact_area_display_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
       <?php echo $option['label']; ?>
      </label>
      <?php } ?>
     </fieldset>
     <div class="sub_box cf"> 
      <h3 class="theme_option_subbox_headline"><?php _e('Telephone area setting', 'tcd-w');  ?></h3>
      <div class="sub_box_content">
       <p><label><input id="dp_options[show_footer_tel]" name="dp_options[show_footer_tel]" type="checkbox" value="1" <?php checked( '1', $options['show_footer_tel'] ); ?> /> <?php _e('Display telephone area', 'tcd-w');  ?></label></p>
       <h4 class="theme_option_headline2"><?php _e('Telephone area headline', 'tcd-w');  ?></h4>
       <textarea id="dp_options[footer_tel_headline]" class="large-text" cols="50" rows="2" name="dp_options[footer_tel_headline]"><?php echo esc_textarea( $options['footer_tel_headline'] ); ?></textarea>
       <h4 class="theme_option_headline2"><?php _e('Telephone number', 'tcd-w');  ?></h4>
       <p><input id="dp_options[footer_tel_number]" class="regular-text" type="text" name="dp_options[footer_tel_number]" value="<?php echo esc_attr( $options['footer_tel_number'] ); ?>" /></p>
       <h4 class="theme_option_headline2"><?php _e('Font type of telephone number', 'tcd-w');  ?></h4>
       <fieldset class="cf select_type2">
        <?php
             if ( ! isset( $checked ) )
             $checked = '';
             foreach ( $font_type_options as $option ) {
             $font_type_setting = $options['footer_tel_number_font_type'];
               if ( '' != $font_type_setting ) {
                 if ( $options['footer_tel_number_font_type'] == $option['value'] ) {
                   $checked = "checked=\"checked\"";
                 } else {
                   $checked = '';
                 }
              }
        ?>
        <label class="description">
         <input type="radio" name="dp_options[footer_tel_number_font_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
         <?php echo $option['label']; ?>
        </label>
        <?php } ?>
       </fieldset>
       <h4 class="theme_option_headline2"><?php _e('Telephone time', 'tcd-w');  ?></h4>
       <textarea id="dp_options[footer_tel_time]" class="large-text" cols="50" rows="2" name="dp_options[footer_tel_time]"><?php echo esc_textarea( $options['footer_tel_time'] ); ?></textarea>
       <ul class="button_list cf">
        <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
       </ul>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
     <div class="sub_box cf"> 
      <h3 class="theme_option_subbox_headline"><?php _e('Contact area setting', 'tcd-w');  ?></h3>
      <div class="sub_box_content">
       <p><label><input id="dp_options[show_footer_contact]" name="dp_options[show_footer_contact]" type="checkbox" value="1" <?php checked( '1', $options['show_footer_contact'] ); ?> /> <?php _e('Display contact area', 'tcd-w');  ?></label></p>
       <h4 class="theme_option_headline2"><?php _e('Contact area headline', 'tcd-w');  ?></h4>
       <textarea id="dp_options[footer_contact_headline]" class="large-text" cols="50" rows="2" name="dp_options[footer_contact_headline]"><?php echo esc_textarea( $options['footer_contact_headline'] ); ?></textarea>
       <h4 class="theme_option_headline2"><?php _e('Contact button label', 'tcd-w');  ?></h4>
       <p><input id="dp_options[footer_contact_button_label]" class="regular-text" type="text" name="dp_options[footer_contact_button_label]" value="<?php echo esc_attr( $options['footer_contact_button_label'] ); ?>" /></p>
       <h4 class="theme_option_headline2"><?php _e('Contact page URL', 'tcd-w');  ?></h4>
       <p><input id="dp_options[footer_contact_url]" class="regular-text" type="text" name="dp_options[footer_contact_url]" value="<?php echo esc_attr( $options['footer_contact_url'] ); ?>" /></p>
       <p><label><input id="dp_options[footer_contact_target]" name="dp_options[footer_contact_target]" type="checkbox" value="1" <?php checked( '1', $options['footer_contact_target'] ); ?> /> <?php _e('Open link in new window', 'tcd-w');  ?></label></p>
       <ul class="button_list cf">
        <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
       </ul>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // フッターコンテンツの設定 -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Footer content setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><label><input id="dp_options[show_footer_content]" name="dp_options[show_footer_content]" type="checkbox" value="1" <?php checked( '1', $options['show_footer_content'] ); ?> /> <?php _e('Display footer content', 'tcd-w');  ?></label></p>
     <?php for($i = 1; $i <= 3; $i++) : ?>
     <div class="sub_box cf"> 
      <h3 class="theme_option_subbox_headline"><?php printf(__('Content%s', 'tcd-w'),$i);  ?></h3>
      <div class="sub_box_content">
       <h4 class="theme_option_headline2"><?php _e('Title', 'tcd-w');  ?></h4>
       <textarea id="dp_options[footer_content_title<?php echo $i; ?>]" class="large-text" cols="50" rows="2" name="dp_options[footer_content_title<?php echo $i; ?>]"><?php echo esc_textarea( $options['footer_content_title'.$i] ); ?></textarea>
       <h4 class="theme_option_headline2"><?php _e('Image', 'tcd-w'); ?></h4>
       <p><?php _e( 'Recommend image size. Width:130px, Height:130px', 'tcd-w' ); ?></p>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js footer_content_image<?php echo $i; ?>">
         <input type="hidden" value="<?php echo esc_attr( $options['footer_content_image'.$i] ); ?>" id="footer_content_image<?php echo $i; ?>" name="dp_options[footer_content_image<?php echo $i; ?>]" class="cf_media_id">
         <div class="preview_field"><?php if($options['footer_content_image'.$i]){ echo wp_get_attachment_image($options['footer_content_image'.$i], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['footer_content_image'.$i]){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Link url', 'tcd-w');  ?></h4>
       <input id="dp_options[footer_content_url<?php echo $i; ?>]" class="regular-text" type="text" name="dp_options[footer_content_url<?php echo $i; ?>]" value="<?php echo esc_attr( $options['footer_content_url'.$i] ); ?>" />
       <p><label><input id="dp_options[footer_content_target<?php echo $i; ?>]" name="dp_options[footer_content_target<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( '1', $options['footer_content_target'.$i] ); ?> /> <?php _e('Open link in new window', 'tcd-w');  ?></label></p>
       <ul class="button_list cf">
        <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
       </ul>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
     <?php endfor; ?>
     <h4 class="theme_option_headline2"><?php _e('Background color', 'tcd-w');  ?></h4>
     <input type="text" name="dp_options[footer_content_bg_color]" value="<?php echo esc_attr( $options['footer_content_bg_color'] ); ?>" data-default-color="#f1f5f0" class="c-color-picker">
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // コピーライトの設定 ------------------------------------------------------------ ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Copyright setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Copyright', 'tcd-w');  ?></h4>
     <textarea id="dp_options[copyright]" class="large-text" cols="50" rows="2" name="dp_options[copyright]"><?php echo esc_textarea($options['copyright']); ?></textarea>
     <h4 class="theme_option_headline2"><?php _e('Background color', 'tcd-w');  ?></h4>
     <input type="text" name="dp_options[copyright_bg_color]" value="<?php echo esc_attr( $options['copyright_bg_color'] ); ?>" data-default-color="#65989f" class="c-color-picker">
     <h4 class="theme_option_headline2"><?php _e('Text color', 'tcd-w');  ?></h4>
     <input type="text" name="dp_options[copyright_text_color]" value="<?php echo esc_attr( $options['copyright_text_color'] ); ?>" data-default-color="#FFFFFF" class="c-color-picker">
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // フッターバーの設定 ?>
   <div class="theme_option_field cf theme_option_field_ac" id="footer_bar_setting_area">
    <h3 class="theme_option_headline"><?php _e( 'Setting of the footer bar for smart phone', 'tcd-w' ); ?></h3>
    <div class="theme_option_field_ac_content">
     <p><?php _e( 'Please set the footer bar which is displayed with smart phone.', 'tcd-w' ); ?>
     <h4 class="theme_option_headline2"><?php _e('Display type of the footer bar', 'tcd-w'); ?></h4>
     <fieldset class="cf select_type2">
      <?php
           if ( ! isset( $checked ) )
           $checked = '';
           foreach ( $footer_bar_display_options as $option ) {
           $footer_bar_display_setting = $options['footer_bar_display'];
             if ( '' != $footer_bar_display_setting ) {
               if ( $options['footer_bar_display'] == $option['value'] ) {
                 $checked = "checked=\"checked\"";
               } else {
                 $checked = '';
               }
            }
      ?>
      <label class="description">
       <input type="radio" name="dp_options[footer_bar_display]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
       <?php echo $option['label']; ?>
      </label>
      <?php } ?>
     </fieldset>
     <h4 class="theme_option_headline2"><?php _e('Settings for the appearance of the footer bar', 'tcd-w'); ?></h4>
     <p>
      <?php _e('Background color', 'tcd-w'); ?>
      <input type="text" name="dp_options[footer_bar_bg]" value="<?php echo esc_attr( $options['footer_bar_bg'] ); ?>" data-default-color="#FFFFFF" class="c-color-picker">
     </p>
     <p>
      <?php _e('Border color', 'tcd-w'); ?>
      <input type="text" name="dp_options[footer_bar_border]" value="<?php echo esc_attr( $options['footer_bar_border'] ); ?>" data-default-color="#DDDDDD" class="c-color-picker">
     </p>
     <p>
      <?php _e('Font color', 'tcd-w'); ?>
      <input type="text" name="dp_options[footer_bar_color]" value="<?php echo esc_attr( $options['footer_bar_color'] ); ?>" data-default-color="#000000" class="c-color-picker">
     </p>
     <p>
      <?php _e('Opacity of background', 'tcd-w'); ?>
      <input id="dp_options[footer_bar_tp]" class="font_size hankaku" type="text" name="dp_options[footer_bar_tp]" value="<?php echo esc_attr( $options['footer_bar_tp'] ); ?>" /><br>
      <?php _e('Please enter the number 0 - 1.0. (e.g. 0.8)', 'tcd-w'); ?>
     </p>
     <h4 class="theme_option_headline2"><?php _e('Settings for the contents of the footer bar', 'tcd-w'); ?></h4>
    	<p><?php _e( 'You can display the button with icon in footer bar. (We recommend you to set max 4 buttons.)', 'tcd-w' ); ?><br><?php _e( 'You can select button types below.', 'tcd-w' ); ?></p>
     <table class="table-border">
      <tr>
       <th><?php _e( 'Default', 'tcd-w' ); ?></th>
       <td><?php _e( 'You can set link URL.', 'tcd-w' ); ?></td>
      </tr>
      <tr>
       <th><?php _e( 'Share', 'tcd-w' ); ?></th>
       <td><?php _e( 'Share buttons are displayed if you tap this button.', 'tcd-w' ); ?></td>
      </tr>
      <tr>
       <th><?php _e( 'Telephone', 'tcd-w' ); ?></th>
       <td><?php _e( 'You can call this number.', 'tcd-w' ); ?></td>
      </tr>
     </table>
     <p><?php _e( 'Click "Add item", and set the button for footer bar. You can drag the item to change their order.', 'tcd-w' ); ?></p>
     <div class="repeater-wrapper">
      <div class="repeater sortable" data-delete-confirm="<?php _e( 'Delete?', 'tcd-w' ); ?>">
<?php
    if ( $options['footer_bar_btns'] ) :
      foreach ( $options['footer_bar_btns'] as $key => $value ) :  
?>
      <div class="sub_box repeater-item repeater-item-<?php echo esc_attr( $key ); ?>">
       <h4 class="theme_option_subbox_headline"><?php echo esc_attr( $value['label'] ); ?></h4>
       <div class="sub_box_content">
        <p class="footer-bar-target" style="<?php if ( $value['type'] !== 'type1' ) { echo 'display: none;'; } ?>"><label><input name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][target]" type="checkbox" value="1" <?php checked( $value['target'], 1 ); ?>><?php _e( 'Open with new window', 'tcd-w' ); ?></label></p>
        <table class="table-repeater">
         <tr class="footer-bar-type">
          <th><label><?php _e( 'Button type', 'tcd-w' ); ?></label></th>
          <td>
           <select name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][type]">
            <?php foreach( $footer_bar_button_options as $option ) : ?>
            <option value="<?php echo esc_attr( $option['value'] ); ?>" <?php selected( $value['type'], $option['value'] ); ?>><?php esc_html_e( $option['label'], 'tcd-w' ); ?></option>
            <?php endforeach; ?>
           </select>
          </td>
         </tr>
         <tr>
          <th><label for="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_label]"><?php _e( 'Button label', 'tcd-w' ); ?></label></th>
          <td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_label]" class="large-text repeater-label" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][label]" value="<?php echo esc_attr( $value['label'] ); ?>"></td>
         </tr>
         <tr class="footer-bar-url" style="<?php if ( $value['type'] !== 'type1' ) { echo 'display: none;'; } ?>">
          <th><label for="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_url]"><?php _e( 'Link URL', 'tcd-w' ); ?></label></th>
          <td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_url]" class="large-text" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][url]" value="<?php echo esc_attr( $value['url'] ); ?>"></td>
         </tr>
         <tr class="footer-bar-number" style="<?php if ( $value['type'] !== 'type3' ) { echo 'display: none;'; } ?>">
          <th><label for="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_number]"><?php _e( 'Phone number', 'tcd-w' ); ?></label></th>
          <td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_number]" class="large-text" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][number]" value="<?php echo esc_attr( $value['number'] ); ?>"></td>
         </tr>
         <tr>
          <th><?php _e( 'Button icon', 'tcd-w' ); ?></th>
          <td>
           <?php foreach( $footer_bar_icon_options as $option ) : ?>
           <p><label><input type="radio" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][icon]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $option['value'], $value['icon'] ); ?>><span class="icon icon-<?php echo esc_attr( $option['value'] ); ?>"></span><?php esc_html_e( $option['label'], 'tcd-w' ); ?></label></p>
           <?php endforeach; ?>
          </td>
         </tr>
        </table>
        <p class="delete-row right-align"><a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a></p>
       </div>
      </div>
<?php
      endforeach;
    endif;

    $key = 'addindex';
    ob_start();
?>
      <div class="sub_box repeater-item repeater-item-<?php echo $key; ?>">
       <h4 class="theme_option_subbox_headline"><?php _e( 'New item', 'tcd-w' ); ?></h4>
       <div class="sub_box_content">
        <p class="footer-bar-target"><label><input name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][target]" type="checkbox" value="1"><?php _e( 'Open with new window', 'tcd-w' ); ?></label></p>
        <table class="table-repeater">
         <tr class="footer-bar-type">
          <th><label><?php _e( 'Button type', 'tcd-w' ); ?></label></th>
          <td>
           <select name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][type]">
            <?php foreach( $footer_bar_button_options as $option ) : ?>
            <option value="<?php echo esc_attr( $option['value'] ); ?>"><?php esc_html_e( $option['label'], 'tcd-w' ); ?></option>
            <?php endforeach; ?>
           </select>
          </td>
         </tr>
         <tr>
          <th><label for="dp_options[repeater_footer_bar_btn<?php echo esc_attr( $key ); ?>_label]"><?php _e( 'Button label', 'tcd-w' ); ?></label></th>
          <td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_label]" class="large-text repeater-label" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][label]" value=""></td>
         </tr>
         <tr class="footer-bar-url">
          <th><label for="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_url]"><?php _e( 'Link URL', 'tcd-w' ); ?></label></th>
          <td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_url]" class="large-text" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][url]" value=""></td>
         </tr>
         <tr class="footer-bar-number" style="display: none;">
          <th><label for="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_number]"><?php _e( 'Phone number', 'tcd-w' ); ?></label></th>
          <td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_number]" class="large-text" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][number]" value=""></td>
         </tr>
         <tr>
          <th><?php _e( 'Button icon', 'tcd-w' ); ?></th>
          <td>
           <?php foreach( $footer_bar_icon_options as $option ) : ?>
           <p><label><input type="radio" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][icon]" value="<?php echo esc_attr( $option['value'] ); ?>"<?php if ( 'file-text' == $option['value'] ) { echo ' checked="checked"'; } ?>><span class="icon icon-<?php echo esc_attr( $option['value'] ); ?>"></span><?php esc_html_e( $option['label'], 'tcd-w' ); ?></label></p>
           <?php endforeach; ?>
          </td>
         </tr>
        </table>
        <p class="delete-row right-align"><a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a></p>
       </div>
      </div>
<?php
    $clone = ob_get_clean();
?>
      </div><!-- END .repeater -->
      <a href="#" class="button button-secondary button-add-row" data-clone="<?php echo esc_attr( $clone ); ?>"><?php _e( 'Add item', 'tcd-w' ); ?></a>
     </div><!-- END .repeater-wrapper -->
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


</div><!-- END .tab-content -->

<?php
} // END add_footer_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_footer_theme_options_validate( $input ) {

  global $dp_default_options, $footer_bar_display_options, $footer_bar_button_options, $footer_bar_icon_options, $fixed_footer_content_type_options, $fixed_footer_sub_content_type_options, $footer_contact_area_options, $font_type_options;


  //連絡先
  if ( ! isset( $input['footer_contact_area_display_type'] ) )
    $input['footer_contact_area_display_type'] = null;
  if ( ! array_key_exists( $input['footer_contact_area_display_type'], $footer_contact_area_options ) )
    $input['footer_contact_area_display_type'] = null;
  if ( ! isset( $input['show_footer_tel'] ) )
    $input['show_footer_tel'] = null;
    $input['show_footer_tel'] = ( $input['show_footer_tel'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_footer_contact'] ) )
    $input['show_footer_contact'] = null;
    $input['show_footer_contact'] = ( $input['show_footer_contact'] == 1 ? 1 : 0 );
  $input['footer_tel_headline'] = wp_filter_nohtml_kses( $input['footer_tel_headline'] );
  $input['footer_tel_number'] = wp_filter_nohtml_kses( $input['footer_tel_number'] );
  $input['footer_tel_time'] = wp_filter_nohtml_kses( $input['footer_tel_time'] );
  $input['footer_contact_headline'] = wp_filter_nohtml_kses( $input['footer_contact_headline'] );
  $input['footer_contact_button_label'] = wp_filter_nohtml_kses( $input['footer_contact_button_label'] );
  $input['footer_contact_url'] = wp_filter_nohtml_kses( $input['footer_contact_url'] );
  if ( ! isset( $input['footer_contact_target'] ) )
    $input['footer_contact_target'] = null;
    $input['footer_contact_target'] = ( $input['footer_contact_target'] == 1 ? 1 : 0 );
  if ( ! isset( $input['footer_tel_number_font_type'] ) )
    $input['footer_tel_number_font_type'] = null;
  if ( ! array_key_exists( $input['footer_tel_number_font_type'], $font_type_options ) )
    $input['footer_tel_number_font_type'] = null;


  //コンテンツの設定
  if ( ! isset( $input['show_footer_content'] ) )
    $input['show_footer_content'] = null;
    $input['show_footer_content'] = ( $input['show_footer_content'] == 1 ? 1 : 0 );
  for ( $i = 1; $i <= 3; $i++ ) {
    $input['footer_content_image'.$i] = wp_filter_nohtml_kses( $input['footer_content_image'.$i] );
    $input['footer_content_title'.$i] = wp_filter_nohtml_kses( $input['footer_content_title'.$i] );
    $input['footer_content_url'.$i] = wp_filter_nohtml_kses( $input['footer_content_url'.$i] );
    if ( ! isset( $input['footer_content_target'.$i] ) )
      $input['footer_content_target'.$i] = null;
      $input['footer_content_target'.$i] = ( $input['footer_content_target'.$i] == 1 ? 1 : 0 );
  } // end for
  $input['footer_content_bg_color'] = wp_filter_nohtml_kses( $input['footer_content_bg_color'] );


  //コピーライト
  $input['copyright'] = wp_kses_post($input['copyright']);
  $input['copyright_text_color'] = wp_filter_nohtml_kses( $input['copyright_text_color'] );
  $input['copyright_bg_color'] = wp_filter_nohtml_kses( $input['copyright_bg_color'] );


  // スマホ用固定フッターバーの設定
  $footer_bar_btns = array();
  if ( ! empty( $input['footer_bar_btns'] ) && is_array($input['footer_bar_btns'] ) ) :
    $input['repeater_footer_bar_btns'] = $input['footer_bar_btns'];
  endif;
  if ( isset( $input['repeater_footer_bar_btns'] ) ) :
	  foreach ( (array)$input['repeater_footer_bar_btns'] as $key => $value ) {
	    $footer_bar_btns[] = array(
	      'type' => ( isset( $input['repeater_footer_bar_btns'][$key]['type'] ) && array_key_exists( $input['repeater_footer_bar_btns'][$key]['type'], $footer_bar_button_options ) ) ? $input['repeater_footer_bar_btns'][$key]['type'] : 'type1',
	      'label' => isset( $input['repeater_footer_bar_btns'][$key]['label'] ) ? wp_filter_nohtml_kses( $input['repeater_footer_bar_btns'][$key]['label'] ) : '',
	      'url' => isset( $input['repeater_footer_bar_btns'][$key]['url'] ) ? wp_filter_nohtml_kses( $input['repeater_footer_bar_btns'][$key]['url'] ) : '',
	      'number' => isset( $input['repeater_footer_bar_btns'][$key]['number'] ) ? wp_filter_nohtml_kses( $input['repeater_footer_bar_btns'][$key]['number'] ) : '',
	      'target' => ! empty( $input['repeater_footer_bar_btns'][$key]['target'] ) ? 1 : 0,
	      'icon' => ( isset( $input['repeater_footer_bar_btns'][$key]['icon'] ) && array_key_exists( $input['repeater_footer_bar_btns'][$key]['icon'], $footer_bar_icon_options ) ) ? $input['repeater_footer_bar_btns'][$key]['icon'] : 'file-text'
	    );
	  }
  endif;
  $input['footer_bar_btns'] = $footer_bar_btns;


	return $input;

};


?>