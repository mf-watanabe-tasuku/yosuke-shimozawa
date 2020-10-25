<?php $options = get_design_plus_option(); ?>

 </div><!-- END #main_contents -->


 <?php
      // Footer contact --------------------------------------
      if( $options['footer_contact_area_display_type'] == 'type2') {
        if(is_front_page()) { get_template_part('template-parts/footer_contact'); };
      } else {
        get_template_part('template-parts/footer_contact');
      };
 ?>


 <?php
      // Footer content --------------------------------------
      if($options['show_footer_content'] == 1) {
 ?>
 <div id="footer_content">
  <div id="footer_content_inner" class="clearfix">
  <?php
       for ( $i=1; $i<= 3; $i++ ):
         $url = $options['footer_content_url'.$i];
         if(!empty($url)) {
           $image_value = $options['footer_content_image'.$i];
           if($image_value) {
             $image = wp_get_attachment_image_src( $image_value, 'full' );
           }
  ?>
  <div class="item clearfix" style="background:<?php echo esc_url($options['footer_content_bg_color']); ?>;">
   <?php if(!empty($image)) { ?>
   <a class="image" href="<?php echo esc_url($url); ?>" <?php if($options['footer_content_target'.$i] == 1) { echo 'target="_blank"'; }; ?>><img src="<?php echo esc_attr($image[0]); ?>" alt="" title="" /></a>
   <?php }; ?>
   <a class="title" href="<?php echo esc_url($url); ?>" <?php if($options['footer_content_target'.$i] == 1) { echo 'target="_blank"'; }; ?>><span><?php echo esc_html($options['footer_content_title'.$i]); ?></span></a>
  </div>
  <?php }; endfor; ?>
  </div>
 </div><!-- END #footer_content -->
 <?php }; ?>


 <?php if (has_nav_menu('footer-menu')) { ?>
 <div id="footer_menu" class="clearfix">
  <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'footer-menu' , 'container' => '' , 'depth' => '1') ); ?>
 </div>
 <?php }; ?>

 <p id="copyright"><?php echo wp_kses_post($options['copyright']); ?></p>


 <div id="return_top">
  <a href="#body"><span><?php _e('PAGE TOP', 'tcd-w'); ?></span></a>
 </div>


 <?php
      // footer navi bar for mobile device -------------------
      if( is_mobile() ) { get_template_part('template-parts/footer-bar'); };
 ?>


</div><!-- #container -->

<?php if ($options['use_load_icon']) { ?>
</div><!-- #site_wrap -->

<script>

 <?php if(wp_is_mobile()) { ?>
 jQuery(window).bind("pageshow", function(event) {
    if (event.originalEvent.persisted) {
      window.location.reload()
    }
 });
 <?php }; ?>

 jQuery(document).ready(function($){

  function after_load() {
    $('#site_loader_spinner').delay(300).fadeOut(600);
    $('#site_loader_overlay').delay(600).fadeOut(900);
    $('#site_wrap').css('display', 'block');
    // scroll page link
    if (location.hash && $(location.hash).length) {
      setTimeout(function(){ $("html,body").scrollTop(0); }, 600);
      $("html,body").delay(1500).animate({scrollTop : $(location.hash).offset().top}, 1000, 'easeOutExpo');
    }
    <?php
         // front page
         if(is_front_page() && $options['show_index_slider'] == 1) {
           get_template_part('template-parts/slider_ini');
         };
         if(is_front_page() && $options['show_index_blog'] == 1) {
           echo "$('#index_blog_list').slick('setPosition');\n";
         };
         // 404 -----------------------------------
         if(is_404()) {
           echo "$('#header_image_for_404').addClass('animate');\n";
         };
         // page builder -----------------------------------
         if(is_single() || is_page()) {
           if(page_builder_has_widget('pb-widget-slider')) {
             echo "$('.pb_slider').slick('setPosition');\n";
           };
         };
    ?>
  }

  $(window).load(function () {
    after_load();
  });

  $(function(){
    setTimeout(function(){
      if( $('#site_loader_overlay').is(':visible') ) {
        after_load();
      }
    }, <?php if($options['load_time']) { echo esc_html($options['load_time']); } else { echo '7000'; }; ?>);
  });

 });

</script>
<?php
     } else { // if not using loading screen
?>
<script>
jQuery(document).ready(function($){
<?php if(is_404()) { ?>
  $('#header_image_for_404').addClass('animate');
<?php }; ?>
  // scroll page link
  if (location.hash && $(location.hash).length) {
    $("html,body").scrollTop(0);
    $("html,body").delay(600).animate({scrollTop : $(location.hash).offset().top}, 1000, 'easeOutExpo');
  }
});
</script>
<?php
     }; // END if using load screen
?>

<?php
     // share button ----------------------------------------------------------------------
     if ( is_single() && ( $options['show_sns_top'] || $options['show_sns_btm'] ) ) :
       if ( 'type5' == $options['sns_type_top'] || 'type5' == $options['sns_type_btm'] ) :
         if ( $options['show_twitter_top'] || $options['show_twitter_btm'] ) :
?>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<?php
         endif;
         if ( $options['show_fblike_top'] || $options['show_fbshare_top'] || $options['show_fblike_btm'] || $options['show_fbshare_btm'] ) :
?>
<!-- facebook share button code -->
<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<?php
         endif;
         if ( $options['show_google_top'] || $options['show_google_btm'] ) :
?>
<script type="text/javascript">window.___gcfg = {lang: 'ja'};(function() {var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();
</script>
<?php
         endif;
         if ( $options['show_hatena_top'] || $options['show_hatena_btm'] ) :
?>
<script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
<?php
         endif;
         if ( $options['show_pocket_top'] || $options['show_pocket_btm'] ) :
?>
<script type="text/javascript">!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script");j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";var w=d.getElementById(i);d.body.appendChild(j);}}(document,"pocket-btn-js");</script>
<?php
         endif;
         if ( $options['show_pinterest_top'] || $options['show_pinterest_btm'] ) :
?>
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
<?php
         endif;
       endif;
     endif;
?>

<?php wp_footer(); ?>
</body>
</html>