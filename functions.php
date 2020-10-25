<?php

// 管理画面から不要なサイドメニューを削除
add_action('admin_menu', 'remove_menus');
function remove_menus()
{
  remove_menu_page('edit.php?post_type=course');
  remove_menu_page('edit.php?post_type=faq');
  remove_menu_page('edit.php?post_type=news');
}

// 言語ファイル --------------------------------------------------------------------------------
load_textdomain('tcd-w', dirname(__FILE__).'/languages/' . get_locale() . '.mo');


// hook wp_head --------------------------------------------------------------------------------
require get_template_directory() . '/functions/head.php';


// テーマオプション --------------------------------------------------------------------------------
require_once ( dirname(__FILE__) . '/admin/theme-options.php' );


// 更新通知 --------------------------------------------------------------------------------
require_once ( dirname(__FILE__) . '/functions/update_notifier.php' );


// Javascriptの読み込み -----------------------------------------------------------------------
function my_admin_scripts() {
  wp_enqueue_script( 'wp-color-picker');
  wp_enqueue_script('thickbox');
  wp_enqueue_script('media-upload');
  wp_enqueue_style('imgareaselect');
  wp_enqueue_style('jquery-ui-draggable');
  wp_enqueue_script('ml-widget-js', get_template_directory_uri().'/widget/js/script.js', '', '1.0.2', true);
  wp_enqueue_script('jquery.cookieTab', get_template_directory_uri().'/admin/js/jquery.cookieTab.js', '', '1.0.0', true);
  wp_enqueue_script('my_script', get_template_directory_uri().'/admin/js/my_script.js', '', '2.0.3', true);
  wp_enqueue_script('ml-rebox-js', get_template_directory_uri().'/admin/js/rebox/jquery-rebox.js', '', '1.0.0', true);
	wp_enqueue_media();//画像アップロード用
?>
<script type="text/javascript">
  var cfmf_text = { title:'<?php _e('Please select image', 'tcd-w'); ?>', button:'<?php _e('Use this image', 'tcd-w'); ?>' };
  var cfmf_video_text = { title:'<?php _e('Please select MP4 file', 'tcd-w'); ?>', button:'<?php _e('Use this MP4 file', 'tcd-w'); ?>' };
</script>
<?php
  wp_enqueue_script('cf-media-field', get_template_directory_uri().'/admin/js/cf-media-field.js', '', '1.3.0', true); //画像アップロード用
}
add_action('admin_print_scripts', 'my_admin_scripts');


// スタイルシートの読み込み -----------------------------------------------------------------------
function my_admin_styles() {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style('thickbox');
    wp_enqueue_style('my_widget_css', get_template_directory_uri() . '/widget/css/style.css','','1.0.0');
    wp_enqueue_style('my_admin_css', get_template_directory_uri() .'/admin/css/my_admin.css','','1.8.4');
    wp_enqueue_style('ml-rebox-style', get_template_directory_uri() . '/admin/js/rebox/jquery-rebox.css','','1.0.0');
}
add_action('admin_print_styles', 'my_admin_styles');

// ビジュアルエディタ用スタイルシートの読み込み
function wpdocs_theme_add_editor_styles() {
  add_editor_style('editor-style-02.css');//管理画面用のスタイルシートを変更した場合は、ファイルの名前と番号を変える （キャッシュ対策）
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );


// ページビルダー --------------------------------------------------------------------------------
require get_template_directory() . '/pagebuilder/pagebuilder.php';


// 並び替え --------------------------------------------------------------------------------
require get_template_directory() . '/functions/post_order.php';


// おすすめ記事 --------------------------------------------------------------------------------
require get_template_directory() . '/functions/recommend.php';


// meta title meta description  --------------------------------------------------------------------------------
require_once ( dirname(__FILE__) . '/functions/seo.php' );


// 管理画面の記事一覧、クイック編集 --------------------------------------------------------------------------------
require get_template_directory() . '/functions/admin_column.php';
require get_template_directory() . '/functions/quick_edit.php';


