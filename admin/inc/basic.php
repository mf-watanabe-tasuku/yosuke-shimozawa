<?php
/*
 * 基本設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_basic_dp_default_options' );


// Add label of basic tab
add_action( 'tcd_tab_labels', 'add_basic_tab_label' );


// Add HTML of basic tab
add_action( 'tcd_tab_panel', 'add_basic_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_basic_theme_options_validate' );


// タブの名前
function add_basic_tab_label( $tab_labels ) {
	$tab_labels['basic'] = __( 'Basic', 'tcd-w' );
	return $tab_labels;
}


// 初期値
function add_basic_dp_default_options( $dp_default_options ) {

	// 色の設定
	$dp_default_options['main_color'] = '#b0cfd2';
	$dp_default_options['secondary_color'] = '#6698a1';
	$dp_default_options['base_font_color'] = '#666666';
	$dp_default_options['headline_font_color'] = '#65989f';
	$dp_default_options['content_link_color'] = '#6698a1';

	$dp_default_options['square_headline_title_color'] = '#6598a0';
	$dp_default_options['square_headline_subtitle_color'] = '#666666';
	$dp_default_options['square_headline_bg_color'] = '#ffffff';

	// レイアウト
	$dp_default_options['layout'] = 'type1';

	// フォントの種類
	$dp_default_options['font_type'] = 'type1';
	$dp_default_options['headline_font_type'] = 'type3';

	// アニメーションの設定
	$dp_default_options['hover_type'] = 'type1';
	$dp_default_options['hover1_zoom'] = '1.2';
	$dp_default_options['hover2_direct'] = 'type1';
	$dp_default_options['hover2_opacity'] = '0.5';
	$dp_default_options['hover3_opacity'] = '0.5';
	$dp_default_options['hover3_bgcolor'] = '#FFFFFF';

	// 絵文字の設定
	$dp_default_options['use_emoji'] = 1;

	// オリジナルスタイルの設定
	$dp_default_options['css_code'] = '';

  // custom script
  $dp_default_options['custom_head'] = '';

	// Facebook OGPの設定
	$dp_default_options['use_ogp'] = 0;
	$dp_default_options['fb_app_id'] = '';
	$dp_default_options['ogp_image'] = '';

	// Twitter Cardsの設定
	$dp_default_options['use_twitter_card'] = 0;
	$dp_default_options['twitter_account_name'] = '';

	// ファビコン
	$dp_default_options['favicon'] = '';

	// ロードアイコンの設定
	$dp_default_options['use_load_icon'] = '';
	$dp_default_options['load_time'] = '3000';
	$dp_default_options['load_icon'] = 'type1';
	$dp_default_options['loader_color1'] = '#b0cfd2';
	$dp_default_options['loader_color2'] = '#6698a1';

	// クイックタグの設定
	$dp_default_options['use_quicktags'] = 1;

	// Google Map
	$dp_default_options['gmap_api_key'] = '';
	$dp_default_options['gmap_marker_type'] = 'type1';
	$dp_default_options['gmap_custom_marker_type'] = 'type1';
	$dp_default_options['gmap_marker_text'] = '';
	$dp_default_options['gmap_marker_color'] = '#ffffff';
	$dp_default_options['gmap_marker_img'] = '';
	$dp_default_options['gmap_marker_bg'] = '#000000';

	// NO IMAGE
	$dp_default_options['no_image2'] = false;

	// SNSボタン
	$dp_default_options['sns_type_top'] = 'type1';
	$dp_default_options['sns_type_btm'] = 'type1';

	$dp_default_options['show_twitter_top'] = 1;
	$dp_default_options['show_fblike_top'] = 1;
	$dp_default_options['show_fbshare_top'] = 1;
	$dp_default_options['show_google_top'] = 1;
	$dp_default_options['show_hatena_top'] = 1;
	$dp_default_options['show_pocket_top'] = 1;
	$dp_default_options['show_feedly_top'] = 1;
	$dp_default_options['show_rss_top'] = 1;
	$dp_default_options['show_pinterest_top'] = 1;

	$dp_default_options['show_twitter_btm'] = 1;
	$dp_default_options['show_fblike_btm'] = 1;
	$dp_default_options['show_fbshare_btm'] = 1;
	$dp_default_options['show_google_btm'] = 1;
	$dp_default_options['show_hatena_btm'] = 1;
	$dp_default_options['show_pocket_btm'] = 1;
	$dp_default_options['show_feedly_btm'] = 1;
	$dp_default_options['show_rss_btm'] = 1;
	$dp_default_options['show_pinterest_btm'] = 1;

	$dp_default_options['twitter_info'] = '';

	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_basic_tab_panel( $options ) {

  global $dp_default_options, $load_time_options, $load_icon_type, $font_type_options, $post_type_options, $layout_options, $gmap_marker_type_options, $gmap_custom_marker_type_options, $hover_type_options, $hover2_direct_options, $sns_type_options;

?>

<div id="tab-content-basic" class="tab-content">


   <?php // 色の設定 ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Color setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Primary color', 'tcd-w');  ?></h4>
     <input type="text" name="dp_options[main_color]" value="<?php echo esc_attr( $options['main_color'] ); ?>" data-default-color="#b0cfd2" class="c-color-picker">
     <h4 class="theme_option_headline2"><?php _e('Secondary color', 'tcd-w');  ?></h4>
     <input type="text" name="dp_options[secondary_color]" value="<?php echo esc_attr( $options['secondary_color'] ); ?>" data-default-color="#6698a1" class="c-color-picker">
     <h4 class="theme_option_headline2"><?php _e('Basic font color', 'tcd-w');  ?></h4>
     <input type="text" name="dp_options[base_font_color]" value="<?php echo esc_attr( $options['base_font_color'] ); ?>" data-default-color="#666666" class="c-color-picker">
     <h4 class="theme_option_headline2"><?php _e('Headline font color', 'tcd-w');  ?></h4>
     <input type="text" name="dp_options[headline_font_color]" value="<?php echo esc_attr( $options['headline_font_color'] ); ?>" data-default-color="#65989f" class="c-color-picker">
     <h4 class="theme_option_headline2"><?php _e('Single page text link color', 'tcd-w');  ?></h4>
     <input type="text" name="dp_options[content_link_color]" value="<?php echo esc_attr( $options['content_link_color'] ); ?>" data-default-color="#6698a1" class="c-color-picker">
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // アーカイブ・固定ページ　見出しの色の設定 ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Page header color setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Title color', 'tcd-w');  ?></h4>
     <input type="text" name="dp_options[square_headline_title_color]" value="<?php echo esc_attr( $options['square_headline_title_color'] ); ?>" data-default-color="#6598a0" class="c-color-picker">
     <h4 class="theme_option_headline2"><?php _e('Sub title color', 'tcd-w');  ?></h4>
     <input type="text" name="dp_options[square_headline_subtitle_color]" value="<?php echo esc_attr( $options['square_headline_subtitle_color'] ); ?>" data-default-color="#666666" class="c-color-picker">
     <h4 class="theme_option_headline2"><?php _e('Background color', 'tcd-w');  ?></h4>
     <input type="text" name="dp_options[square_headline_bg_color]" value="<?php echo esc_attr( $options['square_headline_bg_color'] ); ?>" data-default-color="#ffffff" class="c-color-picker">
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // レイアウトの設定 ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Sidebar position', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <ul class="select_type1 cf">
     <?php
          if ( ! isset( $checked ) )
          $checked = '';
          foreach ( $layout_options as $option ) {
          $layout_setting = $options['layout'];
           if ( '' != $layout_setting ) {
            if ( $options['layout'] == $option['value'] ) {
             $checked = "checked=\"checked\"";
            } else {
             $checked = '';
            }
           }
     ?>
      <li>
       <label>
        <input type="radio" name="dp_options[layout]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
        <img src="<?php bloginfo('template_url'); ?>/admin/img/<?php echo $option['img']; ?>.gif" alt="" title="" />
        <?php echo $option['label']; ?>
       </label>
      </li>
     <?php
          }
     ?>
     </ul>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // ファビコン ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
  	<h3 class="theme_option_headline"><?php _e( 'Favicon setup', 'tcd-w' ); ?></h3>
    <div class="theme_option_field_ac_content">
     <p><?php _e( 'Setting for the favicon displayed at browser address bar or tab.', 'tcd-w' ); ?></p>
     <h4><?php _e( 'Favicon file', 'tcd-w' ); ?><?php _e( ' (Recommend image size. Width:16px, Height:16px)', 'tcd-w' ); ?></h4>
     <p><?php _e( 'You can use .ico, .png or .gif file, and we recommed you to use .ico file.', 'tcd-w' ); ?></p>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js favicon">
       <input type="hidden" value="<?php echo esc_attr( $options['favicon'] ); ?>" id="favicon" name="dp_options[favicon]" class="cf_media_id">
       <div class="preview_field"><?php if($options['favicon']){ echo wp_get_attachment_image($options['favicon'], 'full'); }; ?></div>
       <div class="buttton_area">
        <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
        <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['favicon']){ echo 'hidden'; }; ?>">
       </div>
      </div>
     </div>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // フォントの種類 ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Font type', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><?php _e('Please set the font type of all text except for headline.', 'tcd-w'); ?></p>
     <fieldset class="cf select_type2">
      <?php
           if ( ! isset( $checked ) )
           $checked = '';
           foreach ( $font_type_options as $option ) {
           $font_type_setting = $options['font_type'];
             if ( '' != $font_type_setting ) {
               if ( $options['font_type'] == $option['value'] ) {
                 $checked = "checked=\"checked\"";
               } else {
                 $checked = '';
               }
            }
      ?>
      <label class="description">
       <input type="radio" name="dp_options[font_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
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


   <?php // フォントの種類 ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Font type of headline', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <fieldset class="cf select_type2">
      <?php
           if ( ! isset( $checked ) )
           $checked = '';
           foreach ( $font_type_options as $option ) {
           $font_type_setting = $options['headline_font_type'];
             if ( '' != $font_type_setting ) {
               if ( $options['headline_font_type'] == $option['value'] ) {
                 $checked = "checked=\"checked\"";
               } else {
                 $checked = '';
               }
            }
      ?>
      <label class="description">
       <input type="radio" name="dp_options[headline_font_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
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


   <?php // hover エフェクト ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Hover effect', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Hover effect type', 'tcd-w'); ?></h4>
     <p><?php _e('Please set the hover effect for thumbnail images.', 'tcd-w'); ?></p>
     <fieldset class="cf select_type2">
      <?php
           if ( ! isset( $checked ) )
           $checked = '';
           foreach ( $hover_type_options as $option ) {
           $hover_type_setting = $options['hover_type'];
             if ( '' != $hover_type_setting ) {
               if ( $options['hover_type'] == $option['value'] ) {
                 $checked = "checked=\"checked\"";
               } else {
                 $checked = '';
               }
            }
      ?>
      <input style="display:inline; margin: 5px 5px 5px 0;" type="radio" id="tab-<?php echo $option['value']; ?>" name="dp_options[hover_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
      <label style="display:inline;" class="description" for="tab-<?php echo $option['value']; ?>"><?php echo $option['label']; ?></label><br>
      <?php } ?>
      <div class="tab-box">
       <div id="tabView1">
		    <h4 class="theme_option_headline2"><?php _e('Settings for Zoom effect', 'tcd-w'); ?></h4>
		    <p><?php _e('Please set the rate of magnification.', 'tcd-w'); ?></p>
		    <input id="dp_options[hover1_zoom]" class="hankaku" style="width:45px;" type="text" name="dp_options[hover1_zoom]" value="<?php esc_attr_e( $options['hover1_zoom'] ); ?>" />
	     </div>
    	 <div id="tabView2">
		    <h4 class="theme_option_headline2"><?php _e('Settings for Slide effect', 'tcd-w'); ?></h4>
		    <p><?php _e('Please set the direction of slide.', 'tcd-w'); ?></p>
		    <fieldset class="cf select_type2">
		     <?php
		          if ( ! isset( $checked ) )
		          $checked = '';
		          foreach ( $hover2_direct_options as $option ) {
		          $hover2_direct_setting = $options['hover2_direct'];
		            if ( '' != $hover2_direct_setting ) {
		              if ( $options['hover2_direct'] == $option['value'] ) {
		                $checked = "checked=\"checked\"";
		              } else {
		                $checked = '';
		              }
		           }
		     ?>
		     <label class="description" style="display:inline-block;margin-right:15px;">
		      <input type="radio" name="dp_options[hover2_direct]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
		      <?php echo $option['label']; ?>
		     </label>
		     <?php } ?>
		    </fieldset>
		    <p><?php _e('Please set the opacity. (0 - 1.0, e.g. 0.7)', 'tcd-w'); ?></p>
		    <input id="dp_options[hover2_opacity]" class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[hover2_opacity]" value="<?php esc_attr_e( $options['hover2_opacity'] ); ?>" />
	     </div>
    	 <div id="tabView3">
        <h4 class="theme_option_headline2"><?php _e('Settings for Fade effect', 'tcd-w'); ?></h4>
        <p><?php _e('Please set the opacity. (0 - 1.0, e.g. 0.7)', 'tcd-w'); ?></p>
        <input id="dp_options[hover3_opacity]" class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[hover3_opacity]" value="<?php esc_attr_e( $options['hover3_opacity'] ); ?>" />
        <p><?php _e('Please set the background color.', 'tcd-w'); ?></p>
        <input type="text" name="dp_options[hover3_bgcolor]" value="<?php echo esc_attr( $options['hover3_bgcolor'] ); ?>" data-default-color="#FFFFFF" class="c-color-picker">
	     </div>
      </div>
     </fieldset>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // SNSボタン  ------------------------------------------------------------------ ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Social button setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><?php _e( 'You can set share buttons on single page.', 'tcd-w' ); ?></p>
     <p><?php _e( 'You can select whether to show or hide buttons with the theme options of each post type.', 'tcd-w' ); ?></p>

     <div class="sub_box cf"> 
      <h3 class="theme_option_subbox_headline"><?php _e('Top social button', 'tcd-w');  ?></h3>
      <div class="sub_box_content">
       <p><?php _e('This button will be displayed under post title area.', 'tcd-w');  ?></p>
       <h4 class="theme_option_headline2"><?php _e('Social button design', 'tcd-w');  ?></h4>
       <ul class="cf">
        <?php
             if ( ! isset( $checked ) )
             $checked = '';
             foreach ( $sns_type_options as $option ) {
               $sns_type_top_setting = $options['sns_type_top'];
               if ( '' != $sns_type_top_setting ) {
                 if ( $options['sns_type_top'] == $option['value'] ) {
                   $checked = "checked=\"checked\"";
                 } else {
                 $checked = '';
               }
             }
        ?>
        <li>
         <label>
          <input type="radio" name="dp_options[sns_type_top]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
          <?php _e($option['label'], 'tcd-w'); ?>
         </label>
        </li>
        <?php } ?>
       </ul>
       <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
       <ul>
        <li><label><input id="dp_options[show_twitter_top]" name="dp_options[show_twitter_top]" type="checkbox" value="1" <?php checked( '1', $options['show_twitter_top'] ); ?> /> <?php _e('Display twitter button', 'tcd-w');  ?></label></li>
        <li><label><input id="dp_options[show_fblike_top]" name="dp_options[show_fblike_top]" type="checkbox" value="1" <?php checked( '1', $options['show_fblike_top'] ); ?> /> <?php _e('Display facebook like button -Button type 5 (Default button) only', 'tcd-w');  ?></label></li>
        <li><label><input id="dp_options[show_fbshare_top]" name="dp_options[show_fbshare_top]" type="checkbox" value="1" <?php checked( '1', $options['show_fbshare_top'] ); ?> /> <?php _e('Display facebook share button', 'tcd-w');  ?></label></li>
        <li><label><input id="dp_options[show_google_top]" name="dp_options[show_google_top]" type="checkbox" value="1" <?php checked( '1', $options['show_google_top'] ); ?> /> <?php _e('Display google+ button', 'tcd-w');  ?></label></li>
        <li><label><input id="dp_options[show_hatena_top]" name="dp_options[show_hatena_top]" type="checkbox" value="1" <?php checked( '1', $options['show_hatena_top'] ); ?> /> <?php _e('Display hatena button', 'tcd-w');  ?></label></li>
        <li><label><input id="dp_options[show_pocket_top]" name="dp_options[show_pocket_top]" type="checkbox" value="1" <?php checked( '1', $options['show_pocket_top'] ); ?> /> <?php _e('Display pocket button', 'tcd-w');  ?></label></li>
        <li><label><input id="dp_options[show_feedly_top]" name="dp_options[show_feedly_top]" type="checkbox" value="1" <?php checked( '1', $options['show_feedly_top'] ); ?> /> <?php _e('Display feedly button', 'tcd-w');  ?></label></li>
        <li><label><input id="dp_options[show_rss_top]" name="dp_options[show_rss_top]" type="checkbox" value="1" <?php checked( '1', $options['show_rss_top'] ); ?> /> <?php _e('Display rss button', 'tcd-w');  ?></label></li>
        <li><label><input id="dp_options[show_pinterest_top]" name="dp_options[show_pinterest_top]" type="checkbox" value="1" <?php checked( '1', $options['show_pinterest_top'] ); ?> /> <?php _e('Display pinterest button', 'tcd-w');  ?></label></li>
       </ul>
       <input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->

     <div class="sub_box cf"> 
      <h3 class="theme_option_subbox_headline"><?php _e('Bottom social button', 'tcd-w');  ?></h3>
      <div class="sub_box_content">
       <p><?php _e('This button will be displayed under post content.', 'tcd-w');  ?></p>
       <h4 class="theme_option_headline2"><?php _e('Social button design', 'tcd-w');  ?></h4>
       <ul class="cf">
        <?php
             if ( ! isset( $checked ) )
             $checked = '';
             foreach ( $sns_type_options as $option ) {
               $sns_type_btm_setting = $options['sns_type_btm'];
               if ( '' != $sns_type_btm_setting ) {
                 if ( $options['sns_type_btm'] == $option['value'] ) {
                   $checked = "checked=\"checked\"";
                 } else {
                   $checked = '';
                 }
               }
        ?>
        <li>
         <label>
          <input type="radio" name="dp_options[sns_type_btm]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
          <?php _e($option['label'], 'tcd-w'); ?>
         </label>
        </li>
        <?php } ?>
       </ul>
       <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
       <ul>
        <li><label><input id="dp_options[show_twitter_btm]" name="dp_options[show_twitter_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_twitter_btm'] ); ?> /> <?php _e('Display twitter button', 'tcd-w');  ?></label></li>
        <li><label><input id="dp_options[show_fblike_btm]" name="dp_options[show_fblike_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_fblike_btm'] ); ?> /> <?php _e('Display facebook like button-Button type 5 (Default button) only', 'tcd-w');  ?></label></li>
        <li><label><input id="dp_options[show_fbshare_btm]" name="dp_options[show_fbshare_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_fbshare_btm'] ); ?> /> <?php _e('Display facebook share button', 'tcd-w');  ?></label></li>
        <li><label><input id="dp_options[show_google_btm]" name="dp_options[show_google_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_google_btm'] ); ?> /> <?php _e('Display google+ button', 'tcd-w');  ?></label></li>
        <li><label><input id="dp_options[show_hatena_btm]" name="dp_options[show_hatena_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_hatena_btm'] ); ?> /> <?php _e('Display hatena button', 'tcd-w');  ?></label></li>
        <li><label><input id="dp_options[show_pocket_btm]" name="dp_options[show_pocket_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_pocket_btm'] ); ?> /> <?php _e('Display pocket button', 'tcd-w');  ?></label></li>
        <li><label><input id="dp_options[show_feedly_btm]" name="dp_options[show_feedly_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_feedly_btm'] ); ?> /> <?php _e('Display feedly button', 'tcd-w');  ?></label></li>
        <li><label><input id="dp_options[show_rss_btm]" name="dp_options[show_rss_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_rss_btm'] ); ?> /> <?php _e('Display rss button', 'tcd-w');  ?></label></li>
        <li><label><input id="dp_options[show_pinterest_btm]" name="dp_options[show_pinterest_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_pinterest_btm'] ); ?> /> <?php _e('Display pinterest button', 'tcd-w');  ?></label></li>
       </ul>
       <input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->

     <h4 class="theme_option_headline2"><?php _e('Setting for the twitter button', 'tcd-w');  ?></h4>
     <label style="margin-top:20px;"><?php _e('Set of twitter account. (ex.designplus)', 'tcd-w');  ?></label>
     <input style="display:block; margin:.6em 0 1em;" id="dp_options[twitter_info]" class="regular-text" type="text" name="dp_options[twitter_info]" value="<?php esc_attr_e( $options['twitter_info'] ); ?>" />
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // Use OGP tag ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Facebook OGP setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><label><input id="dp_options[use_ogp]" name="dp_options[use_ogp]" type="checkbox" value="1" <?php checked( '1', $options['use_ogp'] ); ?> /> <?php _e('Use OGP', 'tcd-w');  ?></label></p>
     <p><?php _e( 'Your app ID', 'tcd-w' );  ?> <input class="regular-text" type="text" name="dp_options[fb_app_id]" value="<?php esc_attr_e( $options['fb_app_id'] ); ?>"></p>
     <p><?php _e( 'In order to use Facebook Insights please set your app ID.', 'tcd-w' ); ?></p>
     <h4 class="theme_option_headline2"><?php _e( 'OGP image', 'tcd-w' ); ?></h4>
     <p><?php _e( 'This image is displayed for OGP if the page does not have a thumbnail.', 'tcd-w' ); ?></p>
     <p><?php _e( 'Recommend image size. Width:1200px, Height:630px', 'tcd-w' ); ?></p>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js">
       <input type="hidden" value="<?php echo esc_attr( $options['ogp_image'] ); ?>" id="ogp_image" name="dp_options[ogp_image]" class="cf_media_id">
       <div class="preview_field"><?php if ( $options['ogp_image'] ) { echo wp_get_attachment_image( $options['ogp_image'], 'medium'); } ?></div>
       <div class="button_area">
        <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
        <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $options['ogp_image'] ) { echo 'hidden'; } ?>">
       </div>
      </div>
     </div>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // Twitter card ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Twitter Cards setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><label><input id="dp_options[use_twitter_card]" name="dp_options[use_twitter_card]" type="checkbox" value="1" <?php checked( '1', $options['use_twitter_card'] ); ?>> <?php _e( 'Use Twitter Cards', 'tcd-w' );  ?></label></p>
     <p><?php _e( 'Your Twitter account name (exclude @ mark)', 'tcd-w' ); ?><input id="dp_options[twitter_account_name]" class="regular-text" type="text" name="dp_options[twitter_account_name]" value="<?php esc_attr_e( $options['twitter_account_name'] ); ?>"></p>
     <p><a href="http://design-plus1.com/tcd-w/2016/11/twitter-cards.html" target="_blank"><?php _e( 'Information about Twitter Cards.', 'tcd-w' ); ?></a></p>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // 絵文字の設定 ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Emoji setup', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><?php _e('We recommend to checkoff this option if you dont use any Emoji in your post content.', 'tcd-w');  ?></p>
     <p><label><input id="dp_options[use_emoji]" name="dp_options[use_emoji]" type="checkbox" value="1" <?php checked( '1', $options['use_emoji'] ); ?> /> <?php _e('Use emoji', 'tcd-w');  ?></label></li>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // クイックタグ ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Quicktag setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><label><input id="dp_options[use_quicktags]" name="dp_options[use_quicktags]" type="checkbox" value="1" <?php checked( '1', $options['use_quicktags'] ); ?> /> <?php _e('Use quick tag function in Editor', 'tcd-w');  ?></label></p>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // No Imageの設定 ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Original alternate image for featured image', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><?php _e('You can register original alternate image for featured image.', 'tcd-w');  ?></p>
     <p><?php _e('Recommend image size. Width:786px Height:556px', 'tcd-w');  ?></p>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js no_image2">
       <input type="hidden" value="<?php echo esc_attr( $options['no_image2'] ); ?>" id="no_image2" name="dp_options[no_image2]" class="cf_media_id">
       <div class="preview_field"><?php if($options['no_image2']){ echo wp_get_attachment_image($options['no_image2'], 'medium'); }; ?></div>
       <div class="buttton_area">
        <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
        <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['no_image2']){ echo 'hidden'; }; ?>">
       </div>
      </div>
     </div>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->

   <?php // ローディング画面の設定 ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Loading screen setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><label><input id="dp_options[use_load_icon]" name="dp_options[use_load_icon]" type="checkbox" value="1" <?php checked( '1', $options['use_load_icon'] ); ?> /> <?php _e('Use load icon.', 'tcd-w');  ?></label></p>
     <h4 class="theme_option_headline2"><?php _e('Type of loader', 'tcd-w');  ?></h4>
     <select  id="load_icon_type" name="dp_options[load_icon]">
      <?php
           foreach ( $load_icon_type as $option ) :
             if ( $options['load_icon'] == $option['value']) {
               $selected = 'selected="selected"';
             } else {
               $selected = '';
             }
             echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $option['label'] . '</option>' ."\n";
           endforeach;
      ?>
     </select>
     <h4 class="theme_option_headline2"><?php _e('Color setting', 'tcd-w');  ?></h4>
     <p><input type="text" name="dp_options[loader_color1]" value="<?php echo esc_attr( $options['loader_color1'] ); ?>" data-default-color="#b0cfd2" class="c-color-picker"></p>
     <p><input type="text" name="dp_options[loader_color2]" value="<?php echo esc_attr( $options['loader_color2'] ); ?>" data-default-color="#6698a1" class="c-color-picker"></p>
     <h4 class="theme_option_headline2"><?php _e('Maximum display time', 'tcd-w');  ?></h4>
     <p><?php _e('Please set the maximum display time of the loading screen.<br />Even if all the content is not loaded, loading screen will disappear automatically after a lapse of time you have set at follwing.', 'tcd-w'); ?></p>
     <select name="dp_options[load_time]">
      <?php
           foreach ( $load_time_options as $option ) :
           $label = $option['label'];
           $selected = '';
           if ( $options['load_time'] == $option['value']) {
             $selected = 'selected="selected"';
           } else {
             $selected = '';
           }
           echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
           endforeach;
      ?>
     </select>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // Google Map ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
		<h3 class="theme_option_headline"><?php _e( 'Google Maps settings', 'tcd-w' );  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e( 'API key', 'tcd-w' ); ?></h4>
     <input type="text" class="regular-text" name="dp_options[gmap_api_key]" value="<?php echo esc_attr( $options['gmap_api_key'] ); ?>">
     <h4 class="theme_option_headline2"><?php _e( 'Marker type', 'tcd-w' ); ?></h4>
     <?php foreach ( $gmap_marker_type_options as $option ) : ?>
     <p><label id="gmap_marker_type_button_<?php echo esc_attr( $option['value'] ); ?>"><input type="radio" name="dp_options[gmap_marker_type]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $option['value'], $options['gmap_marker_type'] ); ?>> <?php echo esc_html_e( $option['label'] ); ?></label></p>
     <?php endforeach; ?>
     <div id="gmap_marker_type2_area" style="<?php if($options['gmap_marker_type'] == 'type1'){ echo 'display:none;'; } else { echo 'display:block;'; }; ?>">
      <h4 class="theme_option_headline2"><?php _e( 'Custom marker type', 'tcd-w' ); ?></h4>
      <?php foreach ( $gmap_custom_marker_type_options as $option ) : ?>
      <p><label id="gmap_custom_marker_type_button_<?php echo esc_attr( $option['value'] ); ?>"><input type="radio" name="dp_options[gmap_custom_marker_type]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $option['value'], $options['gmap_custom_marker_type'] ); ?>> <?php echo esc_html_e( $option['label'] ); ?></label></p>
      <?php endforeach; ?>
      <div id="gmap_custom_marker_type1_area" style="<?php if ( $options['gmap_custom_marker_type'] == 'type1') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
       <h4 class="theme_option_headline2"><?php _e( 'Custom marker text', 'tcd-w' ); ?></h4>
       <input type="text" name="dp_options[gmap_marker_text]" value="<?php echo esc_attr( $options['gmap_marker_text'] ); ?>" class="regular-text">
       <p><label for="gmap_marker_color"><?php _e( 'Font color', 'tcd-w' ); ?></label> <input type="text" class="c-color-picker" name="dp_options[gmap_marker_color]" data-default-color="<?php echo esc_attr( $dp_default_options['gmap_marker_color'] ); ?>" value="<?php echo esc_attr( $options['gmap_marker_color'] ); ?>" id="gmap_marker_color"></p>
      </div>
      <div id="gmap_custom_marker_type2_area" style="<?php if ( $options['gmap_custom_marker_type'] == 'type1') { echo 'display:none;'; } else { echo 'display:block;'; }; ?>">
       <h4 class="theme_option_headline2"><?php _e( 'Custom marker image', 'tcd-w' ); ?></h4>
       <p><?php _e( 'Recommended size: width:60px, height:20px', 'tcd-w' ); ?></p>
       <div class="image_box cf">
      	<div class="cf cf_media_field hide-if-no-js gmap_marker_img">
         <input type="hidden" value="<?php echo esc_attr( $options['gmap_marker_img'] ); ?>" id="gmap_marker_img" name="dp_options[gmap_marker_img]" class="cf_media_id">
         <div class="preview_field"><?php if ( $options['gmap_marker_img'] ) { echo wp_get_attachment_image($options['gmap_marker_img'], 'medium' ); } ?></div>
         <div class="button_area">
          <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $options['gmap_marker_img'] ) { echo 'hidden'; } ?>">
         </div>
        </div>
       </div>
      </div>
     </div>
     <h4 class="theme_option_headline2"><?php _e( 'Marker style', 'tcd-w' ); ?></h4>
     <p><label for=""> <?php _e( 'Background color', 'tcd-w' ); ?></label> <input type="text" class="c-color-picker" name="dp_options[gmap_marker_bg]" data-default-color="<?php echo esc_attr( $dp_default_options['gmap_marker_bg'] ); ?>" value="<?php echo esc_attr( $options['gmap_marker_bg'] ); ?>"></p>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


  <?php // Custom head/script ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e( 'Free input area for user definition scripts.', 'tcd-w' ); ?></h3>
    <div class="theme_option_field_ac_content">
      <p><?php esc_html_e( 'Custom Script will output the end of the <head> tag. Please insert scripts (i.e. Google Analytics script), including <script>tag.', 'tcd-w' ); ?></p>
     <textarea id="dp_options[custom_head]" class="large-text" cols="50" rows="10" name="dp_options[custom_head]"><?php echo esc_textarea( $options['custom_head'] ); ?></textarea>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // ユーザーCSS用の自由記入欄 ----------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Free input area for user definition CSS.', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><?php _e('Code example:<br /><strong>.example { font-size:12px; }</strong>', 'tcd-w');  ?></p>
     <textarea id="dp_options[css_code]" class="large-text" cols="50" rows="10" name="dp_options[css_code]"><?php echo esc_textarea( $options['css_code'] ); ?></textarea>
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
function add_basic_theme_options_validate( $input ) {

  global $dp_default_options, $sns_type_options, $load_time_options, $load_icon_type, $font_type_options, $post_type_options, $layout_options, $gmap_marker_type_options, $gmap_custom_marker_type_options, $hover_type_options, $hover2_direct_options;


  //色の設定
  $input['main_color'] = wp_filter_nohtml_kses( $input['main_color'] );
  $input['secondary_color'] = wp_filter_nohtml_kses( $input['secondary_color'] );
  $input['base_font_color'] = wp_filter_nohtml_kses( $input['base_font_color'] );
  $input['headline_font_color'] = wp_filter_nohtml_kses( $input['headline_font_color'] );
  $input['content_link_color'] = wp_filter_nohtml_kses( $input['content_link_color'] );

  $input['square_headline_title_color'] = wp_filter_nohtml_kses( $input['square_headline_title_color'] );
  $input['square_headline_subtitle_color'] = wp_filter_nohtml_kses( $input['square_headline_subtitle_color'] );
  $input['square_headline_bg_color'] = wp_filter_nohtml_kses( $input['square_headline_bg_color'] );


  // レイアウト
  if ( ! isset( $input['layout'] ) )
    $input['layout'] = null;
  if ( ! array_key_exists( $input['layout'], $layout_options ) )
    $input['layout'] = null;


  // フォントの種類
  if ( ! isset( $input['font_type'] ) )
    $input['font_type'] = null;
  if ( ! array_key_exists( $input['font_type'], $font_type_options ) )
    $input['font_type'] = null;
  if ( ! isset( $input['headline_font_type'] ) )
    $input['headline_font_type'] = null;
  if ( ! array_key_exists( $input['headline_font_type'], $font_type_options ) )
    $input['headline_font_type'] = null;


  // アニメーションの設定
  if ( ! isset( $input['hover_type'] ) )
    $input['hover_type'] = null;
  if ( ! array_key_exists( $input['hover_type'], $hover_type_options ) )
    $input['hover_type'] = null;
  $input['hover1_zoom'] = wp_filter_nohtml_kses( $input['hover1_zoom'] );
  if ( ! isset( $input['hover2_direct'] ) )
    $input['hover2_direct'] = null;
  if ( ! array_key_exists( $input['hover2_direct'], $hover2_direct_options ) )
    $input['hover2_direct'] = null;
  $input['hover2_opacity'] = wp_filter_nohtml_kses( $input['hover2_opacity'] );
  $input['hover3_opacity'] = wp_filter_nohtml_kses( $input['hover3_opacity'] );
  $input['hover3_bgcolor'] = wp_filter_nohtml_kses( $input['hover3_bgcolor'] );


  // ファビコン
  $input['favicon'] = wp_filter_nohtml_kses( $input['favicon'] );


  // Facebook OGPの設定
  if ( ! isset( $input['use_ogp'] ) )
    $input['use_ogp'] = null;
    $input['use_ogp'] = ( $input['use_ogp'] == 1 ? 1 : 0 );
  $input['ogp_image'] = wp_filter_nohtml_kses( $input['ogp_image'] );
 	$input['fb_app_id'] = wp_filter_nohtml_kses( $input['fb_app_id'] );


  // Twitter Cardsの設定
  if ( ! isset( $input['use_twitter_card'] ) )
    $input['use_twitter_card'] = null;
    $input['use_twitter_card'] = ( $input['use_twitter_card'] == 1 ? 1 : 0 );
  $input['twitter_account_name'] = wp_filter_nohtml_kses( $input['twitter_account_name'] );


  // オリジナルスタイルの設定
  $input['css_code'] = $input['css_code'];

  // custom script
  $input['custom_head'] = $input['custom_head'];

  // 絵文字の設定
  if ( ! isset( $input['use_emoji'] ) )
    $input['use_emoji'] = null;
    $input['use_emoji'] = ( $input['use_emoji'] == 1 ? 1 : 0 );


  // ロードアイコンの設定
  if ( ! isset( $input['use_load_icon'] ) )
    $input['use_load_icon'] = null;
    $input['use_load_icon'] = ( $input['use_load_icon'] == 1 ? 1 : 0 );
  if ( ! isset( $input['load_time'] ) )
    $input['load_time'] = null;
  if ( ! array_key_exists( $input['load_time'], $load_time_options ) )
    $input['load_time'] = null;
  if ( ! isset( $input['load_icon'] ) )
    $input['load_icon'] = null;
  if ( ! array_key_exists( $input['load_icon'], $load_icon_type ) )
    $input['load_icon'] = 'type1';
  $input['loader_color1'] = wp_filter_nohtml_kses( $input['loader_color1'] );
  $input['loader_color2'] = wp_filter_nohtml_kses( $input['loader_color2'] );


  // クイックタグの設定
  if ( ! isset( $input['use_quicktags'] ) )
    $input['use_quicktags'] = null;
    $input['use_quicktags'] = ( $input['use_quicktags'] == 1 ? 1 : 0 );


  // NO IMAGE
  $input['no_image2'] = wp_filter_nohtml_kses( $input['no_image2'] );


  // Google Maps 
 	$input['gmap_api_key'] = wp_filter_nohtml_kses( $input['gmap_api_key'] );
 	if ( ! isset( $input['gmap_marker_type'] ) ) $input['gmap_marker_type'] = null;
 	if ( ! array_key_exists( $input['gmap_marker_type'], $gmap_marker_type_options ) ) $input['gmap_marker_type'] = null;
 	if ( ! isset( $input['gmap_custom_marker_type'] ) ) $input['gmap_custom_marker_type'] = null;
 	if ( ! array_key_exists( $input['gmap_custom_marker_type'], $gmap_custom_marker_type_options ) ) $input['gmap_custom_marker_type'] = null;
 	$input['gmap_marker_text'] = wp_filter_nohtml_kses( $input['gmap_marker_text'] );
 	$input['gmap_marker_color'] = wp_filter_nohtml_kses( $input['gmap_marker_color'] );
 	$input['gmap_marker_img'] = wp_filter_nohtml_kses( $input['gmap_marker_img'] );


  // SNSルボタン　上部
  if ( ! isset( $input['sns_type_top'] ) )
    $input['sns_type_top'] = null;
  if ( ! array_key_exists( $input['sns_type_top'], $sns_type_options ) )
    $input['sns_type_top'] = null;
  if ( ! isset( $input['show_twitter_top'] ) )
    $input['show_twitter_top'] = null;
    $input['show_twitter_top'] = ( $input['show_twitter_top'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_fblike_top'] ) )
    $input['show_fblike_top'] = null;
    $input['show_fblike_top'] = ( $input['show_fblike_top'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_fbshare_top'] ) )
    $input['show_fbshare_top'] = null;
    $input['show_fbshare_top'] = ( $input['show_fbshare_top'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_google_top'] ) )
    $input['show_google_top'] = null;
    $input['show_google_top'] = ( $input['show_google_top'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_hatena_top'] ) )
    $input['show_hatena_top'] = null;
    $input['show_hatena_top'] = ( $input['show_hatena_top'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_pocket_top'] ) )
    $input['show_pocket_top'] = null;
    $input['show_pocket_top'] = ( $input['show_pocket_top'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_feedly_top'] ) )
    $input['show_feedly_top'] = null;
    $input['show_feedly_top'] = ( $input['show_feedly_top'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_rss_top'] ) )
    $input['show_rss_top'] = null;
    $input['show_rss_top'] = ( $input['show_rss_top'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_pinterest_top'] ) )
    $input['show_pinterest_top'] = null;
    $input['show_pinterest_top'] = ( $input['show_pinterest_top'] == 1 ? 1 : 0 );


  // SNSボタン　下部
  if ( ! isset( $input['sns_type_btm'] ) )
    $input['sns_type_btm'] = null;
  if ( ! array_key_exists( $input['sns_type_btm'], $sns_type_options ) )
    $input['sns_type_btm'] = null;
  if ( ! isset( $input['show_twitter_btm'] ) )
    $input['show_twitter_btm'] = null;
    $input['show_twitter_btm'] = ( $input['show_twitter_btm'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_fblike_btm'] ) )
    $input['show_fblike_btm'] = null;
    $input['show_fblike_btm'] = ( $input['show_fblike_btm'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_fbshare_btm'] ) )
    $input['show_fbshare_btm'] = null;
    $input['show_fbshare_btm'] = ( $input['show_fbshare_btm'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_google_btm'] ) )
    $input['show_google_btm'] = null;
    $input['show_google_btm'] = ( $input['show_google_btm'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_hatena_btm'] ) )
    $input['show_hatena_btm'] = null;
    $input['show_hatena_btm'] = ( $input['show_hatena_btm'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_pocket_btm'] ) )
    $input['show_pocket_btm'] = null;
    $input['show_pocket_btm'] = ( $input['show_pocket_btm'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_feedly_btm'] ) )
    $input['show_feedly_btm'] = null;
    $input['show_feedly_btm'] = ( $input['show_feedly_btm'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_rss_btm'] ) )
    $input['show_rss_btm'] = null;
    $input['show_rss_btm'] = ( $input['show_rss_btm'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_pinterest_btm'] ) )
    $input['show_pinterest_btm'] = null;
    $input['show_pinterest_btm'] = ( $input['show_pinterest_btm'] == 1 ? 1 : 0 );

  // SNSボタン　Twitterボタン
 	$input['twitter_info'] = wp_filter_nohtml_kses( $input['twitter_info'] );


	return $input;

};


?>