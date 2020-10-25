<?php
/*
 * オプションの設定
 */


// hover effect
global $hover_type_options;
$hover_type_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Zoom', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Slide', 'tcd-w' )),
  'type3' => array('value' => 'type3','label' => __( 'Fade', 'tcd-w' )),
  'type4' => array('value' => 'type4','label' => __( 'No animation', 'tcd-w' ))
);
global $hover2_direct_options;
$hover2_direct_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Left to Right', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Right to Left', 'tcd-w' ))
);


//フォントタイプ
global $font_type_options;
$font_type_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Meiryo', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'YuGothic', 'tcd-w' )),
  'type3' => array('value' => 'type3','label' => __( 'YuMincho', 'tcd-w' ))
);


// ヘッダーの固定設定
global $header_fix_options;
$header_fix_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Normal header', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Fix at top after page scroll', 'tcd-w' )),
);


// ソーシャルボタンの設定
global $sns_type_options;
$sns_type_options = array(
  'type1' => array( 'value' => 'type1', 'label' => __( 'style1', 'tcd-w' )),
  'type2' => array( 'value' => 'type2', 'label' => __( 'style2', 'tcd-w' )),
  'type3' => array( 'value' => 'type3', 'label' => __( 'style3', 'tcd-w' )),
  'type4' => array( 'value' => 'type4', 'label' => __( 'style4', 'tcd-w' )),
  'type5' => array( 'value' => 'type5', 'label' => __( 'style5', 'tcd-w' ))
);


// ローディングアイコンの最大表示時間の設定
global $load_time_options;
$load_time_options = array(
  '3' => array('value' => '3000','label' => __( '3 second', 'tcd-w' )),
  '4' => array('value' => '4000','label' => __( '4 second', 'tcd-w' )),
  '5' => array('value' => '5000','label' => __( '5 second', 'tcd-w' )),
  '6' => array('value' => '6000','label' => __( '6 second', 'tcd-w' )),
  '7' => array('value' => '7000','label' => __( '7 second', 'tcd-w' )),
  '8' => array('value' => '8000','label' => __( '8 second', 'tcd-w' )),
  '9' => array('value' => '9000','label' => __( '9 second', 'tcd-w' )),
  '10' => array('value' => '10000','label' => __( '10 second', 'tcd-w' )),
);


// ローディングアイコンの種類の設定
global $load_icon_type;
$load_icon_type = array(
 'type1' => array('value' => 'type1','label' => __( 'Circle', 'tcd-w' )),
 'type2' => array('value' => 'type2','label' => __( 'Square', 'tcd-w' )),
 'type3' => array('value' => 'type3','label' => __( 'Dot', 'tcd-w' ))
);


// フッターの固定メニュー 表示タイプ
global $footer_bar_display_options;
$footer_bar_display_options = array(
 'type1' => array('value' => 'type1', 'label' => __( 'Fade In', 'tcd-w' )),
 'type2' => array('value' => 'type2', 'label' => __( 'Slide In', 'tcd-w' )),
 'type3' => array('value' => 'type3', 'label' => __( 'Hide', 'tcd-w' ))
);


// フッターの固定メニュー ボタンのタイプ
global $footer_bar_button_options;
$footer_bar_button_options = array(
  'type1' => array('value' => 'type1', 'label' => __( 'Default', 'tcd-w' )),
  'type2' => array('value' => 'type2', 'label' => __( 'Share', 'tcd-w' )),
  'type3' => array('value' => 'type3', 'label' => __( 'Telephone', 'tcd-w' ))
);


// フッターの固定メニューのアイコン
global $footer_bar_icon_options;
$footer_bar_icon_options = array(
  'file-text' => array('value' => 'file-text', 'label' => __( 'Document', 'tcd-w' )),
  'share-alt' => array('value' => 'share-alt', 'label' => __( 'Share', 'tcd-w' )),
  'phone' => array('value' => 'phone', 'label' => __( 'Telephone', 'tcd-w' )),
  'envelope' => array('value' => 'envelope', 'label' => __( 'Envelope', 'tcd-w' )),
  'tag' => array('value' => 'tag', 'label' => __( 'Tag', 'tcd-w' )),
  'pencil' => array('value' => 'pencil', 'label' => __( 'Pencil', 'tcd-w' ))
);


// 記事タイプ
global $post_type_options;
$post_type_options = array(
  'recent_post' => array('value' => 'recent_post','label' => __( 'Recent post', 'tcd-w' )),
  'recommend_post' => array('value' => 'recommend_post','label' => __( 'Recommend post1', 'tcd-w' )),
  'recommend_post2' => array('value' => 'recommend_post2','label' => __( 'Recommend post2', 'tcd-w' ))
);


// 記事の並び順
global $post_type_order_options;
$post_type_order_options = array(
  'date1' => array('value' => 'date1','label' => __( 'Date (DESC)', 'tcd-w' )),
  'date2' => array('value' => 'date2','label' => __( 'Date (ASC)', 'tcd-w' )),
  'rand' => array('value' => 'rand','label' => __( 'Random', 'tcd-w' ))
);


// トップページ　スライダーの設定
global $slider_type_options;
$slider_type_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Image', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Video', 'tcd-w' )),
  'type3' => array('value' => 'type3','label' => __( 'Youtube', 'tcd-w' ))
);