// カスタムフィールド --------------------------------------------------------------------------------
require get_template_directory() . '/functions/course_cf.php';
require get_template_directory() . '/functions/repeater.php';
require get_template_directory() . '/functions/page_cf.php';
require get_template_directory() . '/functions/blog_cf.php';


// カスタムCSS --------------------------------------------------------------------------------
require get_template_directory() . '/functions/custom_css.php';


// ビジュアルエディタにクイックタグを追加 --------------------------------------------------------------------------------
require get_template_directory() . '/functions/custom_editor.php';


// ショートコード --------------------------------------------------------------------------------
require get_template_directory() . '/functions/short_code.php';


// 固定ページの追加機能 --------------------------------------------------------------------------------
require get_template_directory() . '/functions/page_ad_post_list.php';


// ウィジェット ------------------------------------------------------------------------
require_once ( dirname(__FILE__) . '/widget/ad.php' );
require_once ( dirname(__FILE__) . '/widget/styled_post_list1.php' );
require_once ( dirname(__FILE__) . '/widget/styled_post_list2.php' );
require_once ( dirname(__FILE__) . '/widget/tab_post_list.php' );
require_once ( dirname(__FILE__) . '/widget/google_search.php' );
require_once ( dirname(__FILE__) . '/widget/custom_menu.php' );
require_once ( dirname(__FILE__) . '/widget/custom_drop_menu.php' );
require_once ( dirname(__FILE__) . '/widget/user_profile.php' );
require_once ( dirname(__FILE__) . '/widget/category_list.php' );
require_once ( dirname(__FILE__) . '/widget/archive_list.php' );

// デフォルトのアーカイブウィジェットの文言を変更
add_filter( 'gettext', 'change_widget_text', 10, 3 );
function change_widget_text( $translated, $original, $domain ) {
  if ( $translated == "月を選択" ) {
    $translated = "アーカイブ";
  }
  if ( $translated == "月を選択してください" ) {
    $translated = "アーカイブ";
  }
  return $translated;
}


// カスタムページリンク  --------------------------------------------------------------------------------
require_once ( dirname(__FILE__) . '/functions/custom_page_link.php' );


// OGP tag  -------------------------------------------------------------------------------------------
require get_template_directory() . '/functions/ogp.php';


// 次のページリンク  --------------------------------------------------------------------------------
require_once ( dirname(__FILE__) . '/functions/next_prev.php' );


// 診療科目カテゴリ―の追加情報 --------------------------------------------------------------------------------
require get_template_directory() . '/functions/course_category.php';


//ロゴ用関数 --------------------------------------------------------------------------------
require_once ( dirname(__FILE__) . '/functions/logo.php' );


// アクセス数 --------------------------------------------------------------------------------
//require_once ( dirname(__FILE__) . '/functions/views.php' );


// パスワード保護
require_once ( dirname(__FILE__) . '/functions/password_form.php' );


// ビジュアルエディタに表(テーブル)の機能を追加 -----------------------------------------------
function mce_external_plugins_table($plugins) {
//    $plugins['table'] = 'https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.4/plugins/table/plugin.min.js';
    $plugins['table'] = '//cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.1/plugins/table/plugin.js';
    return $plugins;
}
add_filter( 'mce_external_plugins', 'mce_external_plugins_table' );

// tinymceのtableボタンにclass属性プルダウンメニューを追加
function mce_buttons_table($buttons) {
    $buttons[] = 'table';
    return $buttons;
}
add_filter( 'mce_buttons', 'mce_buttons_table' );

function bootstrap_classes_tinymce($settings) {
  $styles = array(
    array('title' => __('Default style', 'tcd-w'), 'value' => ''),
    array('title' => __('No border', 'tcd-w'), 'value' => 'table_no_border'),
    array('title' => __('Display only horizontal border', 'tcd-w'), 'value' => 'table_border_horizontal')
  );
  $settings['table_class_list'] = json_encode($styles);
  return $settings;
}
add_filter('tiny_mce_before_init', 'bootstrap_classes_tinymce');


