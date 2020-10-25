<?php
/*
 * お知らせの設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_news_dp_default_options' );


// Add label of logo tab
add_action( 'tcd_tab_labels', 'add_news_tab_label' );


// Add HTML of logo tab
add_action( 'tcd_tab_panel', 'add_news_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_news_theme_options_validate' );


// タブの名前
function add_news_tab_label( $tab_labels ) {
	$tab_labels['news'] = __( 'News', 'tcd-w' );
	return $tab_labels;
}


// 初期値
function add_news_dp_default_options( $dp_default_options ) {

  //基本設定
	$dp_default_options['news_slug'] = 'news';
	$dp_default_options['bc_news_title'] = __( 'News', 'tcd-w' );

	// アーカイブページ
	$dp_default_options['archive_news_title'] = __( 'News', 'tcd-w' );
	$dp_default_options['archive_news_sub_title'] = 'INFORMATION';
	$dp_default_options['archive_news_headline'] = __( 'Here is a news catchphrase.', 'tcd-w' );
	$dp_default_options['archive_news_headline_font_size'] = '36';
	$dp_default_options['archive_news_desc'] = __( 'Here is a news description. Here is a news description. Here is a news description.', 'tcd-w' ) . "\n" . __( 'Here is a news description. Here is a news description. Here is a news description.', 'tcd-w' );
	$dp_default_options['archive_news_image'] = false;
	$dp_default_options['archive_news_num'] = '10';
	$dp_default_options['archive_news_title_font_size'] = '28';
	$dp_default_options['archive_news_sub_title_font_size'] = '16';
	$dp_default_options['archive_news_title_font_size_mobile'] = '18';
	$dp_default_options['archive_news_sub_title_font_size_mobile'] = '14';

	// 記事ページフォント
	$dp_default_options['news_title_font_size'] = '32';
	$dp_default_options['news_content_font_size'] = '14';
	$dp_default_options['news_title_font_size_mobile'] = '18';
	$dp_default_options['news_content_font_size_mobile'] = '13';
	$dp_default_options['news_title_color'] = '#000000';
	$dp_default_options['news_content_color'] = '#666666';

	// 記事ページその他
	$dp_default_options['show_news_next_post'] = 1;
	$dp_default_options['show_news_recent_list'] = 1;
	$dp_default_options['show_news_sns_top'] = 1;
	$dp_default_options['show_news_sns_btm'] = 1;
	$dp_default_options['single_news_recent_headline'] = __( 'Recent news', 'tcd-w' );
	$dp_default_options['single_news_recent_link'] = __( 'News archive', 'tcd-w' );

	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_news_tab_panel( $options ) {

  global $dp_default_options;

?>

<div id="tab-content-news" class="tab-content">


   <?php // 基本設定 -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Basic setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Slug setting', 'tcd-w');  ?></h4>
     <div class="theme_option_message">
      <p><?php _e('Please enter word by alphabet only.<br />After changing slug, please update permalink setting form <a href="./options-permalink.php"><strong>permalink option page</strong></a>.', 'tcd-w'); ?></p>
     </div>
     <p><input id="dp_options[news_slug]" class="hankaku regular-text" type="text" name="dp_options[news_slug]" value="<?php echo sanitize_title( $options['news_slug'] ); ?>" /></p>
     <h4 class="theme_option_headline2"><?php _e('Breadcrumb link title', 'tcd-w');  ?></h4>
     <input id="dp_options[bc_news_title]" class="regular-text" type="text" name="dp_options[bc_news_title]" value="<?php echo esc_attr( $options['bc_news_title'] ); ?>" />
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
     <input id="dp_options[archive_news_title]" class="regular-text" type="text" name="dp_options[archive_news_title]" value="<?php echo esc_attr( $options['archive_news_title'] ); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Sub title', 'tcd-w');  ?></h4>
     <input id="dp_options[archive_news_sub_title]" class="regular-text" type="text" name="dp_options[archive_news_sub_title]" value="<?php echo esc_attr( $options['archive_news_sub_title'] ); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Font size setting', 'tcd-w');  ?></h4>
     <p><?php _e('Title', 'tcd-w');  ?> <input id="dp_options[archive_news_title_font_size]" class="font_size hankaku" type="text" name="dp_options[archive_news_title_font_size]" value="<?php esc_attr_e( $options['archive_news_title_font_size'] ); ?>" /><span>px</span></p>
     <p><?php _e('Sub title', 'tcd-w');  ?> <input id="dp_options[archive_news_sub_title_font_size]" class="font_size hankaku" type="text" name="dp_options[archive_news_sub_title_font_size]" value="<?php esc_attr_e( $options['archive_news_sub_title_font_size'] ); ?>" /><span>px</span></p>
     <p><?php _e('Title for mobile device', 'tcd-w');  ?> <input id="dp_options[archive_news_title_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[archive_news_title_font_size_mobile]" value="<?php esc_attr_e( $options['archive_news_title_font_size_mobile'] ); ?>" /><span>px</span></p>
     <p><?php _e('Sub title for mobile device', 'tcd-w');  ?> <input id="dp_options[archive_news_sub_title_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[archive_news_sub_title_font_size_mobile]" value="<?php esc_attr_e( $options['archive_news_sub_title_font_size_mobile'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Image', 'tcd-w'); ?></h4>
     <p><?php _e( 'Recommend image size. Width:1450px, Height:440px', 'tcd-w' ); ?></p>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js archive_news_image">
       <input type="hidden" value="<?php echo esc_attr( $options['archive_news_image'] ); ?>" id="archive_news_image" name="dp_options[archive_news_image]" class="cf_media_id">
       <div class="preview_field"><?php if($options['archive_news_image']){ echo wp_get_attachment_image($options['archive_news_image'], 'medium'); }; ?></div>
       <div class="buttton_area">
        <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
        <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['archive_news_image']){ echo 'hidden'; }; ?>">
       </div>
      </div>
     </div>
     <h4 class="theme_option_headline2"><?php _e('Catchphrase', 'tcd-w');  ?></h4>
     <textarea id="dp_options[archive_news_headline]" class="large-text" cols="50" rows="2" name="dp_options[archive_news_headline]"><?php echo esc_textarea( $options['archive_news_headline'] ); ?></textarea>
     <h4 class="theme_option_headline2"><?php _e('Font size of catchphrase', 'tcd-w');  ?></h4>
     <p><input id="dp_options[archive_news_headline_font_size]" class="font_size hankaku" type="text" name="dp_options[archive_news_headline_font_size]" value="<?php esc_attr_e( $options['archive_news_headline_font_size'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Description', 'tcd-w');  ?></h4>
     <textarea id="dp_options[archive_news_desc]" class="large-text" cols="50" rows="4" name="dp_options[archive_news_desc]"><?php echo esc_textarea( $options['archive_news_desc'] ); ?></textarea>
     <h4 class="theme_option_headline2"><?php _e('Number of post to display', 'tcd-w');  ?></h4>
     <p><input id="dp_options[archive_news_num]" class="font_size hankaku" type="text" name="dp_options[archive_news_num]" value="<?php esc_attr_e( $options['archive_news_num'] ); ?>" /></p>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


   <?php // 詳細ページの設定 -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Post page setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <h4 class="theme_option_headline2"><?php _e('Font size setting', 'tcd-w');  ?></h4>
     <p><?php _e('Post title', 'tcd-w');  ?> <input id="dp_options[news_title_font_size]" class="font_size hankaku" type="text" name="dp_options[news_title_font_size]" value="<?php esc_attr_e( $options['news_title_font_size'] ); ?>" /><span>px</span></p>
     <p><?php _e('Post content', 'tcd-w');  ?> <input id="dp_options[news_content_font_size]" class="font_size hankaku" type="text" name="dp_options[news_content_font_size]" value="<?php esc_attr_e( $options['news_content_font_size'] ); ?>" /><span>px</span></p>
     <p><?php _e('Post title for mobile device', 'tcd-w');  ?> <input id="dp_options[news_title_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[news_title_font_size_mobile]" value="<?php esc_attr_e( $options['news_title_font_size_mobile'] ); ?>" /><span>px</span></p>
     <p><?php _e('Post content for mobile device', 'tcd-w');  ?> <input id="dp_options[news_content_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[news_content_font_size_mobile]" value="<?php esc_attr_e( $options['news_content_font_size_mobile'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Color setting', 'tcd-w');  ?></h4>
     <p><?php _e('Post title', 'tcd-w');  ?> <input type="text" name="dp_options[news_title_color]" value="<?php echo esc_attr( $options['news_title_color'] ); ?>" data-default-color="#000000" class="c-color-picker"></p>
     <p><?php _e('Post content', 'tcd-w');  ?> <input type="text" name="dp_options[news_content_color]" value="<?php echo esc_attr( $options['news_content_color'] ); ?>" data-default-color="#666666" class="c-color-picker"></p>
     <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
     <ul>
      <li><label><input id="dp_options[show_news_sns_top]" name="dp_options[show_news_sns_top]" type="checkbox" value="1" <?php checked( '1', $options['show_news_sns_top'] ); ?> /> <?php _e('Display social button under post title area', 'tcd-w');  ?></label></li>
      <li><label><input id="dp_options[show_news_sns_btm]" name="dp_options[show_news_sns_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_news_sns_btm'] ); ?> /> <?php _e('Display social button under post content', 'tcd-w');  ?></label></li>
      <li><label><input id="dp_options[show_news_next_post]" name="dp_options[show_news_next_post]" type="checkbox" value="1" <?php checked( '1', $options['show_news_next_post'] ); ?> /> <?php _e('Display next prev link', 'tcd-w');  ?></label></li>
      <li><label><input id="dp_options[show_news_recent_list]" name="dp_options[show_news_recent_list]" type="checkbox" value="1" <?php checked( '1', $options['show_news_recent_list'] ); ?> /> <?php _e('Display recent news list', 'tcd-w');  ?></label></li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Recent news list setting', 'tcd-w');  ?></h4>
     <p><?php _e('Headline', 'tcd-w');  ?> <input id="dp_options[single_news_recent_headline]" class="regular-text" type="text" name="dp_options[single_news_recent_headline]" value="<?php echo esc_attr( $options['single_news_recent_headline'] ); ?>" /></p>
     <p><?php _e('Archive page link', 'tcd-w');  ?> <input id="dp_options[single_news_recent_link]" class="regular-text" type="text" name="dp_options[single_news_recent_link]" value="<?php echo esc_attr( $options['single_news_recent_link'] ); ?>" /></p>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


</div><!-- END .tab-content -->

<?php
} // END add_news_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_news_theme_options_validate( $input ) {

  global $dp_default_options;

  //基本設定
  $input['news_slug'] = sanitize_title( $input['news_slug'] );
  $input['bc_news_title'] = wp_filter_nohtml_kses( $input['bc_news_title'] );


  //アーカイブの設定
  $input['archive_news_title'] = wp_filter_nohtml_kses( $input['archive_news_title'] );
  $input['archive_news_sub_title'] = wp_filter_nohtml_kses( $input['archive_news_sub_title'] );
  $input['archive_news_image'] = wp_filter_nohtml_kses( $input['archive_news_image'] );
  $input['archive_news_headline'] = wp_filter_nohtml_kses( $input['archive_news_headline'] );
  $input['archive_news_headline_font_size'] = wp_filter_nohtml_kses( $input['archive_news_headline_font_size'] );
  $input['archive_news_desc'] = wp_filter_nohtml_kses( $input['archive_news_desc'] );
  $input['archive_news_num'] = wp_filter_nohtml_kses( $input['archive_news_num'] );
  $input['archive_news_title_font_size'] = wp_filter_nohtml_kses( $input['archive_news_title_font_size'] );
  $input['archive_news_sub_title_font_size'] = wp_filter_nohtml_kses( $input['archive_news_sub_title_font_size'] );
  $input['archive_news_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_news_title_font_size_mobile'] );
  $input['archive_news_sub_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['archive_news_sub_title_font_size_mobile'] );


  // 記事ページ　フォントサイズ
  $input['news_title_font_size'] = wp_filter_nohtml_kses( $input['news_title_font_size'] );
  $input['news_content_font_size'] = wp_filter_nohtml_kses( $input['news_content_font_size'] );
  $input['news_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['news_title_font_size_mobile'] );
  $input['news_content_font_size_mobile'] = wp_filter_nohtml_kses( $input['news_content_font_size_mobile'] );
  $input['news_title_color'] = wp_filter_nohtml_kses( $input['news_title_color'] );
  $input['news_content_color'] = wp_filter_nohtml_kses( $input['news_content_color'] );


  //記事ページ　表示設定
  if ( ! isset( $input['show_news_next_post'] ) )
    $input['show_news_next_post'] = null;
    $input['show_news_next_post'] = ( $input['show_news_next_post'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_news_recent_list'] ) )
    $input['show_news_recent_list'] = null;
    $input['show_news_recent_list'] = ( $input['show_news_recent_list'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_news_sns_top'] ) )
    $input['show_news_sns_top'] = null;
    $input['show_news_sns_top'] = ( $input['show_news_sns_top'] == 1 ? 1 : 0 );
  if ( ! isset( $input['show_news_sns_btm'] ) )
    $input['show_news_sns_btm'] = null;
    $input['show_news_sns_btm'] = ( $input['show_news_sns_btm'] == 1 ? 1 : 0 );


  //記事ページ　その他
  $input['single_news_recent_headline'] = wp_filter_nohtml_kses( $input['single_news_recent_headline'] );
  $input['single_news_recent_link'] = wp_filter_nohtml_kses( $input['single_news_recent_link'] );


	return $input;

};


?>