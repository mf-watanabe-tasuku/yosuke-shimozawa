 <?php
      $options = get_design_plus_option();
      if( $options['show_footer_tel'] == 1 ||  $options['show_footer_contact'] == 1 ) {
 ?>
 <div id="footer_contact_area">
  <div id="footer_contact_area_inner" class="clearfix">

   <?php if( $options['show_footer_tel'] == 1 ) { ?>
   <div class="footer_contact_content" id="footer_tel">
    <div class="clearfix">
     <?php if($options['footer_tel_headline']) { ?>
     <p class="headline"><?php echo nl2br(wp_kses_post($options['footer_tel_headline'])); ?></p>
     <?php }; ?>
     <div class="right_area">
      <?php if($options['footer_tel_number']) { ?>
		 <p class="number"><span>TEL.</span><?php echo esc_html($options['footer_tel_number']); ?></p>
      <?php }; ?>
      <?php if($options['footer_tel_time']) { ?>
      <p class="time"><?php echo nl2br(wp_kses_post($options['footer_tel_time'])); ?></p>
      <?php }; ?>
     </div>
    </div>
   </div>
   <?php }; ?>

   <?php if( $options['show_footer_contact'] == 1 ) { ?>
   <div class="footer_contact_content" id="footer_contact">
    <div class="clearfix">
     <?php if($options['footer_contact_headline']) { ?>
     <p class="headline"><?php echo nl2br(wp_kses_post($options['footer_contact_headline'])); ?></p>
     <?php }; ?>
     <?php if($options['footer_contact_button_label']) { ?>
     <div class="button design_button">
      <a href="<?php echo esc_url($options['footer_contact_url']); ?>"<?php if($options['footer_contact_target'] == 1) { echo ' target="_blank"'; }; ?>><?php echo esc_html($options['footer_contact_button_label']); ?></a>
     </div>
     <?php }; ?>
    </div>
   </div>
   <?php }; ?>

  </div>
 </div><!-- END #footer_contact_area -->
 <?php
      };
 ?>