// ico形式のファイルをアップロードできるようにする（ファビコンに利用）---------------------------------------------------------------------
function my_myme_types($mime_types){
  $existing_mimes['ico'] = 'images/ico';
  return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);


// ユーザーエージェントを判定するための関数---------------------------------------------------------------------
function is_mobile() {

  //タブレットも含める場合はwp_is_mobile()

  $match = 0;

  $ua = array(
   'iPhone', // iPhone
   'iPod', // iPod touch
   'Android.*Mobile', // 1.5+ Android *** Only mobile
   'Windows.*Phone', // *** Windows Phone
   'dream', // Pre 1.5 Android
   'CUPCAKE', // 1.5+ Android
   'BlackBerry', // BlackBerry
   'BB10', // BlackBerry10
   'webOS', // Palm Pre Experimental
   'incognito', // Other iPhone browser
   'webmate' // Other iPhone browser
  );

  $pattern = '/' . implode( '|', $ua ) . '/i';
  $match   = preg_match( $pattern, $_SERVER['HTTP_USER_AGENT'] );

  if ( $match === 1 ) {
    return TRUE;
  } else {
    return FALSE;
  }

}


// スクリプトのバージョン管理 ----------------------------------------------------------------------------------------------
function version_num() {

 if (function_exists('wp_get_theme')) {
   $theme_data = wp_get_theme();
 } else {
   $theme_data = get_theme_data(TEMPLATEPATH . '/style.css');
 };

 $current_version = $theme_data['Version'];

 return $current_version;

};


// ウィジェットの設定 ------------------------------------------------------------------------------
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'before_widget' => '<div class="side_widget clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline"><span>',
        'after_title' => "</span></h3>",
        'name' => __('Common widget', 'tcd-w'),
        'id' => 'common_widget'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="side_widget clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline"><span>',
        'after_title' => "</span></h3>",
        'name' => __('Post page', 'tcd-w'),
        'id' => 'single_widget'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="side_widget clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline"><span>',
        'after_title' => "</span></h3>",
        'name' => __('Post page (mobile)', 'tcd-w'),
        'description' => __('This widget will be replaced with normal widget when a user accesses the site by smartphone.', 'tcd-w'),
        'id' => 'single_widget_mobile'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="side_widget clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline"><span>',
        'after_title' => "</span></h3>",
        'name' => __('News page', 'tcd-w'),
        'id' => 'news_widget'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="side_widget clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline"><span>',
        'after_title' => "</span></h3>",
        'name' => __('News page (mobile)', 'tcd-w'),
        'id' => 'news_widget_mobile'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="side_widget clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline"><span>',
        'after_title' => "</span></h3>",
        'name' => __('Pages', 'tcd-w'),
        'id' => 'page_widget'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="side_widget clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline"><span>',
        'after_title' => "</span></h3>",
        'name' => __('Pages (mobile)', 'tcd-w'),
        'description' => __('This widget will be replaced with normal widget when a user accesses the site by smartphone.', 'tcd-w'),
        'id' => 'page_widget_mobile'
    ));
}


// オリジナルの抜粋記事 --------------------------------------------------------------------------------
function new_excerpt($a) {

 if(has_excerpt()) { 

   $base_content = get_the_excerpt();
   $base_content = str_replace(array("\r\n", "\r", "\n"), "", $base_content);
   $trim_content = mb_substr($base_content, 0, $a ,"utf-8");

 } else {

   $base_content = get_the_content();
   $base_content = preg_replace('!<style.*?>.*?</style.*?>!is', '', $base_content);
   $base_content = preg_replace('!<script.*?>.*?</script.*?>!is', '', $base_content);
   $base_content = preg_replace('/\[.+\]/','', $base_content);
   $base_content = strip_tags($base_content);
   $trim_content = mb_substr($base_content, 0, $a,"utf-8");
   $trim_content = str_replace(']]>', ']]&gt;', $trim_content);
   $trim_content = str_replace(array("\r\n", "\r", "\n" , "&nbsp;"), "", $trim_content);
   $trim_content = htmlspecialchars($trim_content);

 };

 echo $trim_content . '…';

};

