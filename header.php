<?php $options = get_design_plus_option(); ?>
<!DOCTYPE html>
<html class="pc" <?php language_attributes(); ?>>
<?php
$options = get_design_plus_option();
if ($options['use_ogp']) {
?>

  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
  <?php } else { ?>

    <head>
    <?php }; ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width">
    <meta name="format-detection" content="telephone=no">
    <?php if (is_home() || is_front_page()) { ?>
      <title><?php echo bloginfo('name'); ?></title>
    <?php } else { ?>
      <title><?php wp_title('|', true, 'right'); ?></title>
    <?php }; ?>
    <meta name="description" content="<?php seo_description(); ?>">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php
    if ($options['favicon']) {
      $favicon_image = wp_get_attachment_image_src($options['favicon'], 'full');
      if (!empty($favicon_image)) {
    ?>
        <link rel="shortcut icon" href="<?php echo esc_url($favicon_image[0]); ?>">
    <?php };
    }; ?>
    <?php
    if (is_singular('faq')) {
      echo "<meta http-equiv='pragma' content='no-cache' />\n";
      echo "<meta name='robots' content='noindex,follow' />\n";
    };
    ?>
    <?php wp_enqueue_style('style', get_stylesheet_uri(), false, version_num(), 'all');
    wp_enqueue_script('jquery');
    if (is_singular()) wp_enqueue_script('comment-reply'); ?>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/pagebuilder/assets/css/pagebuilder.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/all.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/pagebuilder/assets/css/staff_list.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/pagebuilder.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/custom.css">
    </head>

  <body id="body" <?php body_class(); ?>>

    <?php if ($options['use_load_icon']) { ?>
      <div id="site_loader_overlay">
        <div id="site_loader_animation">
          <?php if ($options['load_icon'] == 'type3') { ?>
            <i></i><i></i><i></i><i></i>
          <?php } ?>
        </div>
      </div>
      <div id="site_wrap">
      <?php } ?>

      <div id="container">

        <div id="header">
          <div id="header_inner">
            <?php header_logo(); ?>
            <?php if ($options['show_header_button'] == 1) { ?>
              <div id="header_button" class="button design_button">
                <a href="<?php echo esc_url($options['header_button_url']); ?>" <?php if ($options['header_button_target'] == 1) {
                                                                                  echo ' target="_blank"';
                                                                                }; ?>><?php echo esc_html($options['header_button_label']); ?></a>
              </div>
            <?php }; ?>
            <?php if (has_nav_menu('global-menu')) { ?>
              <div id="global_menu">
                <?php wp_nav_menu(array('sort_column' => 'menu_order', 'theme_location' => 'global-menu', 'container' => '')); ?>
              </div>
              <a href="#" id="menu_button"><span><?php _e('menu', 'tcd-w'); ?></span></a>
            <?php }; ?>
          </div><!-- END #header_inner -->
        </div><!-- END #header -->

        <?php
        //  Image slider -------------------------------------------------------------------------
        if (is_front_page()) {
          if (!is_paged()) {
            if ($options['show_index_slider'] == 1) {
        ?>

              <div id="header_catch">
                <div class="header_catch--inner">
                  <h1 class="header_catch--main">浮かんだイメージを現実レベルにする</h1>
                  <p class="header_catch--sub">治療院業界20年の経験から生み出した【独自の成功メソッド】で、<br class="xs-hidden">セラピスト業界のクライアント様の問題解決を全力で支援します。</p>
                </div>
              </div>

              <div id="header_slider">
                <?php
                $i = 1;
                foreach ($options['index_slider'] as $key => $value) :
                  $slider_type = $value['slider_type'];
                  $animation_type = $value['animation_type'];
                  $url = $value['url'];
                  $target = $value['target'];
                  if ($slider_type == 'type1') {
                    // image slider ------------------------------------------------------
                    $image = wp_get_attachment_image_src($value['image'], 'full');
                    if (!empty($image)) {
                ?>
                      <div class="item image_item item<?php echo $i; ?> slick-slide animation_<?php echo esc_attr($animation_type); ?>">
                        <?php if ($value['show_catch'] == 1) { ?>
                          <div class="caption <?php echo esc_attr($value['catch_direction']); ?>">
                            <h3 class="title font_style_<?php echo esc_attr($value['catch_font_type']); ?>"><?php echo nl2br(esc_html($value['catch'])); ?></h3>
                          </div>
                        <?php }; ?>
                        <?php if ($url) { ?><a class="link" href="<?php echo esc_url($url); ?>" <?php if ($target == 1) {
                                                                                                  echo ' target="_blank"';
                                                                                                }; ?>></a><?php }; ?>
                        <?php if ($value['use_overlay'] == 1) { ?><div class="overlay"></div><?php }; ?>
                        <img data-lazy="<?php echo esc_attr($image[0]); ?>" class="image-entity" />
                        <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
                      </div><!-- END .item -->
                      <?php
                    } // END if has image
                  } elseif ($slider_type == 'type2') {
                    // video slider ------------------------------------------------------
                    $video = $value['video'];
                    if (!wp_is_mobile()) {
                      if (!empty($video)) {
                        $video_image = wp_get_attachment_image_src($value['video_image'], 'full');
                      ?>
                        <div class="item video item<?php echo $i; ?>">
                          <?php if ($value['show_catch'] == 1) { ?>
                            <div class="caption <?php echo esc_attr($value['catch_direction']); ?>">
                              <h3 class="title font_style_<?php echo esc_attr($value['catch_font_type']); ?>"><?php echo nl2br(esc_html($value['catch'])); ?></h3>
                            </div>
                          <?php }; ?>
                          <?php if ($url) { ?><a class="link" href="<?php echo esc_url($url); ?>" <?php if ($target == 1) {
                                                                                                    echo ' target="_blank"';
                                                                                                  }; ?>></a><?php }; ?>
                          <?php if ($value['use_overlay'] == 1) { ?><div class="overlay"></div><?php }; ?>
                          <video class="slide-video slide-media" preload="auto" muted>
                            <source src="<?php echo esc_url(wp_get_attachment_url($video)); ?>" type="video/mp4" />
                          </video>
                        </div><!-- END .item -->
                      <?php
                      }; // END has video
                    } else { // if is mobile
                      $image = wp_get_attachment_image_src($value['video_image'], 'full');
                      if (!empty($image)) {
                      ?>
                        <div class="item image_item item<?php echo $i; ?> slick-slide">
                          <?php if ($value['show_catch'] == 1) { ?>
                            <div class="caption <?php echo esc_attr($value['catch_direction']); ?>">
                              <h3 class="title font_style_<?php echo esc_attr($value['catch_font_type']); ?>"><?php echo nl2br(esc_html($value['catch'])); ?></h3>
                            </div>
                          <?php }; ?>
                          <?php if ($url) { ?><a class="link" href="<?php echo esc_url($url); ?>" <?php if ($target == 1) {
                                                                                                    echo ' target="_blank"';
                                                                                                  }; ?>></a><?php }; ?>
                          <?php if ($value['use_overlay'] == 1) { ?><div class="overlay"></div><?php }; ?>
                          <img data-lazy="<?php echo esc_attr($image[0]); ?>" class="image-entity" />
                          <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
                        </div><!-- END .item -->
                        <?php
                      }; // END has image
                    }; // END if is mobile
                  } elseif ($slider_type == 'type3') {
                    // youtube slider ------------------------------------------------------
                    if (!wp_is_mobile()) {
                      $youtube_url = $value['youtube'];
                      if (!empty($youtube_url)) {
                        // parse youtube video id
                        // https://stackoverflow.com/questions/2936467/parse-youtube-video-id-using-preg-match
                        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[\w\-?&!#=,;]+/[\w\-?&!#=/,;]+/|(?:v|e(?:mbed)?)/|[\w\-?&!#=,;]*[?&]v=)|youtu\.be/)([\w-]{11})(?:[^\w-]|\Z)%i', $youtube_url, $matches)) {
                        ?>
                          <div class="item youtube item<?php echo $i; ?>">
                            <?php if ($value['show_catch'] == 1) { ?>
                              <div class="caption <?php echo esc_attr($value['catch_direction']); ?>">
                                <h3 class="title font_style_<?php echo esc_attr($value['catch_font_type']); ?>"><?php echo nl2br(esc_html($value['catch'])); ?></h3>
                              </div>
                            <?php }; ?>
                            <?php if ($url) { ?><a class="link" href="<?php echo esc_url($url); ?>" <?php if ($target == 1) {
                                                                                                      echo ' target="_blank"';
                                                                                                    }; ?>></a><?php }; ?>
                            <?php if ($value['use_overlay'] == 1) { ?><div class="overlay"></div><?php }; ?>
                            <iframe id="youtube-player-<?php echo $i; ?>" class="youtube-player slide-youtube slide-media" src="https://www.youtube.com/embed/<?php echo esc_attr($matches[1]); ?>?enablejsapi=1&controls=0&fs=0&iv_load_policy=3&rel=0&showinfo=0&loop=0" frameborder="0"></iframe>
                          </div><!-- END .item -->
                        <?php
                        };
                      }; // END has youtube url
                    } else { // if is mobile
                      $image = wp_get_attachment_image_src($value['youtube_image'], 'full');
                      if (!empty($image)) {
                        ?>
                        <div class="item image_item item<?php echo $i; ?> slick-slide">
                          <?php if ($value['show_catch'] == 1) { ?>
                            <div class="caption <?php echo esc_attr($value['catch_direction']); ?>">
                              <h3 class="title font_style_<?php echo esc_attr($value['catch_font_type']); ?>"><?php echo nl2br(esc_html($value['catch'])); ?></h3>
                            </div>
                          <?php }; ?>
                          <?php if ($url) { ?><a class="link" href="<?php echo esc_url($url); ?>" <?php if ($target == 1) {
                                                                                                    echo ' target="_blank"';
                                                                                                  }; ?>></a><?php }; ?>
                          <?php if ($value['use_overlay'] == 1) { ?><div class="overlay"></div><?php }; ?>
                          <img data-lazy="<?php echo esc_attr($image[0]); ?>" class="image-entity" />
                          <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
                        </div><!-- END .item -->
                <?php
                      }; // END has image
                    }; // END if is mobile
                  } // END slider type
                  $i++;
                endforeach;
                ?>
              </div><!-- END #header_slider -->
        <?php };
          };
        }; // END if is front page 
        ?>

        <div id="main_contents" class="clearfix">