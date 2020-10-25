<?php
/*
 * 固定ページの設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_page_dp_default_options' );


// Add label of logo tab
add_action( 'tcd_tab_labels', 'add_page_tab_label' );


// Add HTML of logo tab
add_action( 'tcd_tab_panel', 'add_page_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_page_theme_options_validate' );


// タブの名前
function add_page_tab_label( $tab_labels ) {
	$tab_labels['page'] = __( 'Page', 'tcd-w' );
	return $tab_labels;
}


// 初期値
function add_page_dp_default_options( $dp_default_options ) {

	$dp_default_options['page_headline_font_size'] = '28';
	$dp_default_options['page_sub_title_font_size'] = '16';
	$dp_default_options['page_content_font_size'] = '14';
	$dp_default_options['page_headline_font_size_mobile'] = '18';
	$dp_default_options['page_sub_title_font_size_mobile'] = '14';
	$dp_default_options['page_content_font_size_mobile'] = '13';
	$dp_default_options['page_headline_color'] = '#000000';
	$dp_default_options['page_sub_title_color'] = '#666666';
	$dp_default_options['page_content_color'] = '#666666';

	$dp_default_options['page_ad_code1'] = '';
	$dp_default_options['page_ad_image1'] = false;
	$dp_default_options['page_ad_url1'] = '';

	$dp_default_options['page_ad_code2'] = '';
	$dp_default_options['page_ad_image2'] = false;
	$dp_default_options['page_ad_url2'] = '';

	$dp_default_options['page_post_list_headline'] = 'FEATURED POSTS';
	$dp_default_options['page_post_list_type'] = 'recent_post';
	$dp_default_options['page_post_list_order'] = 'date1';

	$dp_default_options['page_post_list_num'] = 4;
	$dp_default_options['page_post_list_show_cat'] = 1;
	$dp_default_options['page_post_list_show_date'] = 1;

	$dp_default_options['page_link_next'] = __( 'Next page', 'tcd-w' );
	$dp_default_options['page_link_prev'] = __( 'Prev page', 'tcd-w' );

	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_page_tab_panel( $options ) {

  global $dp_default_options, $post_type_options, $post_type_order_options, $page_post_list_num_options;

?>

<div id="tab-content-page" class="tab-content">


   <?php // 基本設定 -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Basic setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Font size setting', 'tcd-w');  ?></h4>
     <p><?php _e('Page title', 'tcd-w');  ?> <input id="dp_options[page_headline_font_size]" class="font_size hankaku" type="text" name="dp_options[page_headline_font_size]" value="<?php esc_attr_e( $options['page_headline_font_size'] ); ?>" /><span>px</span></p>
     <p><?php _e('Page sub title', 'tcd-w');  ?> <input id="dp_options[page_sub_title_font_size]" class="font_size hankaku" type="text" name="dp_options[page_sub_title_font_size]" value="<?php esc_attr_e( $options['page_sub_title_font_size'] ); ?>" /><span>px</span></p>
     <p><?php _e('Page content', 'tcd-w');  ?> <input id="dp_options[page_content_font_size]" class="font_size hankaku" type="text" name="dp_options[page_content_font_size]" value="<?php esc_attr_e( $options['page_content_font_size'] ); ?>" /><span>px</span></p>
     <p><?php _e('Page title for mobile device', 'tcd-w');  ?> <input id="dp_options[page_headline_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[page_headline_font_size_mobile]" value="<?php esc_attr_e( $options['page_headline_font_size_mobile'] ); ?>" /><span>px</span></p>
     <p><?php _e('Page sub title for mobile device', 'tcd-w');  ?> <input id="dp_options[page_sub_title_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[page_sub_title_font_size_mobile]" value="<?php esc_attr_e( $options['page_sub_title_font_size_mobile'] ); ?>" /><span>px</span></p>
     <p><?php _e('Page content for mobile device', 'tcd-w');  ?> <input id="dp_options[page_content_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[page_content_font_size_mobile]" value="<?php esc_attr_e( $options['page_content_font_size_mobile'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Color setting', 'tcd-w');  ?></h4>
     <p><?php _e('Headline', 'tcd-w');  ?> <input type="text" name="dp_options[page_headline_color]" value="<?php echo esc_attr( $options['page_headline_color'] ); ?>" data-default-color="#000000" class="c-color-picker"></p>
     <p><?php _e('Sub title', 'tcd-w');  ?> <input type="text" name="dp_options[page_sub_title_color]" value="<?php echo esc_attr( $options['page_sub_title_color'] ); ?>" data-default-color="#666666" class="c-color-picker"></p>
     <p><?php _e('Page content', 'tcd-w');  ?> <input type="text" name="dp_options[page_content_color]" value="<?php echo esc_attr( $options['page_content_color'] ); ?>" data-default-color="#666666" class="c-color-picker"></p>
     <h4 class="theme_option_headline2"><?php _e('Page navigation setting', 'tcd-w');  ?></h4>
     <p><span class="label"><?php _e('Button label for next page', 'tcd-w');  ?></span><input id="dp_options[page_link_next]" class="regular-text" type="text" name="dp_options[page_link_next]" value="<?php esc_attr_e( $options['page_link_next'] ); ?>" /></p>
     <p><span class="label"><?php _e('Button label for previous page', 'tcd-w');  ?></span><input id="dp_options[page_link_prev]" class="regular-text" type="text" name="dp_options[page_link_prev]" value="<?php esc_attr_e( $options['page_link_prev'] ); ?>" /></p>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // 広告の登録 -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Banner setup', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><?php _e('If you want to display this banner, please check the checkbox on the edit page.', 'tcd-w');  ?></p>
     <?php for($i = 1; $i <= 2; $i++) : ?>
     <div class="sub_box cf"> 
      <h3 class="theme_option_subbox_headline"><?php if($i == 1) { ?><?php _e('Top banner', 'tcd-w');  ?><?php } else { ?><?php _e('Bottom banner', 'tcd-w');  ?><?php }; ?></h3>
      <div class="sub_box_content">
       <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
       <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
       <textarea id="dp_options[page_ad_code<?php echo $i; ?>]" class="large-text" cols="50" rows="10" name="dp_options[page_ad_code<?php echo $i; ?>]"><?php echo esc_textarea( $options['page_ad_code'.$i] ); ?></textarea>
       <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
       <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); _e('Recommend image size. Width:300px Height:250px', 'tcd-w'); ?></h4>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js page_ad_image<?php echo $i; ?>">
         <input type="hidden" value="<?php echo esc_attr( $options['page_ad_image'.$i] ); ?>" id="page_ad_image<?php echo $i; ?>" name="dp_options[page_ad_image<?php echo $i; ?>]" class="cf_media_id">
         <div class="preview_field"><?php if($options['page_ad_image'.$i]){ echo wp_get_attachment_image($options['page_ad_image'.$i], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['page_ad_image'.$i]){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
       <input id="dp_options[page_ad_url<?php echo $i; ?>]" class="regular-text" type="text" name="dp_options[page_ad_url<?php echo $i; ?>]" value="<?php esc_attr_e( $options['page_ad_url'.$i] ); ?>" />
       <input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
     <?php endfor; ?>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // 記事一覧の設定 ------------------------------------------------------------ ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Post list setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><?php _e('If you want to display this post list, please check the checkbox on the edit page.', 'tcd-w');  ?></p>
     <h4 class="theme_option_headline2"><?php _e('Headline', 'tcd-w');  ?></h4>
     <input id="dp_options[page_post_list_headline]" class="regular-text" type="text" name="dp_options[page_post_list_headline]" value="<?php esc_attr_e( $options['page_post_list_headline'] ); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Post type', 'tcd-w');  ?></h4>
     <select name="dp_options[page_post_list_type]">
      <?php
           foreach ( $post_type_options as $option ) :
           $label = $option['label'];
           $selected = '';
           if ( $options['page_post_list_type'] == $option['value']) {
             $selected = 'selected="selected"';
           } else {
             $selected = '';
           }
           echo '<option style="padding-right:10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
           endforeach;
      ?>
     </select>
     <h4 class="theme_option_headline2"><?php _e('Post order', 'tcd-w');  ?></h4>
     <select name="dp_options[page_post_list_order]">
      <?php
           foreach ( $post_type_order_options as $option ) :
           $label = $option['label'];
           $selected = '';
           if ( $options['page_post_list_order'] == $option['value']) {
            $selected = 'selected="selected"';
           } else {
            $selected = '';
           }
           echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
           endforeach;
      ?>
     </select>
     <h4 class="theme_option_headline2"><?php _e('Number of post to display', 'tcd-w');  ?></h4>
     <select name="dp_options[page_post_list_num]">
      <?php
           foreach ( $page_post_list_num_options as $option ) :
           $label = $option['label'];
           $selected = '';
           if ( $options['page_post_list_num'] == $option['value']) {
             $selected = 'selected="selected"';
           } else {
             $selected = '';
           }
           echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
           endforeach;
      ?>
     </select>
     <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
     <ul>
      <li><label><input id="dp_options[page_post_list_show_cat]" name="dp_options[page_post_list_show_cat]" type="checkbox" value="1" <?php checked( '1', $options['page_post_list_show_cat'] ); ?> /> <?php _e('Display category', 'tcd-w');  ?></label></li>
      <li><label><input id="dp_options[page_post_list_show_date]" name="dp_options[page_post_list_show_date]" type="checkbox" value="1" <?php checked( '1', $options['page_post_list_show_date'] ); ?> /> <?php _e('Display date', 'tcd-w');  ?></label></li>
     </ul>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


</div><!-- END .tab-content -->

<?php
} // END add_page_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_page_theme_options_validate( $input ) {

  global $dp_default_options, $post_type_options, $post_type_order_options, $page_post_list_num_options;


  $input['page_headline_font_size'] = wp_filter_nohtml_kses( $input['page_headline_font_size'] );
  $input['page_sub_title_font_size'] = wp_filter_nohtml_kses( $input['page_sub_title_font_size'] );
  $input['page_content_font_size'] = wp_filter_nohtml_kses( $input['page_content_font_size'] );
  $input['page_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input['page_headline_font_size_mobile'] );
  $input['page_sub_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['page_sub_title_font_size_mobile'] );
  $input['page_content_font_size_mobile'] = wp_filter_nohtml_kses( $input['page_content_font_size_mobile'] );
  $input['page_headline_color'] = wp_filter_nohtml_kses( $input['page_headline_color'] );
  $input['page_sub_title_color'] = wp_filter_nohtml_kses( $input['page_sub_title_color'] );
  $input['page_content_color'] = wp_filter_nohtml_kses( $input['page_content_color'] );

  $input['page_ad_code1'] = $input['page_ad_code1'];
  $input['page_ad_image1'] = wp_filter_nohtml_kses( $input['page_ad_image1'] );
  $input['page_ad_url1'] = wp_filter_nohtml_kses( $input['page_ad_url1'] );
  $input['page_ad_code2'] = $input['page_ad_code2'];
  $input['page_ad_image2'] = wp_filter_nohtml_kses( $input['page_ad_image2'] );
  $input['page_ad_url2'] = wp_filter_nohtml_kses( $input['page_ad_url2'] );

  $input['page_post_list_headline'] = wp_filter_nohtml_kses( $input['page_post_list_headline'] );
  if ( ! isset( $value['page_post_list_type'] ) )
    $value['page_post_list_type'] = null;
  if ( ! array_key_exists( $value['page_post_list_type'], $post_type_options ) )
    $value['page_post_list_type'] = null;
  if ( ! isset( $value['page_post_list_order'] ) )
    $value['page_post_list_order'] = null;
  if ( ! array_key_exists( $value['page_post_list_order'], $post_type_order_options ) )
    $value['page_post_list_order'] = null;
  if ( ! isset( $value['page_post_list_num'] ) )
    $value['page_post_list_num'] = null;
  if ( ! array_key_exists( $value['page_post_list_num'], $page_post_list_num_options ) )
    $value['page_post_list_num'] = null;
  if ( ! isset( $input['page_post_list_show_cat'] ) )
    $input['page_post_list_show_cat'] = null;
    $input['page_post_list_show_cat'] = ( $input['page_post_list_show_cat'] == 1 ? 1 : 0 );
  if ( ! isset( $input['page_post_list_show_date'] ) )
    $input['page_post_list_show_date'] = null;
    $input['page_post_list_show_date'] = ( $input['page_post_list_show_date'] == 1 ? 1 : 0 );

  $input['page_link_next'] = wp_filter_nohtml_kses( $input['page_link_next'] );
  $input['page_link_prev'] = wp_filter_nohtml_kses( $input['page_link_prev'] );


	return $input;

};


?>