//抜粋からPタグを取り除く
remove_filter( 'the_excerpt', 'wpautop' );


// 記事タイトルの文字数制限 --------------------------------------------------------------------------------
function trim_title($num) {
 $base_title = strip_tags(get_the_title());
 $trim_title = mb_substr($base_title, 0, $num ,"utf-8");
 $count_title = mb_strlen($trim_title,"utf-8");
 if($count_title > $num-1) {
  echo $trim_title . '…';
 } else {
  echo $trim_title;
 };
};

/* ショートコード用 */
function trim_title_sc($num) {
 $base_title = get_the_title();
 $trim_title = mb_substr($base_title, 0, $num ,"utf-8");
 $count_title = mb_strwidth($trim_title,"utf-8");
 if($count_title > $num-1) {
  return $trim_title . '…';
 } else {
  return $trim_title;
 };
};


// タイトルをエンコード --------------------------------------------------------------------------------
function get_encoded_title($title){
  return urlencode(mb_convert_encoding($title, "UTF-8"));
}


// セルフピンバックを禁止する -------------------------------------------------------------------------------------
function no_self_ping( &$links ) {
  $home = home_url();
  foreach ( $links as $l => $link )
  if ( 0 === strpos( $link, $home ) )
  unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_ping' );


// RSS用のフィードを追加 ---------------------------------------------------------------------------------------------------
add_theme_support( 'automatic-feed-links' );


//　ヘッダーから余分なMETA情報を削除 --------------------------------------------------------------------
remove_action( 'wp_head', 'wp_generator' ); 
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );


// 固定ページからアイキャッチ用meta boxを削除 -----------------------------------------------------------
function remove_image_metabox_from_page() {
  remove_meta_box( 'postimagediv', 'page', 'side' );
}
add_action( 'do_meta_boxes' , 'remove_image_metabox_from_page' );


// インラインスタイルを取り除く --------------------------------------------------------------------------------
function remove_recent_comments_style() {
  global $wp_widget_factory;
  remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'remove_recent_comments_style' );

function remove_adminbar_inline_style() {
  remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_adminbar_inline_style');


//　サムネイルの設定 --------------------------------------------------------------------------------
if ( function_exists('add_theme_support') ) {
	add_theme_support( 'post-thumbnails' );
 	add_image_size( 'size1', 400, 400, true );
 	add_image_size( 'size2', 786, 556, true ); //トップページ　3点ブロック
  add_image_size( 'size3', 830, 510, true ); //ブログ、NEWS、カテゴリー
  add_image_size( 'slider_size', 1180, 680, true ); //画像スライダー用
}
// アイキャッチ画像登録欄に説明文を追加
function filter_featured_image_admin_text( $content, $post_id, $thumbnail_id ){
  $screen = get_current_screen();
  if ($screen->post_type == 'course') {
    $desc = '<p>' . _e( 'Recommend image size. Width:150px, Height:150px', 'tcd-w' ) . '</p>';
    return $content . $desc;
  } else {
    return $content;
  };
}
add_filter( 'admin_post_thumbnail_html', 'filter_featured_image_admin_text', 10, 3 );



// カスタムメニューの設定 --------------------------------------------------------------------------------
if(function_exists('register_nav_menu')) {
  register_nav_menu( 'global-menu', __( 'Global menu', 'tcd-w' ) );
  register_nav_menu( 'footer-menu', __( 'Footer menu', 'tcd-w' ) );
}


// ページナビ用 --------------------------------------------------------------------------------
function show_posts_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
};


// 絵文字を消す ------------------------------------------------------------------
function disable_emoji() {
     $options = get_design_plus_option();
     if($options['use_emoji'] == 0) {
       remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
       remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
       remove_action( 'wp_print_styles', 'print_emoji_styles' );
       remove_action( 'admin_print_styles', 'print_emoji_styles' );    
       remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
       remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );    
       remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
     };
}
add_action( 'init', 'disable_emoji' );


