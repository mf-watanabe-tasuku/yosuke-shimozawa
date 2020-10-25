<?php
/*
 * ブログの設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_blog_dp_default_options' );


//  Add label of blog tab
add_action( 'tcd_tab_labels', 'add_blog_tab_label' );


// Add HTML of blog tab
add_action( 'tcd_tab_panel', 'add_blog_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_blog_theme_options_validate' );


// タブの名前
function add_blog_tab_label( $tab_labels ) {
	$tab_labels['blog'] = __( 'Blog', 'tcd-w' );
	return $tab_labels;
}


// 初期値
function add_blog_dp_default_options( $dp_default_options ) {

	// アーカイブページ
	$dp_default_options['archive_blog_title'] = __( 'Blog', 'tcd-w' );
	$dp_default_options['archive_blog_sub_title'] = 'BLOG';
	$dp_default_options['archive_blog_headline'] = __( 'Here is a blog catchphrase.', 'tcd-w' );
	$dp_default_options['archive_blog_headline_font_size'] = '36';
	$dp_default_options['archive_blog_desc'] = __( 'Here is a blog description. Here is a blog description. Here is a blog description.', 'tcd-w' ) . "\n" . __( 'Here is a blog description. Here is a blog description. Here is a blog description.', 'tcd-w' );
	$dp_default_options['archive_blog_image'] = false;
	$dp_default_options['archive_blog_title_font_size'] = '28';
	$dp_default_options['archive_blog_sub_title_font_size'] = '16';
	$dp_default_options['archive_blog_title_font_size_mobile'] = '18';
	$dp_default_options['archive_blog_sub_title_font_size_mobile'] = '14';

	// 記事ページ
	$dp_default_options['title_font_size'] = '32';
	$dp_default_options['content_font_size'] = '14';
	$dp_default_options['title_font_size_mobile'] = '18';
	$dp_default_options['content_font_size_mobile'] = '13';
	$dp_default_options['blog_title_color'] = '#000000';
	$dp_default_options['blog_content_color'] = '#666666';
	$dp_default_options['show_date'] = 1;
	$dp_default_options['show_category'] = 1;
	$dp_default_options['show_tag'] = 1;
	$dp_default_options['show_comment'] = 1;
	$dp_default_options['show_author'] = 1;
	$dp_default_options['show_trackback'] = 1;
	$dp_default_options['show_next_post'] = 1;
	$dp_default_options['show_thumbnail'] = 1;
	$dp_default_options['show_related_post'] = 1;
	$dp_default_options['show_sns_top'] = 1;
	$dp_default_options['show_sns_btm'] = 1;
	$dp_default_options['related_headline'] = __( 'Related post', 'tcd-w' );
	$dp_default_options['pagenation_type'] = 'type1';

	// 記事ページのバナー
	for ( $i = 1; $i <= 2; $i++ ) {
		$dp_default_options['single_top_ad_code' . $i] = '';
		$dp_default_options['single_top_ad_image' . $i] = false;
		$dp_default_options['single_top_ad_url' . $i] = '';
	}
	for ( $i = 1; $i <= 2; $i++ ) {
		$dp_default_options['single_bottom_ad_code' . $i] = '';
		$dp_default_options['single_bottom_ad_image' . $i] = false;
		$dp_default_options['single_bottom_ad_url' . $i] = '';
	}
	for ( $i = 1; $i <= 2; $i++ ) {
		$dp_default_options['single_shortcode_ad_code' . $i] = '';
		$dp_default_options['single_shortcode_ad_image' . $i] = false;
		$dp_default_options['single_shortcode_ad_url' . $i] = '';
	}
	for ( $i = 1; $i <= 2; $i++ ) {
		$dp_default_options['single_mobile_ad_code' . $i] = '';
		$dp_default_options['single_mobile_ad_image' . $i] = false;
		$dp_default_options['single_mobile_ad_url' . $i] = '';
	}

	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_blog_tab_panel( $options ) {

  global $dp_default_options, $post_list_load_type_options, $post_list_num_options, $range_options, $pagenation_type_options;

?>

<div id="tab-content-blog" class="tab-content">


   <?php // アーカイブページの設定 -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Archive page setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Title', 'tcd-w');  ?></h4>
     <input id="dp_options[archive_blog_title]" class="regular-text" type="text" name="dp_options[archive_blog_title]" value="<?php echo esc_attr( $options['archive_blog_title'] ); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Sub title', 'tcd-w');  ?></h4>
     <input id="dp_options[archive_blog_sub_title]" class="regular-text" type="text" name="dp_options[archive_blog_sub_title]" value="<?php echo esc_attr( $options['archive_blog_sub_title'] ); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Font size setting', 'tcd-w');  ?></h4>
     <p><?php _e('Title', 'tcd-w');  ?> <input id="dp_options[archive_blog_title_font_size]" class="font_size hankaku" type="text" name="dp_options[archive_blog_title_font_size]" value="<?php esc_attr_e( $options['archive_blog_title_font_size'] ); ?>" /><span>px</span></p>
     <p><?php _e('Sub title', 'tcd-w');  ?> <input id="dp_options[archive_blog_sub_title_font_size]" class="font_size hankaku" type="text" name="dp_options[archive_blog_sub_title_font_size]" value="<?php esc_attr_e( $options['archive_blog_sub_title_font_size'] ); ?>" /><span>px</span></p>
     <p><?php _e('Title for mobile device', 'tcd-w');  ?> <input id="dp_options[archive_blog_title_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[archive_blog_title_font_size_mobile]" value="<?php esc_attr_e( $options['archive_blog_title_font_size_mobile'] ); ?>" /><span>px</span></p>
     <p><?php _e('Sub title for mobile device', 'tcd-w');  ?> <input id="dp_options[archive_blog_sub_title_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[archive_blog_sub_title_font_size_mobile]" value="<?php esc_attr_e( $options['archive_blog_sub_title_font_size_mobile'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Image', 'tcd-w'); ?></h4>
     <p><?php _e( 'Recommend image size. Width:1450px, Height:440px', 'tcd-w' ); ?></p>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js archive_blog_image">
       <input type="hidden" value="<?php echo esc_attr( $options['archive_blog_image'] ); ?>" id="archive_blog_image" name="dp_options[archive_blog_image]" class="cf_media_id">
       <div class="preview_field"><?php if($options['archive_blog_image']){ echo wp_get_attachment_image($options['archive_blog_image'], 'medium'); }; ?></div>
       <div class="buttton_area">
        <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
        <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['archive_blog_image']){ echo 'hidden'; }; ?>">
       </div>
      </div>
     </div>
     <h4 class="theme_option_headline2"><?php _e('Catchphrase', 'tcd-w');  ?></h4>
     <textarea id="dp_options[archive_blog_headline]" class="large-text" cols="50" rows="2" name="dp_options[archive_blog_headline]"><?php echo esc_textarea( $options['archive_blog_headline'] ); ?></textarea>
     <h4 class="theme_option_headline2"><?php _e('Font size of catchphrase', 'tcd-w');  ?></h4>
     <p><input id="dp_options[archive_blog_headline_font_size]" class="font_size hankaku" type="text" name="dp_options[archive_blog_headline_font_size]" value="<?php esc_attr_e( $options['archive_blog_headline_font_size'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Description', 'tcd-w');  ?></h4>
     <textarea id="dp_options[archive_blog_desc]" class="large-text" cols="50" rows="4" name="dp_options[archive_blog_desc]"><?php echo esc_textarea( $options['archive_blog_desc'] ); ?></textarea>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->

   <?php // 記事ページの設定 -------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Post page setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Font size setting', 'tcd-w');  ?></h4>
     <p><?php _e('Post title', 'tcd-w');  ?> <input id="dp_options[title_font_size]" class="font_size hankaku" type="text" name="dp_options[title_font_size]" value="<?php esc_attr_e( $options['title_font_size'] ); ?>" /><span>px</span></p>
     <p><?php _e('Post content', 'tcd-w');  ?> <input id="dp_options[content_font_size]" class="font_size hankaku" type="text" name="dp_options[content_font_size]" value="<?php esc_attr_e( $options['content_font_size'] ); ?>" /><span>px</span></p>
     <p><?php _e('Post title for mobile device', 'tcd-w');  ?> <input id="dp_options[title_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[title_font_size_mobile]" value="<?php esc_attr_e( $options['title_font_size_mobile'] ); ?>" /><span>px</span></p>
     <p><?php _e('Post content for mobile device', 'tcd-w');  ?> <input id="dp_options[content_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[content_font_size_mobile]" value="<?php esc_attr_e( $options['content_font_size_mobile'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Color setting', 'tcd-w');  ?></h4>
     <p><?php _e('Post title', 'tcd-w');  ?> <input type="text" name="dp_options[blog_title_color]" value="<?php echo esc_attr( $options['blog_title_color'] ); ?>" data-default-color="#000000" class="c-color-picker"></p>
     <p><?php _e('Post content', 'tcd-w');  ?> <input type="text" name="dp_options[blog_content_color]" value="<?php echo esc_attr( $options['blog_content_color'] ); ?>" data-default-color="#666666" class="c-color-picker"></p>
     <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
     <ul>
      <li><label><input id="dp_options[show_date]" name="dp_options[show_date]" type="checkbox" value="1" <?php checked( '1', $options['show_date'] ); ?> /> <?php _e('Display date', 'tcd-w');  ?></label></li>
      <li><label><input id="dp_options[show_category]" name="dp_options[show_category]" type="checkbox" value="1" <?php checked( '1', $options['show_category'] ); ?> /> <?php _e('Display category', 'tcd-w');  ?></label></li>
      <li><label><input id="dp_options[show_tag]" name="dp_options[show_tag]" type="checkbox" value="1" <?php checked( '1', $options['show_tag'] ); ?> /> <?php _e('Display tags', 'tcd-w');  ?></label></li>
      <li><label><input id="dp_options[show_author]" name="dp_options[show_author]" type="checkbox" value="1" <?php checked( '1', $options['show_author'] ); ?> /> <?php _e('Display author', 'tcd-w');  ?></label></li>
      <li><label><input id="dp_options[show_thumbnail]" name="dp_options[show_thumbnail]" type="checkbox" value="1" <?php checked( '1', $options['show_thumbnail'] ); ?> /> <?php _e('Display thumbnail', 'tcd-w');  ?></label></li>
      <li><label><input id="dp_options[show_next_post]" name="dp_options[show_next_post]" type="checkbox" value="1" <?php checked( '1', $options['show_next_post'] ); ?> /> <?php _e('Display next previous post link', 'tcd-w');  ?></label></li>
      <li><label><input id="dp_options[show_comment]" name="dp_options[show_comment]" type="checkbox" value="1" <?php checked( '1', $options['show_comment'] ); ?> /> <?php _e('Display comment', 'tcd-w');  ?></label></li>
      <li><label><input id="dp_options[show_trackback]" name="dp_options[show_trackback]" type="checkbox" value="1" <?php checked( '1', $options['show_trackback'] ); ?> /> <?php _e('Display trackbacks', 'tcd-w');  ?></label></li>
      <li><label><input id="dp_options[show_related_post]" name="dp_options[show_related_post]" type="checkbox" value="1" <?php checked( '1', $options['show_related_post'] ); ?> /> <?php _e('Display related post', 'tcd-w');  ?></label></li>
      <li><label><input id="dp_options[show_sns_top]" name="dp_options[show_sns_top]" type="checkbox" value="1" <?php checked( '1', $options['show_sns_top'] ); ?> /> <?php _e('Display social button under post title area', 'tcd-w');  ?></label></li>
      <li><label><input id="dp_options[show_sns_btm]" name="dp_options[show_sns_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_sns_btm'] ); ?> /> <?php _e('Display social button under post content', 'tcd-w');  ?></label></li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Related post setting', 'tcd-w');  ?></h4>
     <p><span class="label"><?php _e('Headline', 'tcd-w');  ?></span><input id="dp_options[related_headline]" class="regular-text" type="text" name="dp_options[related_headline]" value="<?php esc_attr_e( $options['related_headline'] ); ?>" /></p>
     <h4 class="theme_option_headline2"><?php _e( 'Pagenation settings', 'tcd-w' ); ?></h4>
     <fieldset class="cf select_type2">
      <?php foreach ( $pagenation_type_options as $option ) : ?>
      <label><input type="radio" name="dp_options[pagenation_type]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $option['value'], $options['pagenation_type'] ); ?>><?php echo esc_html_e( $option['label'] ); ?></label>
      <?php endforeach; ?>
     </fieldset>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // 広告の登録（タイトルの下） -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Single page banner setup', 'tcd-w');  ?>1</h3>
    <div class="theme_option_field_ac_content">
     <p><?php _e('This banner will be displayed after post title.', 'tcd-w');  ?></p>
     <?php for($i = 1; $i <= 2; $i++) : ?>
     <div class="sub_box cf"> 
      <h3 class="theme_option_subbox_headline"><?php if($i == 1) { ?><?php _e('Left banner', 'tcd-w');  ?><?php } else { ?><?php _e('Right banner', 'tcd-w');  ?><?php }; ?></h3>
      <div class="sub_box_content">
       <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
       <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
       <textarea id="dp_options[single_top_ad_code<?php echo $i; ?>]" class="large-text" cols="50" rows="10" name="dp_options[single_top_ad_code<?php echo $i; ?>]"><?php echo esc_textarea( $options['single_top_ad_code'.$i] ); ?></textarea>
       <div class="theme_option_message">
        <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); ?></h4>
       <p><?php _e('Recommend image size. Width:300px Height:250px', 'tcd-w'); ?></p>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js single_top_ad_image<?php echo $i; ?>">
         <input type="hidden" value="<?php echo esc_attr( $options['single_top_ad_image'.$i] ); ?>" id="single_top_ad_image<?php echo $i; ?>" name="dp_options[single_top_ad_image<?php echo $i; ?>]" class="cf_media_id">
         <div class="preview_field"><?php if($options['single_top_ad_image'.$i]){ echo wp_get_attachment_image($options['single_top_ad_image'.$i], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['single_top_ad_image'.$i]){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
       <input id="dp_options[single_top_ad_url<?php echo $i; ?>]" class="regular-text" type="text" name="dp_options[single_top_ad_url<?php echo $i; ?>]" value="<?php esc_attr_e( $options['single_top_ad_url'.$i] ); ?>" />
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

   <?php // 広告の登録（本文の下） -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Single page banner setup', 'tcd-w');  ?>2</h3>
    <div class="theme_option_field_ac_content">
     <p><?php _e('This banner will be displayed under contents.', 'tcd-w');  ?></p>
     <?php for($i = 1; $i <= 2; $i++) : ?>
     <div class="sub_box cf"> 
      <h3 class="theme_option_subbox_headline"><?php if($i == 1) { ?><?php _e('Left banner', 'tcd-w');  ?><?php } else { ?><?php _e('Right banner', 'tcd-w');  ?><?php }; ?></h3>
      <div class="sub_box_content">
       <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
       <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
       <textarea id="dp_options[single_bottom_ad_code<?php echo $i; ?>]" class="large-text" cols="50" rows="10" name="dp_options[single_bottom_ad_code<?php echo $i; ?>]"><?php echo esc_textarea( $options['single_bottom_ad_code'.$i] ); ?></textarea>
       <div class="theme_option_message">
        <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); ?></h4>
       <p><?php _e('Recommend image size. Width:300px Height:250px', 'tcd-w'); ?></p>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js single_bottom_ad_image<?php echo $i; ?>">
         <input type="hidden" value="<?php echo esc_attr( $options['single_bottom_ad_image'.$i] ); ?>" id="single_bottom_ad_image<?php echo $i; ?>" name="dp_options[single_bottom_ad_image<?php echo $i; ?>]" class="cf_media_id">
         <div class="preview_field"><?php if($options['single_bottom_ad_image'.$i]){ echo wp_get_attachment_image($options['single_bottom_ad_image'.$i], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['single_bottom_ad_image'.$i]){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
       <input id="dp_options[single_bottom_ad_url<?php echo $i; ?>]" class="regular-text" type="text" name="dp_options[single_bottom_ad_url<?php echo $i; ?>]" value="<?php esc_attr_e( $options['single_bottom_ad_url'.$i] ); ?>" />
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

   <?php // 広告の登録（ショートコード） -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Single page banner setup', 'tcd-w');  ?>3</h3>
    <div class="theme_option_field_ac_content">
     <p><?php _e('Please copy and paste the short code inside the content to show this banner.', 'tcd-w'); ?></p>
     <p><?php _e('Short code', 'tcd-w');  ?> : <input type="text" readonly="readonly" value="[s_ad]" /></p>
     <?php for($i = 1; $i <= 2; $i++) : ?>
     <div class="sub_box cf"> 
      <h3 class="theme_option_subbox_headline"><?php if($i == 1) { ?><?php _e('Left banner', 'tcd-w');  ?><?php } else { ?><?php _e('Right banner', 'tcd-w');  ?><?php }; ?></h3>
      <div class="sub_box_content">
       <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
       <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
       <textarea id="dp_options[single_shortcode_ad_code<?php echo $i; ?>]" class="large-text" cols="50" rows="10" name="dp_options[single_shortcode_ad_code<?php echo $i; ?>]"><?php echo esc_textarea( $options['single_shortcode_ad_code'.$i] ); ?></textarea>
       <div class="theme_option_message">
        <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); ?></h4>
       <p><?php _e('Recommend image size. Width:300px Height:250px', 'tcd-w'); ?></p>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js single_shortcode_ad_image<?php echo $i; ?>">
         <input type="hidden" value="<?php echo esc_attr( $options['single_shortcode_ad_image'.$i] ); ?>" id="single_shortcode_ad_image<?php echo $i; ?>" name="dp_options[single_shortcode_ad_image<?php echo $i; ?>]" class="cf_media_id">
         <div class="preview_field"><?php if($options['single_shortcode_ad_image'.$i]){ echo wp_get_attachment_image($options['single_shortcode_ad_image'.$i], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['single_shortcode_ad_image'.$i]){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
       <input id="dp_options[single_shortcode_ad_url<?php echo $i; ?>]" class="regular-text" type="text" name="dp_options[single_shortcode_ad_url<?php echo $i; ?>]" value="<?php esc_attr_e( $options['single_shortcode_ad_url'.$i] ); ?>" />
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

   <?php // 広告の登録（スマホ専用） -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Mobile device banner setup', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><?php _e('This banner will be displayed on mobile device.', 'tcd-w');  ?></p>
     <?php for($i = 1; $i <= 2; $i++) : ?>
     <div class="sub_box cf"> 
      <h3 class="theme_option_subbox_headline"><?php if($i == 1) { ?><?php _e('Top banner', 'tcd-w');  ?><?php } else { ?><?php _e('Bottom banner', 'tcd-w');  ?><?php }; ?></h3>
      <div class="sub_box_content">
       <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
       <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
       <textarea id="dp_options[single_mobile_ad_code<?php echo $i; ?>]" class="large-text" cols="50" rows="10" name="dp_options[single_mobile_ad_code<?php echo $i; ?>]"><?php echo esc_textarea( $options['single_mobile_ad_code'.$i] ); ?></textarea>
       <div class="theme_option_message">
        <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); ?></h4>
       <p><?php _e('Recommend image size. Width:300px Height:250px', 'tcd-w'); ?></p>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js single_mobile_ad_image<?php echo $i; ?>">
         <input type="hidden" value="<?php echo esc_attr( $options['single_mobile_ad_image'.$i] ); ?>" id="single_mobile_ad_image<?php echo $i; ?>" name="dp_options[single_mobile_ad_image<?php echo $i; ?>]" class="cf_media_id">
         <div class="preview_field"><?php if($options['single_mobile_ad_image'.$i]){ echo wp_get_attachment_image($options['single_mobile_ad_image'.$i], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['single_mobile_ad_image'.$i]){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
       <input id="dp_options[single_mobile_ad_url<?php echo $i; ?>]" class="regular-text" type="text" name="dp_options[single_mobile_ad_url<?php echo $i; ?>]" value="<?php esc_attr_e( $options['single_mobile_ad_url'.$i] ); ?>" />
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


</div><!-- END .tab-content -->

<?php
} // END add_blog_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_blog_theme_options_validate( $input ) {

  global $dp_default_options, $post_list_load_type_options, $post_list_num_options, $range_options, $pagenation_type_options;


  // アーカイブページ
  $input['archive_blog_title'] = wp_filter_nohtml_kses( $input['archive_blog_title'] );
  $input['archive_blog_sub_title'] = wp_filter_nohtml_kses( $input['archive_blog_sub_title'] );
  $input['archive_blog_image'] = wp_filter_nohtml_kses( $input['archive_blog_image'] );
  $input['archive_blog_headline'] = wp_filter_nohtml_kses( $input['archive_blog_headline'] );
  $input['archive_blog_headline_font_size'] = wp_filter_nohtml_kses( $input['archive_blog_headline_font_size'] );
  $input['archive_blog_desc'] = wp_filter_nohtml_kses( $input['archive_blog_desc'] );
  $input['archive_blog_title_font_size'] = wp_filter_nohtml_kses( $input['archive_blog_title_font_size'] );
  $input['archive_blog_sub_title_font_size'] = wp_filter_nohtml_kses( $input['archive_blog_sub_title_font_size'] );
  $input['archive_blog_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_blog_title_font_size_mobile'] );
  $input['archive_blog_sub_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_blog_sub_title_font_size_mobile'] );


  // 記事ページのフォントサイズ
  $input['title_font_size'] = wp_filter_nohtml_kses( $input['title_font_size'] );
  $input['content_font_size'] = wp_filter_nohtml_kses( $input['content_font_size'] );
  $input['title_font_size_mobile'] = wp_filter_nohtml_kses( $input['title_font_size_mobile'] );
  $input['content_font_size_mobile'] = wp_filter_nohtml_kses( $input['content_font_size_mobile'] );
  $input['blog_title_color'] = wp_filter_nohtml_kses( $input['blog_title_color'] );
  $input['blog_content_color'] = wp_filter_nohtml_kses( $input['blog_content_color'] );


  // 記事ページの表示設定
  if ( ! isset( $input['show_date'] ) )
    $input['show_date'] = null;
    $input['show_date'] = ( $input['show_date'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_category'] ) )
    $input['show_category'] = null;
    $input['show_category'] = ( $input['show_category'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_tag'] ) )
    $input['show_tag'] = null;
    $input['show_tag'] = ( $input['show_tag'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_comment'] ) )
    $input['show_comment'] = null;
    $input['show_comment'] = ( $input['show_comment'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_trackback'] ) )
    $input['show_trackback'] = null;
    $input['show_trackback'] = ( $input['show_trackback'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_related_post'] ) )
    $input['show_related_post'] = null;
    $input['show_related_post'] = ( $input['show_related_post'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_next_post'] ) )
    $input['show_next_post'] = null;
    $input['show_next_post'] = ( $input['show_next_post'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_thumbnail'] ) )
    $input['show_thumbnail'] = null;
    $input['show_thumbnail'] = ( $input['show_thumbnail'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_author'] ) )
    $input['show_author'] = null;
    $input['show_author'] = ( $input['show_author'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_sns_top'] ) )
    $input['show_sns_top'] = null;
    $input['show_sns_top'] = ( $input['show_sns_top'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_sns_btm'] ) )
    $input['show_sns_btm'] = null;
    $input['show_sns_btm'] = ( $input['show_sns_btm'] == 1 ? 1 : 0 );


  // 記事ページ　その他
  $input['related_headline'] = wp_filter_nohtml_kses( $input['related_headline'] );
  if ( ! isset( $input['pagenation_type'] ) ) $input['pagenation_type'] = null;
  if ( ! array_key_exists( $input['pagenation_type'], $pagenation_type_options ) ) $input['pagenation_type'] = null;


  // 記事ページのバナー広告
  for ( $i = 1; $i <= 2; $i++ ) {
    $input['single_top_ad_code'.$i] = $input['single_top_ad_code'.$i];
    $input['single_top_ad_image'.$i] = wp_filter_nohtml_kses( $input['single_top_ad_image'.$i] );
    $input['single_top_ad_url'.$i] = wp_filter_nohtml_kses( $input['single_top_ad_url'.$i] );
  }
  for ( $i = 1; $i <= 2; $i++ ) {
    $input['single_bottom_ad_code'.$i] = $input['single_bottom_ad_code'.$i];
    $input['single_bottom_ad_image'.$i] = wp_filter_nohtml_kses( $input['single_bottom_ad_image'.$i] );
    $input['single_bottom_ad_url'.$i] = wp_filter_nohtml_kses( $input['single_bottom_ad_url'.$i] );
  }
  for ( $i = 1; $i <= 2; $i++ ) {
    $input['single_shortcode_ad_code'.$i] = $input['single_shortcode_ad_code'.$i];
    $input['single_shortcode_ad_image'.$i] = wp_filter_nohtml_kses( $input['single_shortcode_ad_image'.$i] );
    $input['single_shortcode_ad_url'.$i] = wp_filter_nohtml_kses( $input['single_shortcode_ad_url'.$i] );
  }
  for ( $i = 1; $i <= 2; $i++ ) {
    $input['single_mobile_ad_code'.$i] = $input['single_mobile_ad_code'.$i];
    $input['single_mobile_ad_image'.$i] = wp_filter_nohtml_kses( $input['single_mobile_ad_image'.$i] );
    $input['single_mobile_ad_url'.$i] = wp_filter_nohtml_kses( $input['single_mobile_ad_url'.$i] );
  }


	return $input;

};


?>