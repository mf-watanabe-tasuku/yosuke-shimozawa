<?php
/*
 * トップページの設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_front_page_dp_default_options' );


// Add label of front page tab
add_action( 'tcd_tab_labels', 'add_front_page_tab_label' );


// Add HTML of front page tab
add_action( 'tcd_tab_panel', 'add_front_page_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_front_page_theme_options_validate' );


// タブの名前
function add_front_page_tab_label( $tab_labels ) {
	$tab_labels['front_page'] = __( 'Front page', 'tcd-w' );
	return $tab_labels;
}


// 初期値
function add_front_page_dp_default_options( $dp_default_options ) {

	// 並び順
	$dp_default_options['index_contents_order'] = array(
		'index_3box',
		'index_intro',
		'index_news',
		'index_wide',
		'index_course',
		'index_blog',
		'index_gmap',
		'index_company',
		'index_free1',
		'index_free2',
		'index_headline_set1',
		'index_headline_set2',
		'index_headline_set3',
	);

	// ヘッダースライダー
	$dp_default_options['show_index_slider'] = 1;
	$dp_default_options['slider_time'] = '7000';
	$dp_default_options['index_slider'] = array();
	for ( $i = 1; $i <= 3; $i++ ) {
		$dp_default_options['index_slider'][] = array(
			'slider_type' => 'type1',
			'image' => false,
			'video' => false,
			'video_image' => false,
			'youtube' => '',
			'youtube_image' => false,
			'show_catch' => '1',
			'catch' => sprintf( __( 'Slider%s Catchphrase', 'tcd-w' ), $i ),
			'catch_font_type' => 'type1',
			'catch_font_size' => '38',
			'catch_font_size_mobile' => '28',
			'catch_color' => '#FFFFFF',
			'catch_shadow_a' => 0,
			'catch_shadow_b' => 0,
			'catch_shadow_c' => 0,
			'catch_shadow_color' => '#000000',
			'catch_direction' => 'type1',
			'use_overlay' => '',
			'overlay_color' => '#000000',
			'overlay_opacity' => '0.5',
			'url' => '',
			'target' => 1,
			'animation_type' => 'type3'
		);
	}

	// ３連ボックス
	$dp_default_options['show_index_3box'] = 1;
	for ( $i = 1; $i <= 3; $i++ ) {
		$dp_default_options['index_3box_image' . $i] = false;
		$dp_default_options['index_3box_title' . $i] = sprintf( __( 'Box%s', 'tcd-w' ), $i );
		$dp_default_options['index_3box_url' . $i] = '#';
		$dp_default_options['index_3box_target' . $i] = '';
	}

	// イントロ
	$dp_default_options['show_index_intro'] = 1;
	$dp_default_options['index_intro_headline'] = __( 'Introduction headline', 'tcd-w' );
	$dp_default_options['index_intro_headline_font_size'] = '40';
	$dp_default_options['index_intro_headline_font_size_mobile'] = '24';
	$dp_default_options['index_intro_desc'] = __( 'Here is a introduction description. Here is a introduction description. Here is a introduction description.', 'tcd-w' ) . "\n" . __( 'Here is a introduction description. Here is a introduction description. Here is a introduction description.', 'tcd-w' );
	$dp_default_options['index_intro_image'] = false;
	$dp_default_options['show_index_intro_button'] = 1;
	$dp_default_options['index_intro_button_url'] = '#';
	$dp_default_options['index_intro_button_target'] = 0;
	$dp_default_options['index_intro_button_label'] = __( 'Sample button', 'tcd-w' );
	$dp_default_options['index_intro_button_bg_color'] = '#FFFFFF';
	$dp_default_options['index_intro_button_bg_hover_color'] = '#6598a1';
	$dp_default_options['index_intro_button_text_color'] = '#676767';
	$dp_default_options['index_intro_button_text_hover_color'] = '#FFFFFF';

	// お知らせ一覧
	$dp_default_options['show_index_news'] = 1;
	$dp_default_options['index_news_headline'] = 'INFORMATION';
	$dp_default_options['index_news_headline_font_size'] = '40';
	$dp_default_options['index_news_headline_font_size_mobile'] = '24';
	$dp_default_options['index_news_sub_title'] = __( 'News', 'tcd-w' );
	$dp_default_options['index_news_button_label'] = __( 'News archive', 'tcd-w' );

	// ワイドコンテンツ
	$dp_default_options['show_index_wide'] = 1;
	$dp_default_options['index_wide_image'] = false;
	$dp_default_options['index_wide_headline'] = __( 'Wide content headline', 'tcd-w' );
	$dp_default_options['index_wide_headline_font_size'] = '40';
	$dp_default_options['index_wide_headline_font_size_mobile'] = '24';
	$dp_default_options['index_wide_headline_color'] = '#FFFFFF';
	$dp_default_options['show_index_wide_button'] = 1;
	$dp_default_options['index_wide_button_url'] = '#';
	$dp_default_options['index_wide_button_target'] = 0;
	$dp_default_options['index_wide_button_label'] = __( 'Sample button', 'tcd-w' );
	$dp_default_options['index_wide_button_bg_color'] = '#FFFFFF';
	$dp_default_options['index_wide_button_bg_hover_color'] = '#6598a1';
	$dp_default_options['index_wide_button_text_color'] = '#676767';
	$dp_default_options['index_wide_button_text_hover_color'] = '#FFFFFF';

	// 診療科目
	$dp_default_options['show_index_course'] = 1;
	$dp_default_options['index_course_headline'] = __( 'Course', 'tcd-w' );
	$dp_default_options['index_course_headline_font_size'] = '40';
	$dp_default_options['index_course_headline_font_size_mobile'] = '24';
	$dp_default_options['index_course_desc'] = __( 'Here is a course description. Here is a course description. Here is a course description.', 'tcd-w' ) . "\n" . __( 'Here is a course description. Here is a course description. Here is a course description.', 'tcd-w' );
	$dp_default_options['show_index_course_button'] = 1;
	$dp_default_options['index_course_button_label'] = __( 'Sample button', 'tcd-w' );
	$dp_default_options['index_course_layout'] = 'type1';
	$dp_default_options['index_course_cat'] = '';
	$dp_default_options['index_course_link'] = 'type1';

	// ブログ一覧
	$dp_default_options['show_index_blog'] = 1;
	$dp_default_options['index_blog_headline'] = 'BLOG';
	$dp_default_options['index_blog_headline_font_size'] = '40';
	$dp_default_options['index_blog_headline_font_size_mobile'] = '24';
	$dp_default_options['index_blog_sub_title'] = __( 'Blog', 'tcd-w' );
	$dp_default_options['index_blog_num'] ='8';
	$dp_default_options['index_blog_button_label'] = __( 'Blog archive', 'tcd-w' );

	// Google Map
	$dp_default_options['show_index_gmap'] = 0;
	$dp_default_options['index_gmap_headline'] = 'ACCESS';
	$dp_default_options['index_gmap_headline_font_size'] = 40;
	$dp_default_options['index_gmap_headline_font_size_mobile'] = 24;
	$dp_default_options['index_gmap_sub_title'] = __( 'Access', 'tcd-w' );
	$dp_default_options['index_gmap_address'] = '';
	$dp_default_options['index_gmap_saturation'] = -100;
	$dp_default_options['index_gmap_btn_label'] = '';
	$dp_default_options['index_gmap_btn_url'] = '';

	// 会社情報
	$dp_default_options['show_index_company'] = 1;
	$dp_default_options['index_company_image'] = false;
	$dp_default_options['index_company_image_retina'] = '';
	$dp_default_options['index_company_desc'] = __( 'Here is Company information such as address and telephone number.', 'tcd-w' );
	$dp_default_options['show_index_company_sns'] = 0;
	$dp_default_options['index_company_twitter_url'] = '';
	$dp_default_options['index_company_facebook_url'] = '';
	$dp_default_options['index_company_insta_url'] = '';
	$dp_default_options['index_company_pint_url'] = '';
	$dp_default_options['index_company_mail_url'] = '';
	$dp_default_options['show_index_company_schedule'] = 1;

	// フリースペース
	for ( $i = 1; $i <= 2; $i++ ) {
		$dp_default_options['show_index_free'.$i] = 0;
		$dp_default_options['index_free'.$i] = '';
	}

  // 見出しセット
	for ( $i = 1; $i <= 3; $i++ ) {
		$dp_default_options['show_index_headline_set'. $i] = 0;
		$dp_default_options['index_headline_set_headline' . $i] = '';
		$dp_default_options['index_headline_set_font_size' . $i] = 40;
		$dp_default_options['index_headline_set_font_size_mobile' . $i] = 24;
		$dp_default_options['index_headline_set_desc' . $i] = '';
	}

	// スケジュール
	$dp_default_options['schedule_color1'] = '#fafafa';
	$dp_default_options['schedule_color2'] = '#eff5f6';
	$dp_default_options['schedule'] = array(
		array(
			'header' => '',
			'col1' => __( 'Mon', 'tcd-w' ),
			'col2' => __( 'Tue', 'tcd-w' ),
			'col3' => __( 'Wed', 'tcd-w' ),
			'col4' => __( 'Thu', 'tcd-w' ),
			'col5' => __( 'Fri', 'tcd-w' ),
			'col6' => __( 'Sat', 'tcd-w' ),
			'col7' => __( 'Sun', 'tcd-w' )
		),
		array(
			'header' => __( 'AM', 'tcd-w' ),
			'col1' => '',
			'col2' => '',
			'col3' => '',
			'col4' => '',
			'col5' => '',
			'col6' => '',
			'col7' => ''
		),
		array(
			'header' => __( 'PM', 'tcd-w' ),
			'col1' => '',
			'col2' => '',
			'col3' => '',
			'col4' => '',
			'col5' => '',
			'col6' => '',
			'col7' => ''
		)
	);

	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_front_page_tab_panel( $options ) {

  global $dp_default_options, $slider_time_options, $slider_type_options, $font_type_options, $catch_direction_options, $index_course_layout_options, $slider_num_options, $index_course_link_options, $slider_animation_options ;

?>

<div id="tab-content-logo" class="tab-content">


   <?php // スライダーの設定 ------------------------------------------------------------ ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Slider setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><label><input id="dp_options[show_index_slider]" name="dp_options[show_index_slider]" type="checkbox" value="1" <?php checked( '1', $options['show_index_slider'] ); ?> /> <?php _e('Display slider', 'tcd-w');  ?></label></p>
     <div class="theme_option_message">
      <p><?php _e('Click add item button to start this option.<br />You can change order by dragging each headline of option field.', 'tcd-w');  ?></p>
     </div>
     <?php //繰り返しフィールド ----- ?>
     <div class="repeater-wrapper">
      <div class="repeater sortable" data-delete-confirm="<?php _e( 'Delete?', 'tcd-w' ); ?>">
       <?php
            if ( $options['index_slider'] ) :
              foreach ( $options['index_slider'] as $key => $value ) :
       ?>
       <div class="sub_box repeater-item repeater-item-<?php echo esc_attr( $key ); ?>">
        <h4 class="theme_option_subbox_headline"><?php if($value['catch']) { echo esc_html( $value['catch'] ); } else { _e( 'Item', 'tcd-w' ); }; ?></h4>
        <div class="sub_box_content">
         <h4 class="theme_option_headline2"><?php _e('Slider type', 'tcd-w');  ?></h4>
         <fieldset class="cf select_type2">
           <?php
                if ( ! isset( $checked ) )
                $checked = '';
                $i = 1;
                foreach ( $slider_type_options as $option ) {
                $slider_type_setting = $value['slider_type'];
                 if ( '' != $slider_type_setting ) {
                   if ( $value['slider_type'] == $option['value'] ) {
                     $checked = "checked=\"checked\"";
                   } else {
                     $checked = '';
                   }
                 }
           ?>
           <label class="slider_type_button<?php echo $i; ?>">
            <input type="radio" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][slider_type]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
            <?php echo $option['label']; ?>
           </label>
           <?php $i++; } ?>
         </fieldset>
         <?php // 画像 ----------------------- ?>
         <div class="index_slider_image_area" style="<?php if($value['slider_type'] == 'type1') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
          <h4 class="theme_option_headline2"><label for="dp_options[index_slider<?php echo esc_attr( $key ); ?>_image]"><?php _e( 'Image', 'tcd-w' ); ?></label></h4>
          <p><?php _e( 'Recommend image size. Width:1600px, Height:900px', 'tcd-w' ); ?></p>
          <div class="image_box cf">
           <div class="cf cf_media_field hide-if-no-js index_slider<?php echo esc_attr( $key ); ?>_image">
            <input type="hidden" value="<?php if($value['image']) { echo esc_attr( $value['image'] ); }; ?>" id="index_slider<?php echo esc_attr( $key ); ?>_image" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][image]" class="cf_media_id">
            <div class="preview_field"><?php if($value['image']){ echo wp_get_attachment_image($value['image'], 'medium'); }; ?></div>
            <div class="buttton_area">
             <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
             <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$value['image']){ echo 'hidden'; }; ?>">
            </div>
           </div>
          </div>
         </div><!-- END .index_slider_image_area -->
         <?php // video ----------------------- ?>
         <div class="index_slider_video_area" style="<?php if($value['slider_type'] == 'type2') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
          <h4 class="theme_option_headline2"><?php _e('Video setting', 'tcd-w');  ?></h4>
          <div class="cf cf_media_field hide-if-no-js index_slider<?php echo esc_attr( $key ); ?>_video">
           <input type="hidden" value="<?php if($value['video']) { echo esc_attr( $value['video'] ); }; ?>" id="index_slider<?php echo esc_attr( $key ); ?>_video" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][video]" class="cf_media_id">
           <div class="preview_field preview_field_video">
            <?php if($value['video']){ ?>
            <h4><?php _e( 'Uploaded MP4 file', 'tcd-w' ); ?></h4>
            <p><?php echo esc_url(wp_get_attachment_url($value['video'])); ?></p>
            <?php }; ?>
           </div>
           <div class="buttton_area">
            <input type="button" value="<?php _e('Select MP4 file', 'tcd-w'); ?>" class="cfmf-select-video button">
            <input type="button" value="<?php _e('Remove MP4 file', 'tcd-w'); ?>" class="cfmf-delete-video button <?php if(!$value['video']){ echo 'hidden'; }; ?>">
           </div>
          </div>
          <h4 class="theme_option_headline2"><?php _e('Substitute image', 'tcd-w');  ?></h4>
          <p><?php _e('This image will be displayed instead of video in smartphone.', 'tcd-w');  ?></p>
          <p><?php _e( 'Recommend image size. Width:1600px, Height:900px', 'tcd-w' ); ?></p>
          <div class="image_box cf">
           <div class="cf cf_media_field hide-if-no-js index_slider<?php echo esc_attr( $key ); ?>_video_image">
            <input type="hidden" value="<?php if($value['video_image']) { echo esc_attr( $value['video_image'] ); }; ?>" id="index_slider<?php echo esc_attr( $key ); ?>_video_image" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][video_image]" class="cf_media_id">
            <div class="preview_field"><?php if($value['video_image']){ echo wp_get_attachment_image($value['video_image'], 'medium'); }; ?></div>
            <div class="buttton_area">
             <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
             <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$value['video_image']){ echo 'hidden'; }; ?>">
            </div>
           </div>
          </div>
         </div><!-- END .index_slider_video_area -->
         <?php // youtube ----------------------- ?>
         <div class="index_slider_youtube_area" style="<?php if($value['slider_type'] == 'type3') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
          <h4 class="theme_option_headline2"><?php _e('Youtube setting', 'tcd-w');  ?></h4>
          <p><?php _e('Please enter Youtube URL.', 'tcd-w');  ?></p>
          <input class="regular-text" type="text" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][youtube]" value="<?php echo esc_attr( $value['youtube'] ); ?>">
          <h4 class="theme_option_headline2"><?php _e('Substitute image', 'tcd-w');  ?></h4>
          <p><?php _e('This image will be displayed instead of Youtube video in smartphone.', 'tcd-w');  ?></p>
          <p><?php _e( 'Recommend image size. Width:1600px, Height:900px', 'tcd-w' ); ?></p>
          <div class="image_box cf">
           <div class="cf cf_media_field hide-if-no-js index_slider<?php echo esc_attr( $key ); ?>_youtube_image">
            <input type="hidden" value="<?php if($value['youtube_image']) { echo esc_attr( $value['youtube_image'] ); }; ?>" id="index_slider<?php echo esc_attr( $key ); ?>_youtube_image" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][youtube_image]" class="cf_media_id">
            <div class="preview_field"><?php if($value['youtube_image']){ echo wp_get_attachment_image($value['youtube_image'], 'medium'); }; ?></div>
            <div class="buttton_area">
             <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
             <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$value['youtube_image']){ echo 'hidden'; }; ?>">
            </div>
           </div>
          </div>
         </div><!-- END .index_slider_youtube_area -->
         <?php // キャッチフレーズ ----------------------- ?>
         <div class="index_slider_catch">
          <h4 class="theme_option_headline2"><?php _e( 'Catchphrase setting', 'tcd-w' ); ?></h4>
          <p class="index_slider_show_catch_checkbox"><label><input name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][show_catch]" type="checkbox" value="1" <?php checked( $value['show_catch'], 1 ); ?>><?php _e( 'Display catchphrase', 'tcd-w' ); ?></label></p>
          <div class="index_slider_show_catch" style="<?php if($value['show_catch'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
           <textarea class="large-text" cols="50" rows="3" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][catch]"><?php echo esc_textarea(  $value['catch'] ); ?></textarea>
           <h4 class="theme_option_headline2"><?php _e('Font type of catchphrase', 'tcd-w');  ?></h4>
           <fieldset class="cf select_type2">
            <?php
                 if ( ! isset( $checked ) )
                 $checked = '';
                 foreach ( $font_type_options as $option ) {
                 $font_type_setting = $value['catch_font_type'];
                  if ( '' != $font_type_setting ) {
                    if ( $value['catch_font_type'] == $option['value'] ) {
                      $checked = "checked=\"checked\"";
                    } else {
                      $checked = '';
                    }
                  }
            ?>
            <label>
             <input type="radio" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][catch_font_type]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
             <?php echo $option['label']; ?>
            </label>
            <?php } ?>
           </fieldset>
           <h4 class="theme_option_headline2"><?php _e('Font size of catchphrase', 'tcd-w');  ?></h4>
           <p><input class="font_size hankaku" type="text" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][catch_font_size]" value="<?php echo esc_attr( $value['catch_font_size'] ); ?>" /><span>px</span></p>
           <h4 class="theme_option_headline2"><?php _e('Font size of catchphrase for mobile device', 'tcd-w');  ?></h4>
           <p><input class="font_size hankaku" type="text" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][catch_font_size_mobile]" value="<?php echo esc_attr( $value['catch_font_size_mobile'] ); ?>" /><span>px</span></p>
           <h4 class="theme_option_headline2"><?php _e('Dropshadow of catchphrase', 'tcd-w');  ?></h4>
           <ul>
            <li><label><?php _e('Dropshadow position (left)', 'tcd-w');  ?></label><input class="font_size hankaku" type="text" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][catch_shadow_a]" value="<?php echo esc_attr( $value['catch_shadow_a'] ); ?>" /><span>px</span></li>
            <li><label><?php _e('Dropshadow position (top)', 'tcd-w');  ?></label><input class="font_size hankaku" type="text" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][catch_shadow_b]" value="<?php echo esc_attr( $value['catch_shadow_b'] ); ?>" /><span>px</span></li>
            <li><label><?php _e('Dropshadow size', 'tcd-w');  ?></label><input class="font_size hankaku" type="text" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][catch_shadow_c]" value="<?php echo esc_attr( $value['catch_shadow_c'] ); ?>" /><span>px</span></li>
            <li><label><?php _e('Dropshadow color', 'tcd-w');  ?></label><input class="c-color-picker" data-default-color="#000000" type="text" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][catch_shadow_color]" value="<?php echo esc_attr( $value['catch_shadow_color'] ); ?>" /></li>
           </ul>
           <div style="<?php if ( (strtoupper(get_locale()) == 'JA')) { echo "display:block;"; } else { echo "display:none;"; }; ?>">
           <h4 class="theme_option_headline2"><?php _e('Direction of catchphrase', 'tcd-w');  ?></h4>
           <p>日本語以外の文字は非対応です。また、古いブラウザでは正常に表示されない可能性がありますのでご注意ください。</p>
           <fieldset class="cf select_type2">
            <?php
                 if ( ! isset( $checked ) )
                 $checked = '';
                 foreach ( $catch_direction_options as $option ) {
                 $catch_direction_setting = $value['catch_direction'];
                  if ( '' != $catch_direction_setting ) {
                    if ( $value['catch_direction'] == $option['value'] ) {
                      $checked = "checked=\"checked\"";
                    } else {
                      $checked = '';
                    }
                  }
            ?>
            <label>
             <input type="radio" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][catch_direction]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
             <?php echo $option['label']; ?>
            </label>
            <?php } ?>
           </fieldset>
           </div>
          </div><!-- END .index_slider_show_catch -->
         </div><!-- END .index_slider_catch -->
         <?php // オーバーレイ ----------------------- ?>
         <div class="index_slider_overlay">
          <h4 class="theme_option_headline2"><?php _e( 'Overlay setting', 'tcd-w' ); ?></h4>
          <p class="index_slider_show_overlay_checkbox"><label><input name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][use_overlay]" type="checkbox" value="1" <?php checked( $value['use_overlay'], 1 ); ?>><?php _e( 'Use overlay', 'tcd-w' ); ?></label></p>
          <div class="index_slider_show_overlay" style="<?php if($value['use_overlay'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
           <h4 class="theme_option_headline2"><?php _e('Overlay color', 'tcd-w');  ?></h4>
           <p><input type="text" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][overlay_color]" value="<?php echo esc_attr( $value['overlay_color'] ); ?>" data-default-color="#000000" class="c-color-picker"></p>
           <h4 class="theme_option_headline2"><?php _e('Overlay color transparency', 'tcd-w');  ?></h4>
           <p><?php _e('Please specify the number of 0.1 from 0.9. Overlay color will be more transparent as the number is small.', 'tcd-w');  ?></p>
           <p><input class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][overlay_opacity]" value="<?php echo esc_attr( $value['overlay_opacity'] ); ?>" /></p>
          </div><!-- END .index_slider_show_catch -->
         </div><!-- END .index_slider_overlay -->
         <?php // リンク ----------------------- ?>
         <div class="index_slider_link">
          <h4 class="theme_option_headline2"><?php _e( 'Link URL', 'tcd-w' ); ?></h4>
          <input id="dp_options[index_slider<?php echo esc_attr( $key ); ?>_url]" class="regular-text" type="text" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][url]" value="<?php echo esc_attr( $value['url'] ); ?>">
          <p><label><input name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][target]" type="checkbox" value="1" <?php checked( $value['target'], 1 ); ?>><?php _e( 'Open with new window', 'tcd-w' ); ?></label></p>
         </div><!-- END .index_slider_link -->
         <?php // アニメーション ----------------------- ?>
         <div class="index_slider_animation_area" style="<?php if($value['slider_type'] == 'type1') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
          <h4 class="theme_option_headline2"><?php _e('Animation type', 'tcd-w');  ?></h4>
          <fieldset class="cf select_type2">
            <?php
                if ( ! isset( $checked ) )
                $checked = '';
                foreach ( $slider_animation_options as $option ) {
                $slider_animation_setting = $value['animation_type'];
                 if ( '' != $slider_animation_setting ) {
                   if ( $value['animation_type'] == $option['value'] ) {
                     $checked = "checked=\"checked\"";
                   } else {
                     $checked = '';
                   }
                 }
            ?>
            <label>
             <input type="radio" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][animation_type]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
             <?php echo $option['label']; ?>
            </label>
            <?php } ?>
          </fieldset>
         </div><!-- END .index_slider_image_area -->
         <p class="delete-row right-align"><a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a></p>
        </div><!-- END .sub_box_content -->
       </div><!-- END .sub_box -->
       <?php
              endforeach;
            endif;
            $key = 'addindex';
            ob_start();
       ?>
       <div class="sub_box repeater-item repeater-item-<?php echo $key; ?>">
        <h4 class="theme_option_subbox_headline"><?php _e( 'New item', 'tcd-w' ); ?></h4>
        <div class="sub_box_content">
         <h4 class="theme_option_headline2"><?php _e('Slider type', 'tcd-w');  ?></h4>
         <fieldset class="cf select_type2">
           <?php
                $i = 1;
                foreach ( $slider_type_options as $option ) {
           ?>
           <label class="slider_type_button<?php echo $i; ?>">
            <input type="radio" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][slider_type]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php if( $option['value'] == 'type1') { echo 'checked="checked"'; }; ?> />
            <?php echo $option['label']; ?>
           </label>
           <?php $i++; } ?>
         </fieldset> 
         <?php // 画像 ----------------------- ?>
         <div class="index_slider_image_area">
          <h4 class="theme_option_headline2"><label for="dp_options[index_slider<?php echo esc_attr( $key ); ?>_image]"><?php _e( 'Image', 'tcd-w' ); ?></label></h4>
          <p><?php _e( 'Recommend image size. Width:1600px, Height:900px', 'tcd-w' ); ?></p>
          <div class="image_box cf">
           <div class="cf cf_media_field hide-if-no-js index_slider<?php echo esc_attr( $key ); ?>_image">
            <input type="hidden" value="" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][image]" id="index_slider<?php echo esc_attr( $key ); ?>_image" class="cf_media_id">
            <div class="preview_field"></div>
            <div class="buttton_area">
             <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
             <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button hidden">
            </div>
           </div>
          </div>
         </div><!-- END .index_slider_image_area -->
         <?php // video ----------------------- ?>
         <div class="index_slider_video_area" style="display:none;">
          <h4 class="theme_option_headline2"><?php _e('Video setting', 'tcd-w');  ?></h4>
          <p><?php _e('Please upload MP4 file.', 'tcd-w');  ?></p>
          <div class="cf cf_media_field hide-if-no-js index_slider<?php echo esc_attr( $key ); ?>_video">
           <input type="hidden" value="" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][video]" id="index_slider<?php echo esc_attr( $key ); ?>_video" class="cf_media_id">
           <div class="preview_field preview_field_video">
           </div>
           <div class="buttton_area">
            <input type="button" value="<?php _e('Select MP4 file', 'tcd-w'); ?>" class="cfmf-select-video button">
            <input type="button" value="<?php _e('Remove MP4 file', 'tcd-w'); ?>" class="cfmf-delete-video button hidden">
           </div>
          </div>
          <h4 class="theme_option_headline2"><?php _e('Substitute image', 'tcd-w');  ?></h4>
          <p><?php _e('This image will be displayed instead of video in smartphone.', 'tcd-w');  ?></p>
          <p><?php _e( 'Recommend image size. Width:1600px, Height:900px', 'tcd-w' ); ?></p>
          <div class="image_box cf">
           <div class="cf cf_media_field hide-if-no-js index_slider<?php echo esc_attr( $key ); ?>_video_image">
            <input type="hidden" value="" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][video_image]" id="index_slider<?php echo esc_attr( $key ); ?>_video_image" class="cf_media_id">
            <div class="preview_field"></div>
            <div class="buttton_area">
             <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
             <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button hidden">
            </div>
           </div>
          </div>
         </div><!-- END .index_slider_video_area -->
         <?php // youtube ----------------------- ?>
         <div class="index_slider_youtube_area" style="display:none;">
          <h4 class="theme_option_headline2"><?php _e('Youtube setting', 'tcd-w');  ?></h4>
          <p><?php _e('Please enter Youtube URL.', 'tcd-w');  ?></p>
          <input class="regular-text" type="text" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][youtube]" value="">
          <h4 class="theme_option_headline2"><?php _e('Substitute image', 'tcd-w');  ?></h4>
          <p><?php _e('This image will be displayed instead of Youtube video in smartphone.', 'tcd-w');  ?></p>
          <p><?php _e( 'Recommend image size. Width:1600px, Height:900px', 'tcd-w' ); ?></p>
          <div class="image_box cf">
           <div class="cf cf_media_field hide-if-no-js index_slider<?php echo esc_attr( $key ); ?>_youtube_image">
            <input type="hidden" value="" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][youtube_image]" id="index_slider<?php echo esc_attr( $key ); ?>_youtube_image" class="cf_media_id">
            <div class="preview_field"></div>
            <div class="buttton_area">
             <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
             <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button hidden">
            </div>
           </div>
          </div>
         </div><!-- END .index_slider_youtube_area -->
         <?php // キャッチフレーズ ----------------------- ?>
         <div class="index_slider_catch">
          <h4 class="theme_option_headline2"><?php _e( 'Catchphrase setting', 'tcd-w' ); ?></h4>
          <p class="index_slider_show_catch_checkbox"><label><input name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][show_catch]" type="checkbox" value="1"><?php _e( 'Display catchphrase', 'tcd-w' ); ?></label></p>
          <div class="index_slider_show_catch" style="display:none;">
           <textarea class="large-text" cols="50" rows="3" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][catch]"></textarea>
           <h4 class="theme_option_headline2"><?php _e('Font type of catchphrase', 'tcd-w');  ?></h4>
           <fieldset class="cf select_type2">
            <?php foreach ( $font_type_options as $option ) { ?>
            <label>
             <input type="radio" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][catch_font_type]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php if( $option['value'] == 'type1') { echo 'checked="checked"'; }; ?> />
             <?php echo $option['label']; ?>
            </label>
            <?php } ?>
           </fieldset>
           <h4 class="theme_option_headline2"><?php _e('Font size of catchphrase', 'tcd-w');  ?></h4>
           <p><input class="font_size hankaku" type="text" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][catch_font_size]" value="35" /><span>px</span></p>
           <h4 class="theme_option_headline2"><?php _e('Font size of catchphrase for mobile device', 'tcd-w');  ?></h4>
           <p><input class="font_size hankaku" type="text" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][catch_font_size_mobile]" value="28" /><span>px</span></p>
           <h4 class="theme_option_headline2"><?php _e('Dropshadow of catchphrase', 'tcd-w');  ?></h4>
           <ul>
            <li><label><?php _e('Dropshadow position (left)', 'tcd-w');  ?></label><input class="font_size hankaku" type="text" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][catch_shadow_a]" value="0" /><span>px</span></li>
            <li><label><?php _e('Dropshadow position (top)', 'tcd-w');  ?></label><input class="font_size hankaku" type="text" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][catch_shadow_b]" value="0" /><span>px</span></li>
            <li><label><?php _e('Dropshadow size', 'tcd-w');  ?></label><input class="font_size hankaku" type="text" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][catch_shadow_c]" value="4" /><span>px</span></li>
            <li><label><?php _e('Dropshadow color', 'tcd-w');  ?></label><input class="c-color-picker" data-default-color="#000000" type="text" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][catch_shadow_color]" value="#000000" /></li>
           </ul>
           <div style="<?php if ( (strtoupper(get_locale()) == 'JA')) { echo "display:block;"; } else { echo "display:none;"; }; ?>">
           <h4 class="theme_option_headline2"><?php _e('Direction of catchphrase', 'tcd-w');  ?></h4>
           <p>日本語以外の文字は非対応です。また、古いブラウザでは正常に表示されない可能性がありますのでご注意ください。</p>
           <fieldset class="cf select_type2">
            <?php foreach ( $catch_direction_options as $option ) { ?>
            <label>
             <input type="radio" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][catch_direction]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php if( $option['value'] == 'type1') { echo 'checked="checked"'; }; ?> />
             <?php echo $option['label']; ?>
            </label>
            <?php } ?>
           </fieldset>
           </div>
          </div><!-- END .index_slider_show_catch -->
         </div><!-- END .index_slider_catch -->
         <?php // オーバーレイ ----------------------- ?>
         <div class="index_slider_overlay">
          <h4 class="theme_option_headline2"><?php _e( 'Overlay setting', 'tcd-w' ); ?></h4>
          <p class="index_slider_show_overlay_checkbox"><label><input name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][use_overlay]" type="checkbox" value="1"><?php _e( 'Use overlay', 'tcd-w' ); ?></label></p>
          <div class="index_slider_show_overlay" style="display:none;">
           <h4 class="theme_option_headline2"><?php _e('Overlay color', 'tcd-w');  ?></h4>
           <p><input type="text" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][overlay_color]" value="#000000" data-default-color="#000000" class="c-color-picker"></p>
           <h4 class="theme_option_headline2"><?php _e('Overlay color transparency', 'tcd-w');  ?></h4>
           <p><?php _e('Please specify the number of 0.1 from 0.9. Overlay color will be more transparent as the number is small.', 'tcd-w');  ?></p>
           <p><input class="hankaku" style="width:70px;" type="number" max="1" min="0" step="0.1" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][overlay_opacity]" value="0.5" /></p>
          </div><!-- END .index_slider_show_catch -->
         </div><!-- END .index_slider_overlay -->
         <?php // リンク ----------------------- ?>
         <div class="index_slider_link">
          <h4 class="theme_option_headline2"><?php _e( 'Link URL', 'tcd-w' ); ?></h4>
          <input id="dp_options[index_slider<?php echo esc_attr( $key ); ?>_url]" class="regular-text" type="text" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][url]" value="">
          <p><label><input name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][target]" type="checkbox" value="1"><?php _e( 'Open with new window', 'tcd-w' ); ?></label></p>
         </div><!-- END .index_slider_link -->
         <?php // アニメーション ----------------------- ?>
         <div class="index_slider_animation_area">
          <h4 class="theme_option_headline2"><?php _e('Animation type', 'tcd-w');  ?></h4>
          <fieldset class="cf select_type2">
            <?php
                 foreach ( $slider_animation_options as $option ) {
            ?>
            <label>
             <input type="radio" name="dp_options[repeater_index_slider][<?php echo esc_attr( $key ); ?>][animation_type]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php if( $option['value'] == 'type3') { echo 'checked="checked"'; }; ?> />
             <?php echo $option['label']; ?>
            </label>
            <?php } ?>
          </fieldset>
         </div><!-- END .index_slider_image_area -->
         <p class="delete-row right-align"><a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a></p>
        </div><!-- END .sub_box_content -->
       </div><!-- END .sub_box -->
       <?php
            $clone = ob_get_clean();
       ?>
      </div><!-- END .repeater -->
      <a href="#" class="button button-secondary button-add-row" data-clone="<?php echo esc_attr( $clone ); ?>"><?php _e( 'Add item', 'tcd-w' ); ?></a>
     </div><!-- END .repeater-wrapper -->
     <?php //繰り返しフィールドここまで ----- ?>
     <?php // スピードの設定 ---------- ?>
     <h4 class="theme_option_headline2"><?php _e('Slider speed setting', 'tcd-w');  ?></h4>
     <select name="dp_options[slider_time]">
      <?php
           foreach ( $slider_time_options as $option ) :
             $label = $option['label'];
             $selected = '';
             if ( $options['slider_time'] == $option['value']) {
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
   </div>

   <div class="theme_option_message">
    <p><?php _e('You can change order by dragging each headline of option field.', 'tcd-w');  ?></p>
   </div>

   <?php // 並び替え ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ ?>
   <div id="theme_option_field_order">
   <?php
        //既存ユーザー用に後から追加したフリースペース等の新規コンテンツを配列にマージする（本来は不必要なコード）
        if(!in_array('index_free1',$options['index_contents_order'])){
          $options['index_contents_order'] = array_merge($options['index_contents_order'],array('index_free1','index_free2'));
        };
        if(!in_array('index_headline_set1',$options['index_contents_order'])){
          $options['index_contents_order'] = array_merge($options['index_contents_order'],array('index_headline_set1','index_headline_set2','index_headline_set3'));
        };
        //print_r($options['index_contents_order']);
   ?>
   <?php foreach((array) $options['index_contents_order'] as $index_content) : ?>


   <?php // ３連ボックスの設定 -------------------------------------------------------------------------------------------- ?>
   <?php if ($index_content == 'index_3box') : ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Triple box setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><label><input id="dp_options[show_index_3box]" name="dp_options[show_index_3box]" type="checkbox" value="1" <?php checked( '1', $options['show_index_3box'] ); ?> /> <?php _e('Display triple box content', 'tcd-w');  ?></label></p>
     <?php for($i = 1; $i <= 3; $i++) : ?>
     <div class="sub_box cf"> 
      <h3 class="theme_option_subbox_headline"><?php printf(__('Box%s', 'tcd-w'),$i);  ?></h3>
      <div class="sub_box_content">
       <h4 class="theme_option_headline2"><?php _e('Title', 'tcd-w');  ?></h4>
       <input id="dp_options[index_3box_title<?php echo $i; ?>]" class="regular-text" type="text" name="dp_options[index_3box_title<?php echo $i; ?>]" value="<?php echo esc_attr( $options['index_3box_title'.$i] ); ?>" />
       <h4 class="theme_option_headline2"><?php _e('Image', 'tcd-w'); ?></h4>
       <p><?php _e( 'Recommend image size. Width:392px, Height:280px', 'tcd-w' ); ?></p>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js index_3box_image<?php echo $i; ?>">
         <input type="hidden" value="<?php echo esc_attr( $options['index_3box_image'.$i] ); ?>" id="index_3box_image<?php echo $i; ?>" name="dp_options[index_3box_image<?php echo $i; ?>]" class="cf_media_id">
         <div class="preview_field"><?php if($options['index_3box_image'.$i]){ echo wp_get_attachment_image($options['index_3box_image'.$i], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['index_3box_image'.$i]){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
       <h4 class="theme_option_headline2"><?php _e('Link url', 'tcd-w');  ?></h4>
       <input id="dp_options[index_3box_url<?php echo $i; ?>]" class="regular-text" type="text" name="dp_options[index_3box_url<?php echo $i; ?>]" value="<?php echo esc_attr( $options['index_3box_url'.$i] ); ?>" />
       <p><label><input id="dp_options[index_3box_target<?php echo $i; ?>]" name="dp_options[index_3box_target<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( '1', $options['index_3box_target'.$i] ); ?> /> <?php _e('Open link in new window', 'tcd-w');  ?></label></p>
       <ul class="button_list cf">
        <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
       </ul>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
     <?php endfor; ?>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
     <input type="hidden" name="dp_options[index_contents_order][]" value="index_3box" />
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->
   <?php endif; ?>


   <?php // イントロの設定 -------------------------------------------------------------------------------------------- ?>
   <?php if ($index_content == 'index_intro') : ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Introduction setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <div class="theme_option_message no_arrow">
      <p><?php _e('You can display headline, description, and wide image. You can also display button on image.', 'tcd-w'); ?></p>
     </div>
     <p><label><input id="dp_options[show_index_intro]" name="dp_options[show_index_intro]" type="checkbox" value="1" <?php checked( '1', $options['show_index_intro'] ); ?> /> <?php _e('Display introduction', 'tcd-w');  ?></label></p>
     <h4 class="theme_option_headline2"><?php _e('Headline', 'tcd-w');  ?></h4>
     <textarea id="dp_options[index_intro_headline]" class="large-text" cols="50" rows="2" name="dp_options[index_intro_headline]"><?php echo esc_textarea( $options['index_intro_headline'] ); ?></textarea>
     <h4 class="theme_option_headline2"><?php _e('Font size of headline', 'tcd-w');  ?></h4>
     <p><input id="dp_options[index_intro_headline_font_size]" class="font_size hankaku" type="text" name="dp_options[index_intro_headline_font_size]" value="<?php esc_attr_e( $options['index_intro_headline_font_size'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Font size of headline for mobile device', 'tcd-w');  ?></h4>
     <p><input id="dp_options[index_intro_headline_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[index_intro_headline_font_size_mobile]" value="<?php esc_attr_e( $options['index_intro_headline_font_size_mobile'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Description', 'tcd-w');  ?></h4>
     <textarea id="dp_options[index_intro_desc]" class="large-text" cols="50" rows="4" name="dp_options[index_intro_desc]"><?php echo esc_textarea( $options['index_intro_desc'] ); ?></textarea>
     <h4 class="theme_option_headline2"><?php _e('Image', 'tcd-w'); ?></h4>
     <p><?php _e( 'Recommend image size. Width:1180px, Height:380px', 'tcd-w' ); ?></p>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js index_intro_image">
       <input type="hidden" value="<?php echo esc_attr( $options['index_intro_image'] ); ?>" id="index_intro_image" name="dp_options[index_intro_image]" class="cf_media_id">
       <div class="preview_field"><?php if($options['index_intro_image']){ echo wp_get_attachment_image($options['index_intro_image'], 'medium'); }; ?></div>
       <div class="buttton_area">
        <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
        <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['index_intro_image']){ echo 'hidden'; }; ?>">
       </div>
      </div>
     </div>
     <h4 class="theme_option_headline2"><?php _e('Button setting', 'tcd-w');  ?></h4>
     <p><label><input id="dp_options[show_index_intro_button]" name="dp_options[show_index_intro_button]" type="checkbox" value="1" <?php checked( '1', $options['show_index_intro_button'] ); ?> /> <?php _e('Display button', 'tcd-w');  ?></label></p>
     <h4 class="theme_option_headline2"><?php _e('Button label', 'tcd-w');  ?></h4>
     <input id="dp_options[index_intro_button_label]" class="regular-text" type="text" name="dp_options[index_intro_button_label]" value="<?php echo esc_attr( $options['index_intro_button_label'] ); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Button link URL', 'tcd-w');  ?></h4>
     <p><input id="dp_options[index_intro_button_url]" class="regular-text" type="text" name="dp_options[index_intro_button_url]" value="<?php echo esc_attr( $options['index_intro_button_url'] ); ?>" /></p>
     <p><label><input id="dp_options[index_intro_button_target]" name="dp_options[index_intro_button_target]" type="checkbox" value="1" <?php checked( '1', $options['index_intro_button_target'] ); ?> /> <?php _e('Open link in new window', 'tcd-w');  ?></label></p>
     <h4 class="theme_option_headline2"><?php _e('Button color', 'tcd-w');  ?></h4>
     <ul>
      <li><?php _e('Background color', 'tcd-w');  ?> <input type="text" name="dp_options[index_intro_button_bg_color]" value="<?php echo esc_attr( $options['index_intro_button_bg_color'] ); ?>" data-default-color="#FFFFFF" class="c-color-picker"></li>
      <li><?php _e('Text color', 'tcd-w');  ?> <input type="text" name="dp_options[index_intro_button_text_color]" value="<?php echo esc_attr( $options['index_intro_button_text_color'] ); ?>" data-default-color="#676767" class="c-color-picker"></li>
      <li><?php _e('Background hover color', 'tcd-w');  ?> <input type="text" name="dp_options[index_intro_button_bg_hover_color]" value="<?php echo esc_attr( $options['index_intro_button_bg_hover_color'] ); ?>" data-default-color="#6598a1" class="c-color-picker"></li>
      <li><?php _e('Text hover color', 'tcd-w');  ?> <input type="text" name="dp_options[index_intro_button_text_hover_color]" value="<?php echo esc_attr( $options['index_intro_button_text_hover_color'] ); ?>" data-default-color="#FFFFFF" class="c-color-picker"></li>
     </ul>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
     <input type="hidden" name="dp_options[index_contents_order][]" value="index_intro" />
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->
   <?php endif; ?>


   <?php // お知らせの設定 -------------------------------------------------------------------------------------------- ?>
   <?php if ($index_content == 'index_news') : ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('News setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><label><input id="dp_options[show_index_news]" name="dp_options[show_index_news]" type="checkbox" value="1" <?php checked( '1', $options['show_index_news'] ); ?> /> <?php _e('Display news', 'tcd-w');  ?></label></p>
     <h4 class="theme_option_headline2"><?php _e('Headline', 'tcd-w');  ?></h4>
     <textarea id="dp_options[index_news_headline]" class="large-text" cols="50" rows="2" name="dp_options[index_news_headline]"><?php echo esc_textarea( $options['index_news_headline'] ); ?></textarea>
     <h4 class="theme_option_headline2"><?php _e('Font size of headline', 'tcd-w');  ?></h4>
     <p><input id="dp_options[index_news_headline_font_size]" class="font_size hankaku" type="text" name="dp_options[index_news_headline_font_size]" value="<?php esc_attr_e( $options['index_news_headline_font_size'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Font size of headline for mobile device', 'tcd-w');  ?></h4>
     <p><input id="dp_options[index_news_headline_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[index_news_headline_font_size_mobile]" value="<?php esc_attr_e( $options['index_news_headline_font_size_mobile'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Sub title', 'tcd-w');  ?></h4>
     <input id="dp_options[index_news_sub_title]" class="regular-text" type="text" name="dp_options[index_news_sub_title]" value="<?php echo esc_attr( $options['index_news_sub_title'] ); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Button label', 'tcd-w');  ?></h4>
     <input id="dp_options[index_news_button_label]" class="regular-text" type="text" name="dp_options[index_news_button_label]" value="<?php echo esc_attr( $options['index_news_button_label'] ); ?>" />
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
     <input type="hidden" name="dp_options[index_contents_order][]" value="index_news" />
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->
   <?php endif; ?>


   <?php // ワイドコンテンツの設定 -------------------------------------------------------------------------------------------- ?>
   <?php if ($index_content == 'index_wide') : ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Wide content setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <div class="theme_option_message no_arrow">
      <p><?php _e('You can display wide image with headline and button.', 'tcd-w'); ?></p>
     </div>
     <p><label><input id="dp_options[show_index_wide]" name="dp_options[show_index_wide]" type="checkbox" value="1" <?php checked( '1', $options['show_index_wide'] ); ?> /> <?php _e('Display wide content', 'tcd-w');  ?></label></p>
     <h4 class="theme_option_headline2"><?php _e('Headline', 'tcd-w');  ?></h4>
     <textarea id="dp_options[index_wide_headline]" class="large-text" cols="50" rows="2" name="dp_options[index_wide_headline]"><?php echo esc_textarea( $options['index_wide_headline'] ); ?></textarea>
     <h4 class="theme_option_headline2"><?php _e('Font size of headline', 'tcd-w');  ?></h4>
     <p><input id="dp_options[index_wide_headline_font_size]" class="font_size hankaku" type="text" name="dp_options[index_wide_headline_font_size]" value="<?php esc_attr_e( $options['index_wide_headline_font_size'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Font size of headline for mobile device', 'tcd-w');  ?></h4>
     <p><input id="dp_options[index_wide_headline_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[index_wide_headline_font_size_mobile]" value="<?php esc_attr_e( $options['index_wide_headline_font_size_mobile'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Text color', 'tcd-w');  ?></h4>
     <p><input type="text" name="dp_options[index_wide_headline_color]" value="<?php echo esc_attr( $options['index_wide_headline_color'] ); ?>" data-default-color="#FFFFFF" class="c-color-picker"></p>
     <h4 class="theme_option_headline2"><?php _e('Image', 'tcd-w'); ?></h4>
     <p><?php _e( 'Recommend image size. Width:1450px, Height:440px', 'tcd-w' ); ?></p>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js index_wide_image">
       <input type="hidden" value="<?php echo esc_attr( $options['index_wide_image'] ); ?>" id="index_wide_image" name="dp_options[index_wide_image]" class="cf_media_id">
       <div class="preview_field"><?php if($options['index_wide_image']){ echo wp_get_attachment_image($options['index_wide_image'], 'medium'); }; ?></div>
       <div class="buttton_area">
        <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
        <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['index_wide_image']){ echo 'hidden'; }; ?>">
       </div>
      </div>
     </div>
     <h4 class="theme_option_headline2"><?php _e('Button setting', 'tcd-w');  ?></h4>
     <p><label><input id="dp_options[show_index_wide_button]" name="dp_options[show_index_wide_button]" type="checkbox" value="1" <?php checked( '1', $options['show_index_wide_button'] ); ?> /> <?php _e('Display button', 'tcd-w');  ?></label></p>
     <h4 class="theme_option_headline2"><?php _e('Button label', 'tcd-w');  ?></h4>
     <input id="dp_options[index_wide_button_label]" class="regular-text" type="text" name="dp_options[index_wide_button_label]" value="<?php echo esc_attr( $options['index_wide_button_label'] ); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Button link URL', 'tcd-w');  ?></h4>
     <p><input id="dp_options[index_wide_button_url]" class="regular-text" type="text" name="dp_options[index_wide_button_url]" value="<?php echo esc_attr( $options['index_wide_button_url'] ); ?>" /></p>
     <p><label><input id="dp_options[index_wide_button_target]" name="dp_options[index_wide_button_target]" type="checkbox" value="1" <?php checked( '1', $options['index_wide_button_target'] ); ?> /> <?php _e('Open link in new window', 'tcd-w');  ?></label></p>
     <h4 class="theme_option_headline2"><?php _e('Button color', 'tcd-w');  ?></h4>
     <ul>
      <li><?php _e('Background color', 'tcd-w');  ?> <input type="text" name="dp_options[index_wide_button_bg_color]" value="<?php echo esc_attr( $options['index_wide_button_bg_color'] ); ?>" data-default-color="#FFFFFF" class="c-color-picker"></li>
      <li><?php _e('Text color', 'tcd-w');  ?> <input type="text" name="dp_options[index_wide_button_text_color]" value="<?php echo esc_attr( $options['index_wide_button_text_color'] ); ?>" data-default-color="#676767" class="c-color-picker"></li>
      <li><?php _e('Background hover color', 'tcd-w');  ?> <input type="text" name="dp_options[index_wide_button_bg_hover_color]" value="<?php echo esc_attr( $options['index_wide_button_bg_hover_color'] ); ?>" data-default-color="#6598a1" class="c-color-picker"></li>
      <li><?php _e('Text hover color', 'tcd-w');  ?> <input type="text" name="dp_options[index_wide_button_text_hover_color]" value="<?php echo esc_attr( $options['index_wide_button_text_hover_color'] ); ?>" data-default-color="#FFFFFF" class="c-color-picker"></li>
     </ul>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
     <input type="hidden" name="dp_options[index_contents_order][]" value="index_wide" />
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->
   <?php endif; ?>


   <?php // 診療科目の設定 -------------------------------------------------------------------------------------------- ?>
   <?php if ($index_content == 'index_course') : ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Course list setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><label><input id="dp_options[show_index_course]" name="dp_options[show_index_course]" type="checkbox" value="1" <?php checked( '1', $options['show_index_course'] ); ?> /> <?php _e('Display course list', 'tcd-w');  ?></label></p>
     <h4 class="theme_option_headline2"><?php _e('Headline', 'tcd-w');  ?></h4>
     <textarea id="dp_options[index_course_headline]" class="large-text" cols="50" rows="2" name="dp_options[index_course_headline]"><?php echo esc_textarea( $options['index_course_headline'] ); ?></textarea>
     <h4 class="theme_option_headline2"><?php _e('Font size of headline', 'tcd-w');  ?></h4>
     <p><input id="dp_options[index_course_headline_font_size]" class="font_size hankaku" type="text" name="dp_options[index_course_headline_font_size]" value="<?php esc_attr_e( $options['index_course_headline_font_size'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Font size of headline for mobile device', 'tcd-w');  ?></h4>
     <p><input id="dp_options[index_course_headline_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[index_course_headline_font_size_mobile]" value="<?php esc_attr_e( $options['index_course_headline_font_size_mobile'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Description', 'tcd-w');  ?></h4>
     <textarea id="dp_options[index_course_desc]" class="large-text" cols="50" rows="4" name="dp_options[index_course_desc]"><?php echo esc_textarea( $options['index_course_desc'] ); ?></textarea>
     <h4 class="theme_option_headline2"><?php _e('Course list display setting', 'tcd-w');  ?></h4>
     <div class="theme_option_message">
      <p><?php _e('Enter a comma-seperated list of course category ID numbers, example 2,4,10<br />(Don\'t enter comma for last number).', 'tcd-w'); ?></p>
     </div>
     <p><input id="dp_options[index_course_cat]" class="hankaku regular-text" type="text" name="dp_options[index_course_cat]" value="<?php echo esc_attr( $options['index_course_cat'] ); ?>" /></p>
     <h4 class="theme_option_headline2"><?php _e('Course list layout', 'tcd-w');  ?></h4>
     <p><?php _e('Please register more than 2 category ID if you want to use 3 column layout.', 'tcd-w');  ?></p>
     <fieldset class="cf select_type2">
      <?php
           if ( ! isset( $checked ) )
           $checked = '';
           foreach ( $index_course_layout_options as $option ) {
           $index_course_layout_setting = $options['index_course_layout'];
             if ( '' != $index_course_layout_setting ) {
               if ( $options['index_course_layout'] == $option['value'] ) {
                 $checked = "checked=\"checked\"";
               } else {
                 $checked = '';
               }
            }
      ?>
      <label class="description">
       <input type="radio" name="dp_options[index_course_layout]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
       <?php echo $option['label']; ?>
      </label>
      <?php } ?>
     </fieldset>
     <h4 class="theme_option_headline2"><?php _e('Course link type', 'tcd-w');  ?></h4>
     <fieldset class="cf select_type2">
      <?php
           if ( ! isset( $checked ) )
           $checked = '';
           foreach ( $index_course_link_options as $option ) {
           $index_course_link_setting = $options['index_course_link'];
             if ( '' != $index_course_link_setting ) {
               if ( $options['index_course_link'] == $option['value'] ) {
                 $checked = "checked=\"checked\"";
               } else {
                 $checked = '';
               }
            }
      ?>
      <label class="description">
       <input type="radio" name="dp_options[index_course_link]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
       <?php echo $option['label']; ?>
      </label>
      <?php } ?>
     </fieldset>
     <h4 class="theme_option_headline2"><?php _e('Button setting', 'tcd-w');  ?></h4>
     <p><label><input id="dp_options[show_index_course_button]" name="dp_options[show_index_course_button]" type="checkbox" value="1" <?php checked( '1', $options['show_index_course_button'] ); ?> /> <?php _e('Display button', 'tcd-w');  ?></label></p>
     <h4 class="theme_option_headline2"><?php _e('Button label', 'tcd-w');  ?></h4>
     <input id="dp_options[index_course_button_label]" class="regular-text" type="text" name="dp_options[index_course_button_label]" value="<?php echo esc_attr( $options['index_course_button_label'] ); ?>" />
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
     <input type="hidden" name="dp_options[index_contents_order][]" value="index_course" />
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->
   <?php endif; ?>


   <?php // ブログの設定 -------------------------------------------------------------------------------------------- ?>
   <?php if ($index_content == 'index_blog') : ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Blog list setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><label><input id="dp_options[show_index_blog]" name="dp_options[show_index_blog]" type="checkbox" value="1" <?php checked( '1', $options['show_index_blog'] ); ?> /> <?php _e('Display blog list', 'tcd-w');  ?></label></p>
     <h4 class="theme_option_headline2"><?php _e('Headline', 'tcd-w');  ?></h4>
     <textarea id="dp_options[index_blog_headline]" class="large-text" cols="50" rows="2" name="dp_options[index_blog_headline]"><?php echo esc_textarea( $options['index_blog_headline'] ); ?></textarea>
     <h4 class="theme_option_headline2"><?php _e('Font size of headline', 'tcd-w');  ?></h4>
     <p><input id="dp_options[index_blog_headline_font_size]" class="font_size hankaku" type="text" name="dp_options[index_blog_headline_font_size]" value="<?php esc_attr_e( $options['index_blog_headline_font_size'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Font size of headline for mobile device', 'tcd-w');  ?></h4>
     <p><input id="dp_options[index_blog_headline_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[index_blog_headline_font_size_mobile]" value="<?php esc_attr_e( $options['index_blog_headline_font_size_mobile'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Sub title', 'tcd-w');  ?></h4>
     <input id="dp_options[index_blog_sub_title]" class="regular-text" type="text" name="dp_options[index_blog_sub_title]" value="<?php echo esc_attr( $options['index_blog_sub_title'] ); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Number of post to display', 'tcd-w');  ?></h4>
     <select name="dp_options[index_blog_num]">
      <?php
           foreach ( $slider_num_options as $option ) :
           $label = $option['label'];
           $selected = '';
           if ( $options['index_blog_num'] == $option['value']) {
             $selected = 'selected="selected"';
           } else {
             $selected = '';
           }
           echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
           endforeach;
      ?>
     </select>
     <h4 class="theme_option_headline2"><?php _e('Button label', 'tcd-w');  ?></h4>
     <input id="dp_options[index_blog_button_label]" class="regular-text" type="text" name="dp_options[index_blog_button_label]" value="<?php echo esc_attr( $options['index_blog_button_label'] ); ?>" />
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
     <input type="hidden" name="dp_options[index_contents_order][]" value="index_blog" />
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->
   <?php endif; ?>


   <?php // Google Mapの設定 -------------------------------------------------------------------------------------------- ?>
   <?php if ($index_content == 'index_gmap') : ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Google map setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><label><input id="dp_options[show_index_gmap]" name="dp_options[show_index_gmap]" type="checkbox" value="1" <?php checked( '1', $options['show_index_gmap'] ); ?> /> <?php _e('Display google map', 'tcd-w');  ?></label></p>
     <h4 class="theme_option_headline2"><?php _e('Headline', 'tcd-w');  ?></h4>
     <textarea id="dp_options[index_gmap_headline]" class="large-text" cols="50" rows="2" name="dp_options[index_gmap_headline]"><?php echo esc_textarea( $options['index_gmap_headline'] ); ?></textarea>
     <h4 class="theme_option_headline2"><?php _e('Font size of headline', 'tcd-w');  ?></h4>
     <p><input id="dp_options[index_gmap_headline_font_size]" class="font_size hankaku" type="text" name="dp_options[index_gmap_headline_font_size]" value="<?php esc_attr_e( $options['index_gmap_headline_font_size'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Font size of headline for mobile device', 'tcd-w');  ?></h4>
     <p><input id="dp_options[index_gmap_headline_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[index_gmap_headline_font_size_mobile]" value="<?php esc_attr_e( $options['index_gmap_headline_font_size_mobile'] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Sub title', 'tcd-w');  ?></h4>
     <input id="dp_options[index_gmap_sub_title]" class="regular-text" type="text" name="dp_options[index_gmap_sub_title]" value="<?php echo esc_attr( $options['index_gmap_sub_title'] ); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Map address', 'tcd-w');  ?></h4>
     <input id="dp_options[index_gmap_address]" class="large-text" type="text" name="dp_options[index_gmap_address]" value="<?php echo esc_attr( $options['index_gmap_address'] ); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Saturation', 'tcd-w');  ?></h4>
     <p><?php _e( 'Please set the saturation of the map. If you set it to -100 the output map is monochrome.', 'tcd-w' ); ?></p>
     <?php // range をスライドした時、現在の彩度がわかるように表示する ?>
     <p class="range-output"><?php _e( 'Current value: ', 'tcd-w' ); ?><span><?php echo esc_html( $options['index_gmap_saturation'] ); ?></span></p>
     <input class="range" type="range" name="dp_options[index_gmap_saturation]" value="<?php echo esc_attr( $options['index_gmap_saturation'] ); ?>" min="-100" max="100" step="10">
     <h4 class="theme_option_headline2"><?php _e('Button label', 'tcd-w');  ?></h4>
     <input id="dp_options[index_gmap_btn_label]" class="regular-text" type="text" name="dp_options[index_gmap_btn_label]" value="<?php echo esc_attr( $options['index_gmap_btn_label'] ); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Button URL', 'tcd-w');  ?></h4>
     <input id="dp_options[index_gmap_btn_url]" class="regular-text" type="text" name="dp_options[index_gmap_btn_url]" value="<?php echo esc_attr( $options['index_gmap_btn_url'] ); ?>" />
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
     <input type="hidden" name="dp_options[index_contents_order][]" value="index_gmap" />
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->
   <?php endif; ?>


   <?php // 会社情報の設定 -------------------------------------------------------------------------------------------- ?>
   <?php if ($index_content == 'index_company') : ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php _e('Company information setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><label><input id="dp_options[show_index_company]" name="dp_options[show_index_company]" type="checkbox" value="1" <?php checked( '1', $options['show_index_company'] ); ?> /> <?php _e('Display company information', 'tcd-w');  ?></label></p>
     <h4 class="theme_option_headline2"><?php _e('Company logo image', 'tcd-w'); ?></h4>
     <p><?php _e( 'Recommend image size. Width:300px, Height:120px, Maximum height:140px', 'tcd-w' ); ?></p>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js index_company_image">
       <input type="hidden" value="<?php echo esc_attr( $options['index_company_image'] ); ?>" id="index_company_image" name="dp_options[index_company_image]" class="cf_media_id">
       <div class="preview_field"><?php if($options['index_company_image']){ echo wp_get_attachment_image($options['index_company_image'], 'medium'); }; ?></div>
       <div class="buttton_area">
        <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
        <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['index_company_image']){ echo 'hidden'; }; ?>">
       </div>
      </div>
     </div>
     <h4 class="theme_option_headline2"><?php _e('Option for Retina display', 'tcd-w');  ?></h4>
     <p><?php _e('If you upload a logo image for retina display, please check the following check boxes','tcd-w'); ?></p>
     <p><label><input id="dp_options[index_company_image_retina]" name="dp_options[index_company_image_retina]" type="checkbox" value="1" <?php checked( '1', $options['index_company_image_retina'] ); ?> /> <?php _e('Use retina display logo image', 'tcd-w');  ?></label></p>
     <h4 class="theme_option_headline2"><?php _e('Description', 'tcd-w');  ?></h4>
     <textarea id="dp_options[index_company_desc]" class="large-text" cols="50" rows="4" name="dp_options[index_company_desc]"><?php echo esc_textarea( $options['index_company_desc'] ); ?></textarea>
     <h4 class="theme_option_headline2"><?php _e('SNS button', 'tcd-w'); ?></h4>
     <p><label><input id="dp_options[show_index_company_sns]" name="dp_options[show_index_company_sns]" type="checkbox" value="1" <?php checked( '1', $options['show_index_company_sns'] ); ?> /> <?php _e('Display sns button', 'tcd-w');  ?></label></p>
     <ul>
      <li>
       <label style="display:inline-block; min-width:140px;"><?php _e('Facebook URL', 'tcd-w');  ?></label>
       <input id="dp_options[index_company_facebook_url]" class="regular-text" type="text" name="dp_options[index_company_facebook_url]" value="<?php echo esc_attr( $options['index_company_facebook_url'] ); ?>" />
      </li>
      <li>
       <label style="display:inline-block; min-width:140px;"><?php _e('Twitter URL', 'tcd-w');  ?></label>
       <input id="dp_options[index_company_twitter_url]" class="regular-text" type="text" name="dp_options[index_company_twitter_url]" value="<?php echo esc_attr( $options['index_company_twitter_url'] ); ?>" />
      </li>
      <li>
       <label style="display:inline-block; min-width:140px;"><?php _e('Instagram URL', 'tcd-w');  ?></label>
       <input id="dp_options[index_company_insta_url]" class="regular-text" type="text" name="dp_options[index_company_insta_url]" value="<?php echo esc_attr( $options['index_company_insta_url'] ); ?>" />
      </li>
      <li>
       <label style="display:inline-block; min-width:140px;"><?php _e('Pinterest URL', 'tcd-w');  ?></label>
       <input id="dp_options[index_company_pint_url]" class="regular-text" type="text" name="dp_options[index_company_pint_url]" value="<?php echo esc_attr( $options['index_company_pint_url'] ); ?>" />
      </li>
      <li>
       <label style="display:inline-block; min-width:140px;"><?php _e('Contact page URL (You can use mailto:)', 'tcd-w');  ?></label>
       <input id="dp_options[index_company_mail_url]" class="regular-text" type="text" name="dp_options[index_company_mail_url]" value="<?php echo esc_attr( $options['index_company_mail_url'] ); ?>" />
      </li>
     </ul>
     <?php //スケジュール ----- ?>
     <h4 class="theme_option_headline2"><?php _e('Schedule', 'tcd-w');  ?></h4>
     <p><label><input id="dp_options[show_index_company_schedule]" name="dp_options[show_index_company_schedule]" type="checkbox" value="1" <?php checked( '1', $options['show_index_company_schedule'] ); ?> /> <?php _e('Display schedule list', 'tcd-w');  ?></label></p>
     <?php //繰り返しフィールド ----- ?>
     <div class="repeater-wrapper">
      <table id="schedule_table" class="repeater" data-delete-confirm="<?php _e( 'Delete?', 'tcd-w' ); ?>">
       <thead>
        <tr class="repeater-item">
         <th class="col1">時間</th>
         <th class="col2"></th>
         <th class="col3"></th>
         <th class="col4"></th>
         <th class="col5"></th>
         <th class="col6"></th>
         <th class="col7"></th>
         <th class="col8"></th>
         <th class="col9"></th>
        </tr>
       </thead>
       <tbody>
        <?php
             if ( $options['schedule'] ) :
               foreach ( $options['schedule'] as $key => $value ) :
        ?>
        <tr class="repeater-item repeater-item-<?php echo esc_attr( $key ); ?>">
         <td><input name="dp_options[repeater_schedule][<?php echo esc_attr( $key ); ?>][header]" value="<?php echo esc_attr( $value['header'] ); ?>" class="widefat" type="text"></td>
         <td><input name="dp_options[repeater_schedule][<?php echo esc_attr( $key ); ?>][col1]" value="<?php echo esc_attr( $value['col1'] ); ?>" class="widefat" type="text"></td>
         <td><input name="dp_options[repeater_schedule][<?php echo esc_attr( $key ); ?>][col2]" value="<?php echo esc_attr( $value['col2'] ); ?>" class="widefat" type="text"></td>
         <td><input name="dp_options[repeater_schedule][<?php echo esc_attr( $key ); ?>][col3]" value="<?php echo esc_attr( $value['col3'] ); ?>" class="widefat" type="text"></td>
         <td><input name="dp_options[repeater_schedule][<?php echo esc_attr( $key ); ?>][col4]" value="<?php echo esc_attr( $value['col4'] ); ?>" class="widefat" type="text"></td>
         <td><input name="dp_options[repeater_schedule][<?php echo esc_attr( $key ); ?>][col5]" value="<?php echo esc_attr( $value['col5'] ); ?>" class="widefat" type="text"></td>
         <td><input name="dp_options[repeater_schedule][<?php echo esc_attr( $key ); ?>][col6]" value="<?php echo esc_attr( $value['col6'] ); ?>" class="widefat" type="text"></td>
         <td><input name="dp_options[repeater_schedule][<?php echo esc_attr( $key ); ?>][col7]" value="<?php echo esc_attr( $value['col7'] ); ?>" class="widefat" type="text"></td>
         <td class="col-delete"><a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete row', 'tcd-w' ); ?></a></td>
        </tr>
        <?php
               endforeach;
             endif;
             $key = 'addindex';
             ob_start();
        ?>
        <tr class="repeater-item repeater-item-<?php echo $key; ?>">
         <td><input name="dp_options[repeater_schedule][<?php echo esc_attr( $key ); ?>][header]" value="" class="widefat" type="text"></td>
         <td><input name="dp_options[repeater_schedule][<?php echo esc_attr( $key ); ?>][col1]" value="" class="widefat" type="text"></td>
         <td><input name="dp_options[repeater_schedule][<?php echo esc_attr( $key ); ?>][col2]" value="" class="widefat" type="text"></td>
         <td><input name="dp_options[repeater_schedule][<?php echo esc_attr( $key ); ?>][col3]" value="" class="widefat" type="text"></td>
         <td><input name="dp_options[repeater_schedule][<?php echo esc_attr( $key ); ?>][col4]" value="" class="widefat" type="text"></td>
         <td><input name="dp_options[repeater_schedule][<?php echo esc_attr( $key ); ?>][col5]" value="" class="widefat" type="text"></td>
         <td><input name="dp_options[repeater_schedule][<?php echo esc_attr( $key ); ?>][col6]" value="" class="widefat" type="text"></td>
         <td><input name="dp_options[repeater_schedule][<?php echo esc_attr( $key ); ?>][col7]" value="" class="widefat" type="text"></td>
         <td class="col-delete"><a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete row', 'tcd-w' ); ?></a></td>
        </tr>
        <?php
             $clone = ob_get_clean();
        ?>
       </tbody>
      </table>
      <a href="#" class="button button-secondary button-add-row" data-clone="<?php echo esc_attr( $clone ); ?>"><?php _e( 'Add row', 'tcd-w' ); ?></a>
     </div><!-- END .repeater-wrapper -->
     <?php //繰り返しフィールドここまで ----- ?>
     <h4 class="theme_option_headline2"><?php _e('Schedule list background color setting', 'tcd-w');  ?></h4>
     <p><?php _e('First row', 'tcd-w');  ?> <input type="text" name="dp_options[schedule_color1]" value="<?php echo esc_attr( $options['schedule_color1'] ); ?>" data-default-color="#fafafa" class="c-color-picker"></p>
     <p><?php _e('Table header', 'tcd-w');  ?> <input type="text" name="dp_options[schedule_color2]" value="<?php echo esc_attr( $options['schedule_color2'] ); ?>" data-default-color="#eff5f6" class="c-color-picker"></p>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
     <input type="hidden" name="dp_options[index_contents_order][]" value="index_company" />
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->
   <?php endif; ?>


   <?php // フリースペースの設定 -------------------------------------------------------------------------------------------- ?>
   <?php for($i = 1; $i <= 2; $i++) : ?>
   <?php if ($index_content == 'index_free'.$i) : ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php printf(__('Free space%s setting', 'tcd-w'),$i);  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><label><input id="dp_options[show_index_free<?php echo $i; ?>]" name="dp_options[show_index_free<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( '1', $options['show_index_free'.$i] ); ?> /> <?php printf(__('Display free space%s', 'tcd-w'),$i); ?></label></p>
     <h4 class="theme_option_headline2"><?php _e('Content', 'tcd-w');  ?></h4>
     <?php if($i == 1) { ?>
     <?php wp_editor( $options['index_free1'], 'index_free1', array ( 'textarea_name' => 'dp_options[index_free1]' ) ); ?>
     <?php } else { ?>
     <?php wp_editor( $options['index_free2'], 'index_free2', array ( 'textarea_name' => 'dp_options[index_free2]' ) ); ?>
     <?php }; ?>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
     <input type="hidden" name="dp_options[index_contents_order][]" value="index_free<?php echo $i; ?>" />
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->
   <?php endif; ?>
   <?php endfor; ?>


   <?php // 見出しセットの設定 -------------------------------------------------------------------------------------------- ?>
   <?php for($i = 1; $i <= 3; $i++) : ?>
   <?php if ($index_content == 'index_headline_set'.$i) : ?>
   <div class="theme_option_field cf theme_option_field_ac">
    <h3 class="theme_option_headline"><?php printf(__('Headline set%s setting', 'tcd-w'),$i);  ?></h3>
    <div class="theme_option_field_ac_content">
     <p><label><input id="dp_options[show_index_headline_set<?php echo $i; ?>]" name="dp_options[show_index_headline_set<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( '1', $options['show_index_headline_set'.$i] ); ?> /> <?php printf(__('Display headline set%s', 'tcd-w'),$i); ?></label></p>
     <h4 class="theme_option_headline2"><?php _e('Headline', 'tcd-w');  ?></h4>
     <textarea id="dp_options[index_headline_set_headline<?php echo $i; ?>]" class="large-text" cols="50" rows="2" name="dp_options[index_headline_set_headline<?php echo $i; ?>]"><?php echo esc_textarea( $options['index_headline_set_headline'.$i] ); ?></textarea>
     <h4 class="theme_option_headline2"><?php _e('Font size of headline', 'tcd-w');  ?></h4>
     <p><input id="dp_options[index_headline_set_font_size<?php echo $i; ?>]" class="font_size hankaku" type="text" name="dp_options[index_headline_set_font_size<?php echo $i; ?>]" value="<?php esc_attr_e( $options['index_headline_set_font_size'.$i] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Font size of headline for mobile device', 'tcd-w');  ?></h4>
     <p><input id="dp_options[index_headline_set_font_size_mobile<?php echo $i; ?>]" class="font_size hankaku" type="text" name="dp_options[index_headline_set_font_size_mobile<?php echo $i; ?>]" value="<?php esc_attr_e( $options['index_headline_set_font_size_mobile'.$i] ); ?>" /><span>px</span></p>
     <h4 class="theme_option_headline2"><?php _e('Description', 'tcd-w');  ?></h4>
     <textarea id="dp_options[index_headline_set_desc<?php echo $i; ?>]" class="large-text" cols="50" rows="4" name="dp_options[index_headline_set_desc<?php echo $i; ?>]"><?php echo esc_textarea( $options['index_headline_set_desc'.$i] ); ?></textarea>
     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
     <input type="hidden" name="dp_options[index_contents_order][]" value="index_headline_set<?php echo $i; ?>" />
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->
   <?php endif; ?>
   <?php endfor; ?>


   <?php endforeach; // 並び替えここまで ?>
   </div><!-- END .theme_option_field_order -->

   <p class="button_ml_center"><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></p>

</div><!-- END .tab-content -->

<?php
} // END add_front_page_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_front_page_theme_options_validate( $input ) {

  global $dp_default_options, $slider_time_options, $slider_type_options, $font_type_options, $catch_direction_options, $index_course_layout_options, $index_course_link_options, $slider_num_options, $slider_animation_options ;


  // トップページコンテンツ並び順
  if ( ! is_array( $input['index_contents_order'] ) ) {
    $input['index_contents_order'] = array(
      'index_3box',
      'index_intro',
      'index_news',
      'index_wide',
      'index_course',
      'index_blog',
      'index_gmap',
      'index_company',
      'index_free1',
      'index_free2',
      'index_headline_set1',
      'index_headline_set2',
      'index_headline_set3'
    );
  }

  // スライダーの基本設定
  if ( ! isset( $input['show_index_slider'] ) )
    $input['show_index_slider'] = null;
    $input['show_index_slider'] = ( $input['show_index_slider'] == 1 ? 1 : 0 );
  if ( ! isset( $value['slider_time'] ) )
    $value['slider_time'] = null;
  if ( ! array_key_exists( $value['slider_time'], $slider_time_options ) )
    $value['slider_time'] = null;


  //スライダーの設定
  $index_slider = array();
  if ( ! empty( $input['index_slider'] ) && is_array($input['index_slider'] ) ) :
    $input['repeater_index_slider'] = $input['index_slider'];
  endif;
  if ( isset( $input['repeater_index_slider'] ) ) :
	  foreach ( (array)$input['repeater_index_slider'] as $key => $value ) {
	    $index_slider[] = array(
	      'slider_type' => ( isset( $input['repeater_index_slider'][$key]['slider_type'] ) && array_key_exists( $input['repeater_index_slider'][$key]['slider_type'], $slider_type_options ) ) ? $input['repeater_index_slider'][$key]['slider_type'] : 'type1',
	      'image' => isset( $input['repeater_index_slider'][$key]['image'] ) ? wp_filter_nohtml_kses( $input['repeater_index_slider'][$key]['image'] ) : '',
	      'video' => isset( $input['repeater_index_slider'][$key]['video'] ) ? wp_filter_nohtml_kses( $input['repeater_index_slider'][$key]['video'] ) : '',
	      'video_image' => isset( $input['repeater_index_slider'][$key]['video_image'] ) ? wp_filter_nohtml_kses( $input['repeater_index_slider'][$key]['video_image'] ) : '',
	      'youtube' => isset( $input['repeater_index_slider'][$key]['youtube'] ) ? wp_filter_nohtml_kses( $input['repeater_index_slider'][$key]['youtube'] ) : '',
	      'youtube_image' => isset( $input['repeater_index_slider'][$key]['youtube_image'] ) ? wp_filter_nohtml_kses( $input['repeater_index_slider'][$key]['youtube_image'] ) : '',
	      'show_catch' => ! empty( $input['repeater_index_slider'][$key]['show_catch'] ) ? 1 : 0,
	      'catch' => isset( $input['repeater_index_slider'][$key]['catch'] ) ? wp_filter_nohtml_kses( $input['repeater_index_slider'][$key]['catch'] ) : '',
	      'catch_font_type' => ( isset( $input['repeater_index_slider'][$key]['catch_font_type'] ) && array_key_exists( $input['repeater_index_slider'][$key]['catch_font_type'], $font_type_options ) ) ? $input['repeater_index_slider'][$key]['catch_font_type'] : 'type1',
	      'catch_font_size' => isset( $input['repeater_index_slider'][$key]['catch_font_size'] ) ? wp_filter_nohtml_kses( $input['repeater_index_slider'][$key]['catch_font_size'] ) : '38',
	      'catch_font_size_mobile' => isset( $input['repeater_index_slider'][$key]['catch_font_size_mobile'] ) ? wp_filter_nohtml_kses( $input['repeater_index_slider'][$key]['catch_font_size_mobile'] ) : '28',
	      'catch_color' => isset( $input['repeater_index_slider'][$key]['catch_color'] ) ? wp_filter_nohtml_kses( $input['repeater_index_slider'][$key]['catch_color'] ) : '#FFFFFF',
	      'catch_shadow_a' => isset( $input['repeater_index_slider'][$key]['catch_shadow_a'] ) ? wp_filter_nohtml_kses( $input['repeater_index_slider'][$key]['catch_shadow_a'] ) : '0',
	      'catch_shadow_b' => isset( $input['repeater_index_slider'][$key]['catch_shadow_b'] ) ? wp_filter_nohtml_kses( $input['repeater_index_slider'][$key]['catch_shadow_b'] ) : '0',
	      'catch_shadow_c' => isset( $input['repeater_index_slider'][$key]['catch_shadow_c'] ) ? wp_filter_nohtml_kses( $input['repeater_index_slider'][$key]['catch_shadow_c'] ) : '4',
	      'catch_shadow_color' => isset( $input['repeater_index_slider'][$key]['catch_shadow_color'] ) ? wp_filter_nohtml_kses( $input['repeater_index_slider'][$key]['catch_shadow_color'] ) : '#000000',
	      'catch_direction' => ( isset( $input['repeater_index_slider'][$key]['catch_direction'] ) && array_key_exists( $input['repeater_index_slider'][$key]['catch_direction'], $catch_direction_options ) ) ? $input['repeater_index_slider'][$key]['catch_direction'] : 'type1',
	      'use_overlay' => ! empty( $input['repeater_index_slider'][$key]['use_overlay'] ) ? 1 : 0,
	      'overlay_color' => isset( $input['repeater_index_slider'][$key]['overlay_color'] ) ? wp_filter_nohtml_kses( $input['repeater_index_slider'][$key]['overlay_color'] ) : '#000000',
	      'overlay_opacity' => isset( $input['repeater_index_slider'][$key]['overlay_opacity'] ) ? wp_filter_nohtml_kses( $input['repeater_index_slider'][$key]['overlay_opacity'] ) : '0.5',
	      'url' => isset( $input['repeater_index_slider'][$key]['url'] ) ? wp_filter_nohtml_kses( $input['repeater_index_slider'][$key]['url'] ) : '',
	      'target' => ! empty( $input['repeater_index_slider'][$key]['target'] ) ? 1 : 0,
	      'animation_type' => ( isset( $input['repeater_index_slider'][$key]['animation_type'] ) && array_key_exists( $input['repeater_index_slider'][$key]['animation_type'], $slider_animation_options ) ) ? $input['repeater_index_slider'][$key]['animation_type'] : 'type3'
	    );
	  }
  endif;
  $input['index_slider'] = $index_slider;


  //３連ボックスの設定
  if ( ! isset( $input['show_index_3box'] ) )
    $input['show_index_3box'] = null;
    $input['show_index_3box'] = ( $input['show_index_3box'] == 1 ? 1 : 0 );
  for ( $i = 1; $i <= 3; $i++ ) :
    $input['index_3box_image'.$i] = wp_filter_nohtml_kses( $input['index_3box_image'.$i] );
    $input['index_3box_title'.$i] = wp_filter_nohtml_kses( $input['index_3box_title'.$i] );
    $input['index_3box_url'.$i] = wp_filter_nohtml_kses( $input['index_3box_url'.$i] );
    if ( ! isset( $input['index_3box_target'.$i] ) )
      $input['index_3box_target'.$i] = null;
      $input['index_3box_target'.$i] = ( $input['index_3box_target'.$i] == 1 ? 1 : 0 );
  endfor;


  //イントロの設定
  if ( ! isset( $input['show_index_intro'] ) )
    $input['show_index_intro'] = null;
    $input['show_index_intro'] = ( $input['show_index_intro'] == 1 ? 1 : 0 );
  $input['index_intro_headline'] = wp_filter_nohtml_kses( $input['index_intro_headline'] );
  $input['index_intro_headline_font_size'] = wp_filter_nohtml_kses( $input['index_intro_headline_font_size'] );
  $input['index_intro_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input['index_intro_headline_font_size_mobile'] );
  $input['index_intro_desc'] = wp_filter_nohtml_kses( $input['index_intro_desc'] );
  $input['index_intro_image'] = wp_filter_nohtml_kses( $input['index_intro_image'] );
  if ( ! isset( $input['show_index_intro_button'] ) )
    $input['show_index_intro_button'] = null;
    $input['show_index_intro_button'] = ( $input['show_index_intro_button'] == 1 ? 1 : 0 );
  $input['index_intro_button_url'] = wp_filter_nohtml_kses( $input['index_intro_button_url'] );
  if ( ! isset( $input['index_intro_button_target'] ) )
    $input['index_intro_button_target'] = null;
    $input['index_intro_button_target'] = ( $input['index_intro_button_target'] == 1 ? 1 : 0 );
  $input['index_intro_button_label'] = wp_filter_nohtml_kses( $input['index_intro_button_label'] );
  $input['index_intro_button_bg_color'] = wp_filter_nohtml_kses( $input['index_intro_button_bg_color'] );
  $input['index_intro_button_bg_hover_color'] = wp_filter_nohtml_kses( $input['index_intro_button_bg_hover_color'] );
  $input['index_intro_button_text_color'] = wp_filter_nohtml_kses( $input['index_intro_button_text_color'] );
  $input['index_intro_button_text_hover_color'] = wp_filter_nohtml_kses( $input['index_intro_button_text_hover_color'] );


  //お知らせの設定
  if ( ! isset( $input['show_index_news'] ) )
    $input['show_index_news'] = null;
    $input['show_index_news'] = ( $input['show_index_news'] == 1 ? 1 : 0 );
  $input['index_news_headline'] = wp_filter_nohtml_kses( $input['index_news_headline'] );
  $input['index_news_headline_font_size'] = wp_filter_nohtml_kses( $input['index_news_headline_font_size'] );
  $input['index_news_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input['index_news_headline_font_size_mobile'] );
  $input['index_news_sub_title'] = wp_filter_nohtml_kses( $input['index_news_sub_title'] );
  $input['index_news_button_label'] = wp_filter_nohtml_kses( $input['index_news_button_label'] );


  //ワイドコンテンツの設定
  if ( ! isset( $input['show_index_wide'] ) )
    $input['show_index_wide'] = null;
    $input['show_index_wide'] = ( $input['show_index_wide'] == 1 ? 1 : 0 );
  $input['index_wide_headline'] = wp_filter_nohtml_kses( $input['index_wide_headline'] );
  $input['index_wide_headline_font_size'] = wp_filter_nohtml_kses( $input['index_wide_headline_font_size'] );
  $input['index_wide_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input['index_wide_headline_font_size_mobile'] );
  $input['index_wide_headline_color'] = wp_filter_nohtml_kses( $input['index_wide_headline_color'] );
  $input['index_wide_image'] = wp_filter_nohtml_kses( $input['index_wide_image'] );
  if ( ! isset( $input['show_index_wide_button'] ) )
    $input['show_index_wide_button'] = null;
    $input['show_index_wide_button'] = ( $input['show_index_wide_button'] == 1 ? 1 : 0 );
  $input['index_wide_button_url'] = wp_filter_nohtml_kses( $input['index_wide_button_url'] );
  if ( ! isset( $input['index_wide_button_target'] ) )
    $input['index_wide_button_target'] = null;
    $input['index_wide_button_target'] = ( $input['index_wide_button_target'] == 1 ? 1 : 0 );
  $input['index_wide_button_label'] = wp_filter_nohtml_kses( $input['index_wide_button_label'] );
  $input['index_wide_button_bg_color'] = wp_filter_nohtml_kses( $input['index_wide_button_bg_color'] );
  $input['index_wide_button_bg_hover_color'] = wp_filter_nohtml_kses( $input['index_wide_button_bg_hover_color'] );
  $input['index_wide_button_text_color'] = wp_filter_nohtml_kses( $input['index_wide_button_text_color'] );
  $input['index_wide_button_text_hover_color'] = wp_filter_nohtml_kses( $input['index_wide_button_text_hover_color'] );


  //診療科目の設定
  if ( ! isset( $input['show_index_course'] ) )
    $input['show_index_course'] = null;
    $input['show_index_course'] = ( $input['show_index_course'] == 1 ? 1 : 0 );
  $input['index_course_headline'] = wp_filter_nohtml_kses( $input['index_course_headline'] );
  $input['index_course_headline_font_size'] = wp_filter_nohtml_kses( $input['index_course_headline_font_size'] );
  $input['index_course_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input['index_course_headline_font_size_mobile'] );
  $input['index_course_desc'] = wp_filter_nohtml_kses( $input['index_course_desc'] );
  if ( ! isset( $input['show_index_course_button'] ) )
    $input['show_index_course_button'] = null;
    $input['show_index_course_button'] = ( $input['show_index_course_button'] == 1 ? 1 : 0 );
  $input['index_course_button_label'] = wp_filter_nohtml_kses( $input['index_course_button_label'] );
  if ( ! isset( $input['index_course_layout'] ) )
    $input['index_course_layout'] = null;
  if ( ! array_key_exists( $input['index_course_layout'], $index_course_layout_options ) )
    $input['index_course_layout'] = null;
  if ( ! isset( $input['index_course_link'] ) )
    $input['index_course_link'] = null;
  if ( ! array_key_exists( $input['index_course_link'], $index_course_link_options ) )
    $input['index_course_link'] = null;
  $input['index_course_cat'] = wp_filter_nohtml_kses( $input['index_course_cat'] );


  //ブログの設定
  if ( ! isset( $input['show_index_blog'] ) )
    $input['show_index_blog'] = null;
    $input['show_index_blog'] = ( $input['show_index_blog'] == 1 ? 1 : 0 );
  $input['index_blog_headline'] = wp_filter_nohtml_kses( $input['index_blog_headline'] );
  $input['index_blog_headline_font_size'] = wp_filter_nohtml_kses( $input['index_blog_headline_font_size'] );
  $input['index_blog_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input['index_blog_headline_font_size_mobile'] );
  $input['index_blog_sub_title'] = wp_filter_nohtml_kses( $input['index_blog_sub_title'] );
  $input['index_blog_button_label'] = wp_filter_nohtml_kses( $input['index_blog_button_label'] );
  if ( ! isset( $value['index_blog_num'] ) )
    $value['index_blog_num'] = null;
  if ( ! array_key_exists( $value['index_blog_num'], $slider_num_options ) )
    $value['index_blog_num'] = null;


  //Google Mapの設定
  if ( ! isset( $input['show_index_gmap'] ) )
    $input['show_index_gmap'] = null;
    $input['show_index_gmap'] = ( $input['show_index_gmap'] == 1 ? 1 : 0 );
  $input['index_gmap_headline'] = wp_filter_nohtml_kses( $input['index_gmap_headline'] );
  $input['index_gmap_headline_font_size'] = wp_filter_nohtml_kses( $input['index_gmap_headline_font_size'] );
  $input['index_gmap_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input['index_gmap_headline_font_size_mobile'] );
  $input['index_gmap_sub_title'] = wp_filter_nohtml_kses( $input['index_gmap_sub_title'] );
  $input['index_gmap_address'] = wp_filter_nohtml_kses( $input['index_gmap_address'] );
  $input['index_gmap_saturation'] = wp_filter_nohtml_kses( $input['index_gmap_saturation'] );
  $input['index_gmap_btn_label'] = wp_filter_nohtml_kses( $input['index_gmap_btn_label'] );
  $input['index_gmap_btn_url'] = wp_filter_nohtml_kses( $input['index_gmap_btn_url'] );


  //会社情報の設定
  if ( ! isset( $input['show_index_company'] ) )
    $input['show_index_company'] = null;
    $input['show_index_company'] = ( $input['show_index_company'] == 1 ? 1 : 0 );
  $input['index_company_desc'] = wp_filter_nohtml_kses( $input['index_company_desc'] );
  if ( ! isset( $input['show_index_company_sns'] ) )
    $input['show_index_company_sns'] = null;
    $input['show_index_company_sns'] = ( $input['show_index_company_sns'] == 1 ? 1 : 0 );
  $input['index_company_twitter_url'] = wp_filter_nohtml_kses( $input['index_company_twitter_url'] );
  $input['index_company_facebook_url'] = wp_filter_nohtml_kses( $input['index_company_facebook_url'] );
  $input['index_company_insta_url'] = wp_filter_nohtml_kses( $input['index_company_insta_url'] );
  $input['index_company_pint_url'] = wp_filter_nohtml_kses( $input['index_company_pint_url'] );
  $input['index_company_mail_url'] = wp_filter_nohtml_kses( $input['index_company_mail_url'] );
  $input['index_company_image'] = wp_filter_nohtml_kses( $input['index_company_image'] );
  if ( ! isset( $input['show_index_company_schedule'] ) )
    $input['show_index_company_schedule'] = null;
    $input['show_index_company_schedule'] = ( $input['show_index_company_schedule'] == 1 ? 1 : 0 );
  if ( ! isset( $input['index_company_image_retina'] ) )
    $input['index_company_image_retina'] = null;
    $input['index_company_image_retina'] = ( $input['index_company_image_retina'] == 1 ? 1 : 0 );


  //フリースペースの設定
  for ( $i = 1; $i <= 2; $i++ ) :
    $input['index_free'.$i] = wp_kses_post($input['index_free'.$i]);
    if ( ! isset( $input['show_index_free'.$i] ) )
      $input['show_index_free'.$i] = null;
      $input['show_index_free'.$i] = ( $input['show_index_free'.$i] == 1 ? 1 : 0 );
  endfor;


  //見出しセットの設定
  for ( $i = 1; $i <= 3; $i++ ) :
    if ( ! isset( $input['show_index_headline_set'.$i] ) )
      $input['show_index_headline_set'.$i] = null;
      $input['show_index_headline_set'.$i] = ( $input['show_index_headline_set'.$i] == 1 ? 1 : 0 );
    $input['index_headline_set_headline'.$i] = wp_filter_nohtml_kses( $input['index_headline_set_headline'.$i] );
    $input['index_headline_set_font_size'.$i] = wp_filter_nohtml_kses( $input['index_headline_set_font_size'.$i] );
    $input['index_headline_set_font_size_mobile'.$i] = wp_filter_nohtml_kses( $input['index_headline_set_font_size_mobile'.$i] );
    $input['index_headline_set_desc'.$i] = wp_filter_nohtml_kses( $input['index_headline_set_desc'.$i] );
  endfor;


  // スケジュール
  $input['schedule_color1'] = wp_filter_nohtml_kses( $input['schedule_color1'] );
  $input['schedule_color2'] = wp_filter_nohtml_kses( $input['schedule_color2'] );
  $schedule = array();
  if ( ! empty( $input['schedule'] ) && is_array($input['schedule'] ) ) :
    $input['repeater_schedule'] = $input['schedule'];
  endif;
  if ( isset( $input['repeater_schedule'] ) ) :
	  foreach ( (array)$input['repeater_schedule'] as $key => $value ) {
	    $schedule[] = array(
	      'header' => isset( $input['repeater_schedule'][$key]['header'] ) ? wp_filter_nohtml_kses( $input['repeater_schedule'][$key]['header'] ) : '',
	      'col1' => isset( $input['repeater_schedule'][$key]['col1'] ) ? wp_filter_nohtml_kses( $input['repeater_schedule'][$key]['col1'] ) : '',
	      'col2' => isset( $input['repeater_schedule'][$key]['col2'] ) ? wp_filter_nohtml_kses( $input['repeater_schedule'][$key]['col2'] ) : '',
	      'col3' => isset( $input['repeater_schedule'][$key]['col3'] ) ? wp_filter_nohtml_kses( $input['repeater_schedule'][$key]['col3'] ) : '',
	      'col4' => isset( $input['repeater_schedule'][$key]['col4'] ) ? wp_filter_nohtml_kses( $input['repeater_schedule'][$key]['col4'] ) : '',
	      'col5' => isset( $input['repeater_schedule'][$key]['col5'] ) ? wp_filter_nohtml_kses( $input['repeater_schedule'][$key]['col5'] ) : '',
	      'col6' => isset( $input['repeater_schedule'][$key]['col6'] ) ? wp_filter_nohtml_kses( $input['repeater_schedule'][$key]['col6'] ) : '',
	      'col7' => isset( $input['repeater_schedule'][$key]['col7'] ) ? wp_filter_nohtml_kses( $input['repeater_schedule'][$key]['col7'] ) : ''
	    );
	  }
  endif;
  $input['schedule'] = $schedule;


	return $input;

};


?>