// bodyタグにclassを追加 --------------------------------------------------------------------------------
function ml_body_classes($classes) {
    global $wp_query, $post;
    $options = get_design_plus_option();
    if ($options['header_fix'] == 'type2') { $classes[] = 'fix_top'; };
    if ($options['layout'] == 'type2') { $classes[] = 'layout2'; };
    if (is_page_template('page-noside.php') || is_page_template('page-noside-notitle.php')) { $classes[] = 'no_side_content'; };
    if ($options['mobile_header_fix'] == 'type2') { $classes[] = 'mobile_header_fix'; };
    if (wp_is_mobile()) { $classes[] = 'mobile_device'; };
    if ( is_mobile() && ($options['footer_bar_display'] == 'type1') ) { $classes[] = 'show_footer_bar dp-footer-bar-type1'; };
    if ( is_mobile() && ($options['footer_bar_display'] == 'type2') ) { $classes[] = 'show_footer_bar dp-footer-bar-type2'; };
    if($options['show_index_slider'] != 1) { $classes[] = 'no_header_slider'; };
    return array_unique($classes);
};
add_filter('body_class','ml_body_classes');


// HEXをRGBに変換 ------------------------------------------------------------------
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return $rgb;
}


// archive_title() 関数をカスタマイズ --------------------------------------------------------------------------------
function monolith_archive_title( $title ) {
	global $author, $post, $wp_query;
	if ( is_author() ) {
		$title = get_the_author_meta( 'display_name', $author );
	} elseif ( is_category() || is_tag() ) {
		$title = single_term_title( '', false );
	} elseif ( is_day() ) {
		$title = get_the_time( __( 'F jS, Y', 'tcd-w' ), $post );
	} elseif ( is_month() ) {
		$title = get_the_time( __( 'F, Y', 'tcd-w' ), $post );
	} elseif ( is_year() ) {
		$title = get_the_time( __( 'Y', 'tcd-w' ), $post );
	} elseif ( is_search() ) {
		if ( $wp_query->found_posts ) {
			//$title = sprintf( __( 'Search results for - ', 'tcd-w' ) . get_search_query() 
		} else {
			$title = __( 'Search result', 'tcd-w' );
		}
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'monolith_archive_title', 10 );


// カードリンクパーツ --------------------------------------------------------------------------------------
add_image_size( 'size-card', 120, 120, true );

function get_the_custom_excerpt($content, $length) {
  $length = ($length ? $length : 70);//デフォルトの長さを指定する
  $content =  preg_replace('/<!--more-->.+/is',"",$content); //moreタグ以降削除
  $content =  strip_shortcodes($content);//ショートコード削除
  $content =  strip_tags($content);//タグの除去
  $content =  str_replace("&nbsp;","",$content);//特殊文字の削除（今回はスペースのみ）
  $content =  mb_substr($content,0,$length);//文字列を指定した長さで切り取る
  return $content.'...';
}
 
//カードリンクショートコード
function clink_scode($atts) {
  extract(shortcode_atts(array(
    'url'=>"",
    'title'=>"",
    'excerpt'=>""
    ),$atts));
 
  $id = url_to_postid($url);//URLから投稿IDを取得
  $post = get_post($id);//IDから投稿情報の取得
  $date = mysql2date('Y.m.d', $post->post_date);//投稿日の取得
 
  $img_width ="120";//画像サイズの幅指定
  $img_height = "120";//画像サイズの高さ指定
  $no_image = get_template_directory_uri().'/img/common/no_image1.gif';

  //抜粋を取得
  if(empty($excerpt)){
  if($post->post_excerpt){
      $excerpt = get_the_custom_excerpt($post->post_excerpt , 120);
 
  }else{
      $excerpt = get_the_custom_excerpt($post->post_content , 120);
  }
  }
  
  //タイトルを取得
  if(empty($title)){
        $title = esc_html(get_the_title($id));
    }
 
  //アイキャッチ画像を取得 
  if(has_post_thumbnail($id)) {
        $img = wp_get_attachment_image_src(get_post_thumbnail_id($id),'size-card');
        $img_tag = "<img src='" . $img[0] . "' alt='{$title}' width=" . $img[1] . " height=" . $img[2] . " />";
        } else { $img_tag ='<img src="'.$no_image.'" alt="" width="'.$img_width.'" height="'.$img_height.'" />';
    }
 
        $clink ='<div class="cardlink"><a href="'. $url .'"><div class="cardlink_thumbnail">'. $img_tag .'</a></div><div class="cardlink_content"><span class="timestamp">'.$date.'</span><div class="cardlink_title"><a href="'. $url .'">'. $title .' </a></div><div class="cardlink_excerpt">' . $excerpt . '</div></div><div class="cardlink_footer"></div></div>';
 
        return $clink;
      }  
 
add_shortcode("clink", "clink_scode");


// カスタムコメント --------------------------------------------------------------------------------------

if (function_exists('wp_list_comments')) {
	// comment count
	add_filter('get_comments_number', 'comment_count', 0);
	function comment_count( $commentcount ) {
		global $id;
		$_commnets = get_comments('post_id=' . $id);
		$comments_by_type = separate_comments($_commnets);
		return count($comments_by_type['comment']);
	}
}


function custom_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	global $commentcount;
	if(!$commentcount) {
		$commentcount = 0;
	}
?>

 <li class="comment <?php if($comment->comment_author_email == get_the_author_meta('email')) {echo 'admin-comment';} else {echo 'guest-comment';} ?>" id="comment-<?php comment_ID() ?>">
  <div class="comment-meta clearfix">
   <div class="comment-meta-left">
  <?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 35); } ?>
  
    <ul class="comment-name-date">
     <li class="comment-name">