// トップページのスライダーのタイミングの設定
global $slider_time_options;
$slider_time_options = array(
  '3000' => array('value' => '3000','label' => __( '3 second', 'tcd-w' )), 
  '5000' => array('value' => '5000','label' => __( '5 second', 'tcd-w' )),
  '6000' => array('value' => '6000','label' => __( '6 second', 'tcd-w' )),
  '7000' => array('value' => '7000','label' => __( '7 second', 'tcd-w' )),
  '8000' => array('value' => '8000','label' => __( '8 second', 'tcd-w' )),
  '9000' => array('value' => '9000','label' => __( '9 second', 'tcd-w' )),
  '10000' => array('value' => '10000','label' => __( '10 second', 'tcd-w' ))
);


// スライダーの数
global $slider_num_options;
$slider_num_options = array(
  '4' => array('value' => '4','label' => '4'),
  '8' => array('value' => '8','label' => '8'),
  '12' => array('value' => '12','label' => '12'),
  '16' => array('value' => '16','label' => '16'),
  '20' => array('value' => '20','label' => '20')
);


// 固定ページの記事一覧の数
global $page_post_list_num_options;
$page_post_list_num_options = array(
  '3' => array('value' => '3','label' => '3'),
  '6' => array('value' => '6','label' => '6'),
  '9' => array('value' => '9','label' => '9'),
  '12' => array('value' => '12','label' => '12')
);


// ロゴに画像を使うか否か
global $logo_type_options;
$logo_type_options = array(
  'no' => array('value' => 'no', 'label' => __( 'Use text for logo', 'tcd-w' )),
  'yes' => array('value' => 'yes', 'label' => __( 'Use image for logo', 'tcd-w' ))
);


// フッターの固定コンテンツ
global $fixed_footer_content_type_options;
$fixed_footer_content_type_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Template', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Free space', 'tcd-w' ))
);


// フッターの固定コンテンツ　ボタンか画像かの選択
global $fixed_footer_sub_content_type_options;
$fixed_footer_sub_content_type_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Display button', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Display image', 'tcd-w' ))
);


// レイアウトの設定
global $layout_options;
$layout_options = array(
 'type1' => array('value' => 'type1','label' => __( 'Layout type1', 'tcd-w' ),'img' => 'type1'),
 'type2' => array('value' => 'type2','label' => __( 'Layout type2', 'tcd-w' ),'img' => 'type2')
);


// 記事一覧　無限スクロールの設定
global $post_list_load_type_options;
$post_list_load_type_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Use infinity scroll', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Display page navigation button', 'tcd-w' )),
);


// 記事一覧の数
global $post_list_num_options;
$post_list_num_options = array(
  '10' => array('value' => '10','label' => '10'),
  '15' => array('value' => '15','label' => '15'),
  '20' => array('value' => '20','label' => '20'),
  '30' => array('value' => '30','label' => '30'),
  '40' => array('value' => '40','label' => '40'),
  '50' => array('value' => '50','label' => '50')
);


// 集計期間
global $range_options;
$range_options = array(
  'day' => array('value' => 'day','label' => __( 'Daily', 'tcd-w' )),
  'week' => array('value' => 'week','label' => __( 'Weekly', 'tcd-w' )),
  'month' => array('value' => 'month','label' => __( 'Monthly', 'tcd-w' )),
  'year' => array('value' => 'year','label' => __( 'Yearly', 'tcd-w' )),
  'all' => array('value' => '','label' => __( 'All time', 'tcd-w' ))
);


// Google Maps
global $gmap_marker_type_options;
$gmap_marker_type_options = array(
  'type1' => array( 'value' => 'type1', 'label' => __( 'Use default marker', 'tcd-w' ) ),
  'type2' => array( 'value' => 'type2', 'label' => __( 'Use custom marker', 'tcd-w' ) )
);
global $gmap_custom_marker_type_options;
$gmap_custom_marker_type_options = array(
  'type1' => array( 'value' => 'type1', 'label' => __( 'Text', 'tcd-w' ) ),
  'type2' => array( 'value' => 'type2', 'label' => __( 'Image', 'tcd-w' ) )
);


// ページ分割ナビのタイプ
global $pagenation_type_options;
$pagenation_type_options = array(
  'type1' => array( 'value' => 'type1', 'label' => __( 'Page numbers', 'tcd-w' ) ),
  'type2' => array( 'value' => 'type2', 'label' => __( 'Read more button', 'tcd-w' ) )
);


// スライダーのキャッチフレーズの方向
global $catch_direction_options;
$catch_direction_options = array(
 'type1' => array('value' => 'type1', 'label' => __( 'Horizontal', 'tcd-w' )),
 'type2' => array('value' => 'type2', 'label' => __( 'Vertical', 'tcd-w' ))
);


// トップページの診療科目のレイアウト
global $index_course_layout_options;
$index_course_layout_options = array(
 'type1' => array('value' => 'type1', 'label' => __( '2 column layout', 'tcd-w' )),
 'type2' => array('value' => 'type2', 'label' => __( '3 column layout', 'tcd-w' ))
);


// トップページの診療科目のリンク先
global $index_course_link_options;
$index_course_link_options = array(
 'type1' => array('value' => 'type1', 'label' => __( 'Link to course archive page', 'tcd-w' )),
 'type2' => array('value' => 'type2', 'label' => __( 'Link to course category page', 'tcd-w' ))
);


// フッターのコンタクトエリア
global $footer_contact_area_options;
$footer_contact_area_options = array(
 'type1' => array('value' => 'type1', 'label' => __( 'Display in all pages', 'tcd-w' )),
 'type2' => array('value' => 'type2', 'label' => __( 'Only display in front page', 'tcd-w' ))
);


// スライダーのアニメーション
global $slider_animation_options;
$slider_animation_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Zoom out', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Zoom in', 'tcd-w' )),
  'type3' => array('value' => 'type3','label' => __( 'No animation', 'tcd-w' ))
);


?>