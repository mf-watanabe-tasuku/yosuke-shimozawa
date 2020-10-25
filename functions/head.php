<?php
     function tcd_head() {
       $options = get_design_plus_option();
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/design-plus.css?ver=<?php echo version_num(); ?>">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/sns-botton.css?ver=<?php echo version_num(); ?>">
<link rel="stylesheet" media="screen and (max-width:1280px)" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css?ver=<?php echo version_num(); ?>">
<link rel="stylesheet" media="screen and (max-width:1280px)" href="<?php echo get_template_directory_uri(); ?>/css/footer-bar.css?ver=<?php echo version_num(); ?>">

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.3.js?ver=<?php echo version_num(); ?>"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jscript.js?ver=<?php echo version_num(); ?>"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/comment.js?ver=<?php echo version_num(); ?>"></script>
<?php if(is_mobile()) { ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/footer-bar.js?ver=<?php echo version_num(); ?>"></script>
<?php }; ?>
<?php if($options['header_fix'] == 'type2') { ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/header_fix.js?ver=<?php echo version_num(); ?>"></script>
<?php }; ?>

<?php if(is_front_page() && ($options['show_index_gmap'] == 1) ) { ?>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo esc_attr( $options['gmap_api_key'] ); ?>" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/pagebuilder/assets/js/googlemap.js?ver=<?php echo version_num(); ?>"></script>
<link rel='stylesheet' id='page_builder-googlemap-css'  href='<?php echo get_template_directory_uri(); ?>/pagebuilder/assets/css/googlemap.css?ver=<?php echo version_num(); ?>' type='text/css' media='all' />
<?php }; ?>

<style type="text/css">
<?php
     // フォント・ロゴ関連の設定はここから　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
     if (strtoupper(get_locale()) == 'JA') { // if wordpress is japanese mode
?>

<?php if($options['font_type'] == 'type1') { ?>
body, input, textarea { font-family: Arial, "ヒラギノ角ゴ ProN W3", "Hiragino Kaku Gothic ProN", "メイリオ", Meiryo, sans-serif; }
<?php } elseif($options['font_type'] == 'type2') { ?>
body, input, textarea { font-family: "Segoe UI", Verdana, "游ゴシック", YuGothic, "Hiragino Kaku Gothic ProN", Meiryo, sans-serif; }
<?php } else { ?>
body, input, textarea { font-family: "Times New Roman" , "游明朝" , "Yu Mincho" , "游明朝体" , "YuMincho" , "ヒラギノ明朝 Pro W3" , "Hiragino Mincho Pro" , "HiraMinProN-W3" , "HGS明朝E" , "ＭＳ Ｐ明朝" , "MS PMincho" , serif; }
<?php }; ?>

<?php if($options['headline_font_type'] == 'type1') { ?>
.rich_font, .p-vertical { font-family: Arial, "ヒラギノ角ゴ ProN W3", "Hiragino Kaku Gothic ProN", "メイリオ", Meiryo, sans-serif; }
<?php } elseif($options['headline_font_type'] == 'type2') { ?>
.rich_font, .p-vertical { font-family: "Hiragino Sans", "ヒラギノ角ゴ ProN", "Hiragino Kaku Gothic ProN", "游ゴシック", YuGothic, "メイリオ", Meiryo, sans-serif; font-weight:500; }
<?php } else { ?>
.rich_font, .p-vertical { font-family: "Times New Roman" , "游明朝" , "Yu Mincho" , "游明朝体" , "YuMincho" , "ヒラギノ明朝 Pro W3" , "Hiragino Mincho Pro" , "HiraMinProN-W3" , "HGS明朝E" , "ＭＳ Ｐ明朝" , "MS PMincho" , serif; font-weight:500; }
<?php }; ?>

<?php if($options['footer_tel_number_font_type'] == 'type1') { ?>
#footer_tel .number { font-family: Arial, "ヒラギノ角ゴ ProN W3", "Hiragino Kaku Gothic ProN", "メイリオ", Meiryo, sans-serif; }
<?php } elseif($options['footer_tel_number_font_type'] == 'type2') { ?>
#footer_tel .number { font-family: "Hiragino Sans", "ヒラギノ角ゴ ProN", "Hiragino Kaku Gothic ProN", "游ゴシック", YuGothic, "メイリオ", Meiryo, sans-serif; font-weight:500; }
<?php } else { ?>
#footer_tel .number { font-family: "Times New Roman" , "游明朝" , "Yu Mincho" , "游明朝体" , "YuMincho" , "ヒラギノ明朝 Pro W3" , "Hiragino Mincho Pro" , "HiraMinProN-W3" , "HGS明朝E" , "ＭＳ Ｐ明朝" , "MS PMincho" , serif; font-weight:500; }
<?php }; ?>

<?php
     if(is_front_page()){
       if($options['show_index_slider'] == 1) {
?>
#header_slider .caption .title.font_style_type1 { font-family: Arial, "ヒラギノ角ゴ ProN W3", "Hiragino Kaku Gothic ProN", "メイリオ", Meiryo, sans-serif; }
#header_slider .caption .title.font_style_type2 { font-family: "Hiragino Sans", "ヒラギノ角ゴ ProN", "Hiragino Kaku Gothic ProN", "游ゴシック", YuGothic, "メイリオ", Meiryo, sans-serif; font-weight:500; }
#header_slider .caption .title.font_style_type3 { font-family: "Times New Roman" , "游明朝" , "Yu Mincho" , "游明朝体" , "YuMincho" , "ヒラギノ明朝 Pro W3" , "Hiragino Mincho Pro" , "HiraMinProN-W3" , "HGS明朝E" , "ＭＳ Ｐ明朝" , "MS PMincho" , serif; font-weight:500; }
<?php }; }; ?>

<?php if(is_404() && $options['font_type_404'] == 'type1') { ?>
#header_image_for_404 .headline { font-family: Arial, "ヒラギノ角ゴ ProN W3", "Hiragino Kaku Gothic ProN", "メイリオ", Meiryo, sans-serif; }
<?php } elseif(is_404() && $options['font_type_404'] == 'type2') { ?>
#header_image_for_404 .headline { font-family: "Hiragino Sans", "ヒラギノ角ゴ ProN", "Hiragino Kaku Gothic ProN", "游ゴシック", YuGothic, "メイリオ", Meiryo, sans-serif; font-weight:500; }
<?php } else { ?>
#header_image_for_404 .headline { font-family: "Times New Roman" , "游明朝" , "Yu Mincho" , "游明朝体" , "YuMincho" , "ヒラギノ明朝 Pro W3" , "Hiragino Mincho Pro" , "HiraMinProN-W3" , "HGS明朝E" , "ＭＳ Ｐ明朝" , "MS PMincho" , serif; font-weight:500; }
<?php }; ?>

<?php }; // END if japanese mode ?>


<?php if($options['use_logo_image'] != 'yes'){ ?>
.pc #header .logo { font-size:<?php echo esc_html($options['logo_font_size']); ?>px; }
.mobile #header .logo { font-size:<?php echo esc_html($options['logo_font_size_mobile']); ?>px; }
<?php }; ?>

#post_title { font-size:<?php echo esc_html($options['title_font_size']); ?>px; color:<?php echo esc_html($options['blog_title_color']); ?>; }
.post_content { font-size:<?php echo $options['content_font_size']; ?>px; color:<?php echo esc_html($options['blog_content_color']); ?>; }
.single-news #post_title { font-size:<?php echo esc_html($options['news_title_font_size']); ?>px; color:<?php echo esc_html($options['news_title_color']); ?>; }
.single-news .post_content { font-size:<?php echo $options['news_content_font_size']; ?>px; color:<?php echo esc_html($options['news_content_color']); ?>; }

.mobile #post_title { font-size:<?php echo esc_html($options['title_font_size_mobile']); ?>px; }
.mobile .post_content { font-size:<?php echo $options['content_font_size_mobile']; ?>px; }
.mobile .single-news #post_title { font-size:<?php echo esc_html($options['news_title_font_size_mobile']); ?>px; }
.mobile .single-news .post_content { font-size:<?php echo $options['news_content_font_size_mobile']; ?>px; }

body.page .post_content { font-size:<?php echo $options['page_content_font_size']; ?>px; color:<?php echo esc_html($options['page_content_color']); ?>; }
#page_title { font-size:<?php echo esc_html($options['page_headline_font_size']); ?>px; color:<?php echo esc_html($options['page_headline_color']); ?>; }
#page_title span { font-size:<?php echo esc_html($options['page_sub_title_font_size']); ?>px; color:<?php echo esc_html($options['page_sub_title_color']); ?>; }

.mobile body.page .post_content { font-size:<?php echo $options['page_content_font_size_mobile']; ?>px; }
.mobile #page_title { font-size:<?php echo esc_html($options['page_headline_font_size_mobile']); ?>px; }
.mobile #page_title span { font-size:<?php echo esc_html($options['page_sub_title_font_size_mobile']); ?>px; }

<?php // パスワード保護 ?>
.c-pw__btn { background: <?php echo esc_html($options['main_color']); ?>; }
.post_content a, .post_content a:hover { color: <?php echo esc_html($options['content_link_color']); ?>; }

<?php
     if( is_404()) {
       $title_font_size_pc = ( ! empty( $options['header_txt_size_404'] ) ) ? $options['header_txt_size_404'] : 38;
       $sub_title_font_size_pc = ( ! empty( $options['header_sub_txt_size_404'] ) ) ? $options['header_sub_txt_size_404'] : 16;
       $title_font_size_mobile = ( ! empty( $options['header_txt_size_404_mobile'] ) ) ? $options['header_txt_size_404_mobile'] : 28;
       $sub_title_font_size_mobile = ( ! empty( $options['header_sub_txt_size_404_mobile'] ) ) ? $options['header_sub_txt_size_404_mobile'] : 14;
?>
#header_image_for_404 .headline { font-size:<?php echo esc_html($title_font_size_pc); ?>px; }
#header_image_for_404 .sub_title { font-size:<?php echo esc_html($sub_title_font_size_pc); ?>px; }
@media screen and (max-width:700px) {
  #header_image_for_404 .headline { font-size:<?php echo esc_html($title_font_size_mobile); ?>px; }
  #header_image_for_404 .sub_title { font-size:<?php echo esc_html($sub_title_font_size_mobile); ?>px; }
}
<?php }; ?>

<?php if( is_front_page()) { ?>
#index_intro .headline { font-size:<?php echo esc_html($options['index_intro_headline_font_size']); ?>px; }
#index_news .headline { font-size:<?php echo esc_html($options['index_news_headline_font_size']); ?>px; }
#index_wide_content .headline { font-size:<?php echo esc_html($options['index_wide_headline_font_size']); ?>px; }
#index_course .headline { font-size:<?php echo esc_html($options['index_course_headline_font_size']); ?>px; }
#index_blog .headline { font-size:<?php echo esc_html($options['index_blog_headline_font_size']); ?>px; }
#index_gmap .headline { font-size:<?php echo esc_html($options['index_gmap_headline_font_size']); ?>px; }
#index_headline_set1 .headline { font-size:<?php echo esc_html($options['index_headline_set_font_size1']); ?>px; }
#index_headline_set2 .headline { font-size:<?php echo esc_html($options['index_headline_set_font_size2']); ?>px; }
#index_headline_set3 .headline { font-size:<?php echo esc_html($options['index_headline_set_font_size3']); ?>px; }
@media screen and (max-width:700px) {
  #index_intro .headline { font-size:<?php echo esc_html($options['index_intro_headline_font_size_mobile']); ?>px; }
  #index_news .headline { font-size:<?php echo esc_html($options['index_news_headline_font_size_mobile']); ?>px; }
  #index_wide_content .headline { font-size:<?php echo esc_html($options['index_wide_headline_font_size_mobile']); ?>px; }
  #index_course .headline { font-size:<?php echo esc_html($options['index_course_headline_font_size_mobile']); ?>px; }
  #index_blog .headline { font-size:<?php echo esc_html($options['index_blog_headline_font_size_mobile']); ?>px; }
  #index_gmap .headline { font-size:<?php echo esc_html($options['index_gmap_headline_font_size_mobile']); ?>px; }
  #index_headline_set1 .headline { font-size:<?php echo esc_html($options['index_headline_set_font_size_mobile1']); ?>px; }
  #index_headline_set2 .headline { font-size:<?php echo esc_html($options['index_headline_set_font_size_mobile2']); ?>px; }
  #index_headline_set3 .headline { font-size:<?php echo esc_html($options['index_headline_set_font_size_mobile3']); ?>px; }
}
<?php }; ?>


<?php if(is_home()) { ?>
.blog #page_header .title { font-size:<?php echo esc_html($options['archive_blog_title_font_size']); ?>px; }
.blog #page_header .sub_title { font-size:<?php echo esc_html($options['archive_blog_sub_title_font_size']); ?>px; }
@media screen and (max-width:700px) {
  .blog #page_header .title { font-size:<?php echo esc_html($options['archive_blog_title_font_size_mobile']); ?>px; }
  .blog #page_header .sub_title { font-size:<?php echo esc_html($options['archive_blog_sub_title_font_size_mobile']); ?>px; }
}
<?php } elseif(is_archive()) { ?>
.archive #page_header .title { font-size:<?php echo esc_html($options['archive_blog_title_font_size']); ?>px; }
.archive #page_header .sub_title { font-size:<?php echo esc_html($options['archive_blog_sub_title_font_size']); ?>px; }
.post-type-archive-course #page_header .title { font-size:<?php echo esc_html($options['archive_course_title_font_size']); ?>px; }
.post-type-archive-course #page_header .sub_title { font-size:<?php echo esc_html($options['archive_course_sub_title_font_size']); ?>px; }
.post-type-archive-news #page_header .title { font-size:<?php echo esc_html($options['archive_news_title_font_size']); ?>px; }
.post-type-archive-news #page_header .sub_title { font-size:<?php echo esc_html($options['archive_news_sub_title_font_size']); ?>px; }
.post-type-archive-faq #page_header .title { font-size:<?php echo esc_html($options['archive_faq_title_font_size']); ?>px; }
.post-type-archive-faq #page_header .sub_title { font-size:<?php echo esc_html($options['archive_faq_sub_title_font_size']); ?>px; }
@media screen and (max-width:700px) {
  .archive #page_header .title { font-size:<?php echo esc_html($options['archive_blog_title_font_size_mobile']); ?>px; }
  .archive #page_header .sub_title { font-size:<?php echo esc_html($options['archive_blog_sub_title_font_size_mobile']); ?>px; }
  .post-type-archive-course #page_header .title { font-size:<?php echo esc_html($options['archive_course_title_font_size_mobile']); ?>px; }
  .post-type-archive-course #page_header .sub_title { font-size:<?php echo esc_html($options['archive_course_sub_title_font_size_mobile']); ?>px; }
  .post-type-archive-news #page_header .title { font-size:<?php echo esc_html($options['archive_news_title_font_size_mobile']); ?>px; }
  .post-type-archive-news #page_header .sub_title { font-size:<?php echo esc_html($options['archive_news_sub_title_font_size_mobile']); ?>px; }
  .post-type-archive-faq #page_header .title { font-size:<?php echo esc_html($options['archive_faq_title_font_size_mobile']); ?>px; }
  .post-type-archive-faq #page_header .sub_title { font-size:<?php echo esc_html($options['archive_faq_sub_title_font_size_mobile']); ?>px; }
}
<?php }; ?>

<?php if(is_tax()) { ?>
.tax-course_category #page_header .title { font-size:<?php echo esc_html($options['archive_course_title_font_size']); ?>px; }
.tax-course_category #page_header .sub_title { font-size:<?php echo esc_html($options['archive_course_sub_title_font_size']); ?>px; }
@media screen and (max-width:700px) {
  .tax-course_category #page_header .title { font-size:<?php echo esc_html($options['archive_course_title_font_size_mobile']); ?>px; }
  .tax-course_category #page_header .sub_title { font-size:<?php echo esc_html($options['archive_course_sub_title_font_size_mobile']); ?>px; }
}
<?php }; ?>

<?php if(is_page()) { ?>
.page #page_header .title { font-size:<?php echo esc_html($options['page_headline_font_size']); ?>px; }
.page #page_header .sub_title { font-size:<?php echo esc_html($options['page_sub_title_font_size']); ?>px; }
@media screen and (max-width:700px) {
  .page #page_header .title { font-size:<?php echo esc_html($options['page_headline_font_size_mobile']); ?>px; }
  .page #page_header .sub_title { font-size:<?php echo esc_html($options['page_sub_title_font_size_mobile']); ?>px; }
}
<?php }; ?>

<?php
     // サムネイルのアニメーション設定はここから　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
     if($options['hover_type']!="type4"){
       if($options['hover_type']=="type1"){ // type1 zoom effect------------------------------------------------------------
?>
#related_post .image img, .styled_post_list1 .image img, .styled_post_list2 .image img, .widget_tab_post_list .image img, #blog_list .image img, #news_archive_list .image img,
  #index_blog_list .image img, #index_3box .image img, #index_news_list .image img, #archive_news_list .image img, #footer_content .image img
{
  width:100%; height:auto;
  -webkit-transition: transform  0.75s ease; -moz-transition: transform  0.75s ease; transition: transform  0.75s ease;
}
#related_post .image:hover img, .styled_post_list1 .image:hover img, .styled_post_list2 .image:hover img, .widget_tab_post_list .image:hover img, #blog_list .image:hover img, #news_archive_list .image:hover img,
  #index_blog_list .image:hover img, #index_3box .image:hover img, #index_news_list .image:hover img, #archive_news_list .image:hover img, #footer_content .image:hover img
{
  -webkit-transform: scale(<?php echo $options['hover1_zoom']; ?>);
  -moz-transform: scale(<?php echo $options['hover1_zoom']; ?>);
  -ms-transform: scale(<?php echo $options['hover1_zoom']; ?>);
  -o-transform: scale(<?php echo $options['hover1_zoom']; ?>);
  transform: scale(<?php echo $options['hover1_zoom']; ?>);
}
<?php
     } elseif($options['hover_type']=="type2"){ // type2 slide effect -------------------------------------------------------
?>
#related_post .image img, .styled_post_list1 .image img, .styled_post_list2 .image img, .widget_tab_post_list .image img, #blog_list .image img, #news_archive_list .image img,
  #index_blog_list .image img, #index_3box .image img, #index_news_list .image img, #archive_news_list .image img, #footer_content .image img
{
  width:100%; height:auto; position:relative;
  -webkit-transform: translateX(0) scale(1.3); -webkit-transition-property: opacity, translateX; -webkit-transition: 0.5s;
  -moz-transform: translateX(0) scale(1.3); -moz-transition-property: opacity, translateX; -moz-transition: 0.5s;
  -ms-transform: translateX(0) scale(1.3); -ms-transition-property: opacity, translateX; -ms-transition: 0.5s;
  -o-transform: translateX(0) scale(1.3); -o-transition-property: opacity, translateX; -o-transition: 0.5s;
  transform: translateX(0) scale(1.3); transition-property: opacity, translateX; transition: 0.5s;
}
#related_post .image:hover img, .styled_post_list1 .image:hover img, .styled_post_list2 .image:hover img, .widget_tab_post_list .image:hover img, #blog_list .image:hover img, #news_archive_list .image:hover img,
  #index_blog_list .image:hover img, #index_3box .image:hover img, #index_news_list .image:hover img, #archive_news_list .image:hover img, #footer_content .image:hover img
{
  opacity:<?php echo $options['hover2_opacity']; ?>;
  <?php if($options['hover2_direct']=='type1'): ?>
  -webkit-transform: translateX(20px) scale(1.3);
  -moz-transform: translateX(20px) scale(1.3);
  -ms-transform: translateX(20px) scale(1.3);
  -o-transform: translateX(20px) scale(1.3);
  transform: translateX(20px) scale(1.3);
  <?php else: ?>
  -webkit-transform: translateX(-20px) scale(1.3);
  -moz-transform: translateX(-20px) scale(1.3);
  -ms-transform: translateX(-20px) scale(1.3);
  -o-transform: translateX(-20px) scale(1.3);
  transform: translateX(-20px) scale(1.3);
  <?php endif; ?>
}
<?php
     } elseif($options['hover_type']=="type3"){ // type3 fade out effect--------------------------------------------------------
?>
#related_post .image, .styled_post_list1 .image, .styled_post_list2 .image, .widget_tab_post_list .image, #blog_list .image, #news_archive_list .image,
  #index_blog_list .image, #index_3box .image, #index_news_list .image, #archive_news_list .image, #footer_content .image
{
  background: <?php echo $options['hover3_bgcolor']; ?>
}
#related_post .image img, .styled_post_list1 .image img, .styled_post_list2 .image img, .widget_tab_post_list .image img, #blog_list .image img, #news_archive_list .image img,
  #index_blog_list .image img, #index_3box .image img, #index_news_list .image img, #archive_news_list .image img, #footer_content .image img
{
  -webkit-transition-property: opacity; -webkit-transition: 0.5s;
  -moz-transition-property: opacity; -moz-transition: 0.5s;
  -ms-transition-property: opacity; -ms-transition: 0.5s;
  -o-transition-property: opacity; -o-transition: 0.5s;
  transition-property: opacity; transition: 0.5s;
  width:100%; height:auto;
}
#related_post .image:hover img, .styled_post_list1 .image:hover img, .styled_post_list2 .image:hover img, .widget_tab_post_list .image:hover img, #blog_list .image:hover img, #news_archive_list .image:hover img,
  #index_blog_list .image:hover img, #index_3box .image:hover img, #index_news_list .image:hover img, #archive_news_list .image:hover img, #footer_content .image:hover img
{
  opacity: <?php echo $options['hover3_opacity']; ?>;
  width:100%; height:auto;
}
<?php }; }; // アニメーションここまで ?>


<?php
     // 色の設定はここから　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
     $color1 = esc_html($options['main_color']);
     $color2 = esc_html($options['secondary_color']);

     //カテゴリーの色を出力
     $cats = get_terms('course_category','hide_empty=0&orderby=term_order');
     if(!empty($cats)) {
       foreach ($cats as $cat):
         $cat_id = $cat->term_id;
         $term_meta = get_option( 'taxonomy_' . $cat_id, array() );
         $cat_color ='';
         if(isset($term_meta['color'])) {
           $cat_color =  $term_meta['color'];
         };
         if(!empty($cat_color)) {
           echo '#course_list #course' . $cat_id . ' .headline { background-color:' . esc_html($cat_color) . '; }' . "\n";
           echo '#course_list #course' . $cat_id . ' .title { color:' . esc_html($cat_color) . '; }' . "\n";
         };
       endforeach;
     };

?>

body, a, #index_course_list a:hover, #previous_next_post a:hover, #course_list li a:hover
  { color: <?php echo esc_html($options['base_font_color']); ?>; }

#page_header .headline, .side_widget .styled_post_list1 .title:hover, .page_post_list .meta a:hover, .page_post_list .headline,
  .slider_main .caption .title a:hover, #comment_header ul li a:hover, #header_text .logo a:hover, #bread_crumb li.home a:hover:before, #post_title_area .meta li a:hover
    { color: <?php echo $color1; ?>; }

.pc #global_menu ul ul a, .design_button a, #index_3box .title a, .next_page_link a:hover, #archive_post_list_tab ol li:hover, .collapse_category_list li a:hover .count, .slick-arrow:hover, .pb_spec_table_button a:hover,
  #wp-calendar td a:hover, #wp-calendar #prev a:hover, #wp-calendar #next a:hover, #related_post .headline, .side_headline, #single_news_list .headline, .mobile #global_menu li a:hover, #mobile_menu .close_button:hover,
    #post_pagination p, .page_navi span.current, .tcd_user_profile_widget .button a:hover, #return_top_mobile a:hover, #p_readmore .button, #bread_crumb
      { background-color: <?php echo $color1; ?> !important; }

#archive_post_list_tab ol li:hover, #comment_header ul li a:hover, #comment_header ul li.comment_switch_active a, #comment_header #comment_closed p, #post_pagination p, .page_navi span.current
  { border-color: <?php echo $color1; ?>; }

.collapse_category_list li a:before
  { border-color: transparent transparent transparent <?php echo $color1; ?>; }

.slider_nav .swiper-slide-active, .slider_nav .swiper-slide:hover
  { box-shadow:inset 0 0 0 5px <?php echo $color1; ?>; }

a:hover, .pc #global_menu a:hover, .pc #global_menu > ul > li.active > a, .pc #global_menu > ul > li.current-menu-item > a, #bread_crumb li.home a:hover:after, #bread_crumb li a:hover, #post_meta_top a:hover, #index_blog_list li.category a:hover, #footer_tel .number,
  #single_news_list .link:hover, #single_news_list .link:hover:before, #archive_faq_list .question:hover, #archive_faq_list .question.active, #archive_faq_list .question:hover:before, #archive_faq_list .question.active:before, #archive_header_no_image .title
    { color: <?php echo $color2; ?>; }


.pc #global_menu ul ul a:hover, .design_button a:hover, #index_3box .title a:hover, #return_top a:hover, #post_pagination a:hover, .page_navi a:hover, #slide_menu a span.count, .tcdw_custom_drop_menu a:hover, #p_readmore .button:hover, #previous_next_page a:hover, #mobile_menu,
  #course_next_prev_link a:hover, .tcd_category_list li a:hover .count, #submit_comment:hover, #comment_header ul li a:hover, .widget_tab_post_list_button a:hover, #searchform .submit_button:hover, .mobile #menu_button:hover
    { background-color: <?php echo $color2; ?> !important; }

#post_pagination a:hover, .page_navi a:hover, .tcdw_custom_drop_menu a:hover, #comment_textarea textarea:focus, #guest_info input:focus, .widget_tab_post_list_button a:hover
  { border-color: <?php echo $color2; ?> !important; }

.post_content a { color: <?php echo esc_html($options['content_link_color']); ?>; }

.color_font { color: <?php echo esc_html($options['headline_font_color']); ?>; }


#copyright { background-color: <?php echo esc_html($options['copyright_bg_color']); ?>; color: <?php echo esc_html($options['copyright_text_color']); ?>; }

#schedule_table thead { background:<?php echo esc_html($options['schedule_color1']); ?>; }
#schedule_table .color { background:<?php echo esc_html($options['schedule_color2']); ?>; }
#archive_faq_list .answer { background:<?php echo esc_html($options['archive_faq_answer_color']); ?>; }

#page_header .square_headline { background: <?php echo esc_html($options['square_headline_bg_color']); ?>; }
#page_header .square_headline .title { color: <?php echo esc_html($options['square_headline_title_color']); ?>; }
#page_header .square_headline .sub_title { color: <?php echo esc_html($options['square_headline_subtitle_color']); ?>; }

#comment_header ul li.comment_switch_active a, #comment_header #comment_closed p { background-color: <?php echo $color1; ?> !important; }
#comment_header ul li.comment_switch_active a:after, #comment_header #comment_closed p:after { border-color:<?php echo $color1; ?> transparent transparent transparent; }

<?php
     $color1_hex_color = hex2rgb($color1);
     $color1_hex = implode(",",$color1_hex_color);
?>
.no_header_content { background:rgba(<?php echo $color1_hex; ?>,0.8); }

<?php

     // トップページ -------------------------------------------------------
     if(is_front_page()) {
       if($options['show_index_slider'] == 1) {
         $i = 1;
         foreach ( $options['index_slider'] as $key => $value ) :
           if($value['show_catch'] == 1) {
             $font_size = $value['catch_font_size'];
             $font_size_mobile = $value['catch_font_size_mobile'];
             $color = $value['catch_color'];
             $shadow1 = $value['catch_shadow_a'];
             $shadow2 = $value['catch_shadow_b'];
             $shadow3 = $value['catch_shadow_c'];
             $shadow_color = $value['catch_shadow_color'];
             echo "#header_slider .item" . $i . " .title { font-size:" . $font_size . "px; color:" . $color . "; text-shadow:" . $shadow1 . "px " . $shadow2 . "px " . $shadow3 . "px " . $shadow_color . "; }\n";
             echo ".mobile #header_slider .item" . $i . " .title { font-size:" . $font_size_mobile . "px; }\n";
           }
           if($value['use_overlay'] == 1) {
             $overlay_color_base = hex2rgb($value['overlay_color']);
             $overlay_color = implode(",",$overlay_color_base);
             $overlay_opacity = $value['overlay_opacity'];
             echo "#header_slider .item" . $i . " .overlay { background-color:rgba(" . $overlay_color . "," . $overlay_opacity . "); }\n";
           };
         $i++; endforeach;
       };
       if($options['show_index_intro'] == 1) {
          $bg_color = $options['index_intro_button_bg_color'];
          $bg_hover_color = $options['index_intro_button_bg_hover_color'];
          $text_color = $options['index_intro_button_text_color'];
          $text_hover_color = $options['index_intro_button_text_hover_color'];
          echo "#index_intro .button { background-color:" . $bg_color . "; color:" . $text_color . ";  }\n";
          echo "#index_intro .button:hover { background-color:" . $bg_hover_color . "; color:" . $text_hover_color . ";  }\n";
       };
       if($options['show_index_wide'] == 1) {
          $bg_color = $options['index_wide_button_bg_color'];
          $bg_hover_color = $options['index_wide_button_bg_hover_color'];
          $text_color = $options['index_wide_button_text_color'];
          $text_hover_color = $options['index_wide_button_text_hover_color'];
          echo "#index_wide_content .button { background-color:" . $bg_color . "; color:" . $text_color . ";  }\n";
          echo "#index_wide_content .button:hover { background-color:" . $bg_hover_color . "; color:" . $text_hover_color . ";  }\n";
       };
       if($options['show_index_gmap'] == 1) {
          echo '.pb_googlemap_custom-overlay-inner { background-color: ' . esc_html( $options['gmap_marker_bg'] ) . '; color: '.esc_html( $options['gmap_marker_color']).'; }' . "\n";
          echo '.pb_googlemap_custom-overlay-inner::after { border-color: ' . esc_html( $options['gmap_marker_bg'] ) . ' transparent transparent transparent; }' . "\n";
       };
     };

     // loading screen -----------------------------------------
     get_template_part('functions/loader');

?>

<?php
     //フッターバー --------------------------------------------
     if(is_mobile()) {
       if($options['footer_bar_display'] == 'type1' || $options['footer_bar_display'] == 'type2') {
?>
.dp-footer-bar { background: <?php echo 'rgba('.implode(',', hex2rgb($options['footer_bar_bg'])).', '.esc_html($options['footer_bar_tp']).');'; ?> border-top: solid 1px <?php echo esc_html($options['footer_bar_border']); ?>; color: <?php echo esc_html($options['footer_bar_color']); ?>; display: flex; flex-wrap: wrap; }
.dp-footer-bar a { color: <?php echo esc_html($options['footer_bar_color']); ?>; }
.dp-footer-bar-item + .dp-footer-bar-item { border-left: solid 1px <?php echo esc_html($options['footer_bar_border']); ?>; }
<?php
       };
     };
?>

<?php if($options['css_code']) { echo $options['css_code']; };?>

</style>

<?php
     // JavaScriptの設定はここから　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■

     if(is_front_page()) {

       // ヘッダースライダー --------------------------------------------------
       if($options['show_index_slider'] == 1 ) {
         wp_enqueue_style('slick-style', apply_filters('page_builder_slider_slick_style_url', get_template_directory_uri().'/js/slick.css'), '', '1.0.0');
         wp_enqueue_script('slick-script', apply_filters('page_builder_slider_slick_script_url', get_template_directory_uri().'/js/slick.min.js'), '', '1.0.0', true);
?>
<?php if ($options['use_load_icon'] != 1) { ?>
<script type="text/javascript">
jQuery(document).ready(function($){
<?php get_template_part('template-parts/slider_ini'); ?>
});
</script>
<?php }; ?>
<?php
       }; // END ヘッダースライダー
       // ブログカルーセル ---------------------------------------------------
       if($options['show_index_blog'] == 1) {
         wp_enqueue_style('slick-style', apply_filters('page_builder_slider_slick_style_url', get_template_directory_uri().'/js/slick.css'), '', '1.0.0');
         wp_enqueue_script('slick-script', apply_filters('page_builder_slider_slick_script_url', get_template_directory_uri().'/js/slick.min.js'), '', '1.0.0', true);
?>
<script type="text/javascript">
jQuery(document).ready(function($){

  $('#index_blog_list').slick({
    dots: false,
    arrows: true,
    pauseOnHover: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    variableWidth: false,
    autoplay: true,
    easing: 'easeOutExpo',
    speed: 1000,
    autoplaySpeed: 5000,
    prevArrow : '<div class="slick-prev"><span>Prev</span></div>',
    nextArrow : '<div class="slick-next"><span>Next</span></div>',
    responsive: [
      {
        breakpoint: 1000,
        settings: { slidesToShow: 3, variableWidth: false, arrows: false }
      },
      {
        breakpoint: 750,
        settings: { slidesToShow: 2, variableWidth: false, arrows: false }
      }
    ]
  });

});
</script>
<?php
       }; // END ブログカルーセル
     }; // END front page
?>

<?php
     }; // END function tcd_head()
     add_action("wp_head", "tcd_head");

// Custom head/script
function tcd_custom_head() {
  global $options;

  if ( $options['custom_head'] ) {
    echo $options['custom_head'] . "\n";
  }
}
add_action( 'wp_head', 'tcd_custom_head', 9999 );

?>