<?php if (get_comment_author_url()) : ?>
<a id="commentauthor-<?php comment_ID() ?>" class="url <?php if($comment->comment_author_email == get_the_author_meta('email')) {echo 'admin-url';} else {echo 'guest-url';} ?>" href="<?php comment_author_url() ?>" rel="nofollow">
<?php else : ?>
<span id="commentauthor-<?php comment_ID() ?>">
<?php endif; ?>

<?php comment_author(); ?>

<?php if(get_comment_author_url()) : ?>
</a>
<?php else : ?>
</span>
<?php endif;  $options = get_option('tcd-w_options'); ?>
     </li>
     <li class="comment-date"><?php echo get_comment_time(__('F jS, Y', 'tcd-w')); if ($options['time_stamp']) : echo get_comment_time(__(' g:ia', 'tcd-w')); endif; ?></li>
    </ul>
   </div>

   <ul class="comment-act">
<?php if (function_exists('comment_reply_link')) { 
        if ( get_option('thread_comments') == '1' ) { ?>
    <li class="comment-reply"><?php comment_reply_link(array_merge( $args, array('add_below' => 'comment-content', 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => '<span><span>'.__('REPLY','tcd-w').'</span></span>'))) ?></li>
<?php   } else { ?>
    <li class="comment-reply"><a href="javascript:void(0);" onclick="MGJS_CMT.reply('commentauthor-<?php comment_ID() ?>', 'comment-<?php comment_ID() ?>', 'comment');"><?php _e('REPLY', 'tcd-w'); ?></a></li>
<?php   }
      } else { ?>
    <li class="comment-reply"><a href="javascript:void(0);" onclick="MGJS_CMT.reply('commentauthor-<?php comment_ID() ?>', 'comment-<?php comment_ID() ?>', 'comment');"><?php _e('REPLY', 'tcd-w'); ?></a></li>
<?php } ?>
    <li class="comment-quote"><a href="javascript:void(0);" onclick="MGJS_CMT.quote('commentauthor-<?php comment_ID() ?>', 'comment-<?php comment_ID() ?>', 'comment-content-<?php comment_ID() ?>', 'comment');"><?php _e('QUOTE', 'tcd-w'); ?></a></li>
    <?php edit_comment_link(__('EDIT', 'tcd-w'), '<li class="comment-edit">', '</li>'); ?>
   </ul>

  </div>
  <div class="comment-content post_content" id="comment-content-<?php comment_ID() ?>">
  <?php if ($comment->comment_approved == '0') : ?>
   <span class="comment-note"><?php _e('Your comment is awaiting moderation.', 'tcd-w'); ?></span>
  <?php endif; ?>
  <?php comment_text(); ?>
  </div>

