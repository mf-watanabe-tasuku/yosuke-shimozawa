<?php
     get_header();
     $sub_title = get_post_meta($post->ID, 'sub_title', true);
     $image_id = get_post_meta($post->ID, 'header_image', true);
     if(!empty($image_id)) {
       $image = wp_get_attachment_image_src( $image_id, 'full');
     }
?>
<div id="page_header"<?php if(!empty($image_id)) { ?> style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"<?php } else { echo ' class="no_image"'; }; ; ?>>
 <div class="square_headline">
  <div class="square_headline_inner">
   <h2 class="title rich_font"><?php the_title(); ?></h2>
   <?php if(!empty($sub_title)) { ?>
   <p class="sub_title"><?php echo nl2br(wp_kses_post($sub_title)); ?></p>
   <?php }; ?>
  </div>
 </div>
</div>

<div id="main_col" class="clearfix">

 <div id="left_col">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article id="article">

   <div class="post_content clearfix">
    <?php the_content(__('Read more', 'tcd-w')); ?>
    <?php custom_wp_link_pages(); ?>
   </div>

  </article><!-- END #article -->

  <?php
       // page navigation ------------------------------------------------------------
       $show_nav = get_post_meta($post->ID, 'show_nav', true);
       if($show_nav == 'on') {
  ?>
  <div id="previous_next_page" class="clearfix">
   <?php next_prev_page_link(); ?>
  </div>
  <?php }; ?>

  <?php
       // show banner ------------------------------------------------------------
       theme_option_page_banner();
  ?>

  <?php
       // show post list ------------------------------------------------------------
       theme_option_page_post_list();
  ?>

  <?php endwhile; endif; ?>

 </div><!-- END #left_col -->

 <?php get_sidebar(); ?>

</div><!-- END #main_col -->

<?php get_footer(); ?>