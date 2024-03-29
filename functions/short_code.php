<?php

/**
 * 広告
 */
function theme_option_single_banner() {

	$options = get_design_plus_option();


    if( $options['single_shortcode_ad_code1'] || $options['single_shortcode_ad_image1'] || $options['single_shortcode_ad_code2'] || $options['single_shortcode_ad_image2'] ) {

      $html = '';

      if( !$options['single_shortcode_ad_code2'] && !$options['single_shortcode_ad_image2'] ) {
        $html .= '<div id="single_banner_shortcode" class="single_banner_area clearfix one_banner">' . "\n";
      } else {
        $html .= '<div id="single_banner_shortcode" class="single_banner_area clearfix">' . "\n";
      }

      if ($options['single_shortcode_ad_code1']) {
        $html .= '<div class="single_banner single_banner_left">' . "\n";
        $html .= $options['single_shortcode_ad_code1'] . "\n";
        $html .= '</div>' . "\n";
      } else {
        $single_image3 = wp_get_attachment_image_src( $options['single_shortcode_ad_image1'], 'full' );
        $html .= '<div class="single_banner single_banner_left">' . "\n";
        $html .= '<a href="' . $options['single_shortcode_ad_url1'] . '" target="_blank"><img src="' . $single_image3[0] . '" alt="" title="" /></a>' . "\n";
        $html .= '</div>' . "\n";
      }

      if ($options['single_shortcode_ad_code2']) {
        $html .= '<div class="single_banner single_banner_right">' . "\n";
        $html .= $options['single_shortcode_ad_code2'] . "\n";
        $html .= '</div>' . "\n";
      } else {
        $single_image4 = wp_get_attachment_image_src( $options['single_shortcode_ad_image2'], 'full' );
        $html .= '<div class="single_banner single_banner_right">' . "\n";
        $html .= '<a href="' . $options['single_shortcode_ad_url2'] . '" target="_blank"><img src="' . $single_image4[0] . '" alt="" title="" /></a>' . "\n";
        $html .= '</div>' . "\n";
      }

      $html .= '</div>' . "\n";

      return $html;

    };


}
add_shortcode('s_ad', 'theme_option_single_banner');


?>