<?php

}


// カスタム投稿　「診療科目」を追加 ----------------------------------------------------------------

if ( function_exists('register_post_type') ) {
 $options = get_design_plus_option();
 if($options['course_slug']) {
   $slug = sanitize_title($options['course_slug']);
 } else {
   $slug = 'course';
 };
 if($options['archive_course_title']){
   $name = $options['archive_course_title'];
 }else{
   $name = __('Course', 'tcd-w');
 }
 $labels = array(
  'name' => $name,
  'singular_name' => $name,
  'add_new' => __('Add New', 'tcd-w'),
  'add_new_item' => __('Add New Item', 'tcd-w'),
  'edit_item' => __('Edit', 'tcd-w'),
  'new_item' => __('New item', 'tcd-w'),
  'view_item' => __('View Item', 'tcd-w'),
  'search_items' => __('Search Items', 'tcd-w'),
  'not_found' => __('Not Found', 'tcd-w'),
  'not_found_in_trash' => __('Not found in trash', 'tcd-w'), 
  'parent_item_colon' => ''
 );

 register_post_type('course', array(
  'label' => __('Course', 'tcd-w'),
  'labels' => $labels,
  'public' => true,
  'publicly_queryable' => true,
  'menu_position' => 5,
  'show_ui' => true,
  'query_var' => true,
  'rewrite' => array('slug' => $slug),
  'capability_type' => 'post',
  'has_archive' => true,
  'hierarchical' => true,
  'supports' => array('title','thumbnail')
 ));
};


// 診療科目のカテゴリーを追加
$args_course_category = array(
  'label' => __('Course category', 'tcd-w'),
  'labels' => array(
    'name' => __('Course category', 'tcd-w'),
    'singular_name' => __('Course category', 'tcd-w'),
    'search_items' => __('Search category', 'tcd-w'),
    'popular_items' => __('Popular category', 'tcd-w'),
    'all_items' => __('All category', 'tcd-w'),
    'parent_item' => __('Parent category', 'tcd-w'),
    'edit_item' => __('Edit category', 'tcd-w'),
    'update_item' => __('Update category', 'tcd-w'),
    'add_new_item' => __('Add New category', 'tcd-w'),
    'new_item_name' => __('Name of new category', 'tcd-w'),
  ),
  'public' => true,
  'show_ui' => true,
  'show_admin_column' => true,
  'hierarchical' => true,
  'rewrite' => array('hierarchical' => false ),
);
register_taxonomy('course_category', 'course', $args_course_category);


// 診療科目の子カテゴリーを隠す
function cpt_hide_child_cat() {
  global $post_type;
  if( is_admin() && $post_type == 'course' ){
?>
<style>
.form-field.term-parent-wrap { display:none !important; }
.wp-admin.post-php .categorydiv .wp-hidden-children { display:none !important; }
.wp-admin.post-new-php .categorydiv .wp-hidden-children { display:none !important; }
</style>
<?php
  };
}
add_action( 'admin_footer', 'cpt_hide_child_cat' );


// 診療科目カテゴリ―編集画面にIDを表示する
function add_category_id_col($columns){
  $columns['id'] = 'ID';
    return $columns;
  }
add_filter('manage_edit-course_category_columns','add_category_id_col');

function show_category_id_in_admin($value, $column_name, $id){
  if($column_name == 'id'){
    echo $id;
  }
}
add_action('manage_course_category_custom_column','show_category_id_in_admin',10,3);


// カスタム投稿　「お知らせ」を追加 ----------------------------------------------------------------

if ( function_exists('register_post_type') ) {
 $options = get_design_plus_option();
 if($options['news_slug']) {
   $slug = sanitize_title($options['news_slug']);
 } else {
   $slug = 'news';
 };
 if($options['archive_news_title']){
   $name = $options['archive_news_title'];
 }else{
   $name = __('News', 'tcd-w');
 }
 $labels = array(
  'name' => $name,
  'singular_name' => $name,
  'add_new' => __('Add New', 'tcd-w'),
  'add_new_item' => __('Add New Item', 'tcd-w'),
  'edit_item' => __('Edit', 'tcd-w'),
  'new_item' => __('New item', 'tcd-w'),
  'view_item' => __('View Item', 'tcd-w'),
  'search_items' => __('Search Items', 'tcd-w'),
  'not_found' => __('Not Found', 'tcd-w'),
  'not_found_in_trash' => __('Not found in trash', 'tcd-w'), 
  'parent_item_colon' => ''
 );

 register_post_type('news', array(
  'label' => __('News', 'tcd-w'),
  'labels' => $labels,
  'public' => true,
  'publicly_queryable' => true,
  'menu_position' => 5,
  'show_ui' => true,
  'query_var' => true,
  'rewrite' => array('slug' => $slug),
  'capability_type' => 'post',
  'has_archive' => true,
  'hierarchical' => true,
  'supports' => array('title','editor','thumbnail')
 ));
};


// カスタム投稿　「Q&A」を追加 ----------------------------------------------------------------

if ( function_exists('register_post_type') ) {
 $options = get_design_plus_option();
 if($options['faq_slug']) {
   $slug = sanitize_title($options['faq_slug']);
 } else {
   $slug = 'faq';
 };
 if($options['archive_faq_title']){
   $name = $options['archive_faq_title'];
 }else{
   $name = __('FAQ', 'tcd-w');
 }
 $labels = array(
  'name' => $name,
  'singular_name' => $name,
  'add_new' => __('Add New', 'tcd-w'),
  'add_new_item' => __('Add New Item', 'tcd-w'),
  'edit_item' => __('Edit', 'tcd-w'),
  'new_item' => __('New item', 'tcd-w'),
  'view_item' => __('View Item', 'tcd-w'),
  'search_items' => __('Search Items', 'tcd-w'),
  'not_found' => __('Not Found', 'tcd-w'),
  'not_found_in_trash' => __('Not found in trash', 'tcd-w'), 
  'parent_item_colon' => ''
 );

 register_post_type('faq', array(
  'label' => __('FAQ', 'tcd-w'),
  'labels' => $labels,
  'public' => true,
  'publicly_queryable' => true,
  'menu_position' => 5,
  'show_ui' => true,
  'query_var' => true,
  'rewrite' => array('slug' => $slug),
  'capability_type' => 'post',
  'has_archive' => true,
  'hierarchical' => true,
  'supports' => array('title','editor')
 ));
};


// カスタム投稿の並び順を日付順に変更 --------------------------------------------------------------------------------
function my_post_types_admin_order( $wp_query ) {
  if ( is_admin() && !isset( $_GET['orderby'] ) ) {
    $post_type = $wp_query->query['post_type'];
    if ( in_array( $post_type, array('news') ) ) {
      $wp_query->set('orderby', 'date');
      $wp_query->set('order', 'DESC');
    }
  };
}
add_filter('pre_get_posts', 'my_post_types_admin_order');


// お知らせアーカイブページの記事数を変更
function change_news_num( $query ) {
  $options = get_design_plus_option();
  if(!empty($options['archive_news_num'])) {
    $post_num = $options['archive_news_num'];
  } else {
    $post_num = 10;
  };
  if( !is_admin() && is_post_type_archive('news')) {
    if($query->is_main_query()) {
      $query->set('posts_per_page', $post_num);
      return;
    };
  }
}
add_action( 'pre_get_posts', 'change_news_num' );


// FAQアーカイブページの記事数を変更
function change_faq_num( $query ) {
  $options = get_design_plus_option();
  if(!empty($options['archive_faq_num'])) {
    $post_num = $options['archive_faq_num'];
  } else {
    $post_num = 10;
  };
  if( !is_admin() && is_post_type_archive('faq')) {
    if($query->is_main_query()) {
      $query->set('posts_per_page', $post_num);
      return;
    };
  }
}
add_action( 'pre_get_posts', 'change_faq_num' );


?>
