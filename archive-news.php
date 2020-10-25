<?php
     get_header();
     $options = get_design_plus_option();

     $image_id = $options['archive_news_image'];
     $title = $options['archive_news_title'];
     $sub_title = $options['archive_news_sub_title'];
     if(!empty($image_id)) {
       $image = wp_get_attachment_image_src( $image_id, 'full');
     };
?>
<div id="page_header"<?php if(!empty($image_id)) { ?> style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"<?php }; ?>>
 <div class="square_headline">
  <div class="square_headline_inner">
   <?php if(!empty($title)) { ?>
   <h2 class="title rich_font"><?php echo nl2br(wp_kses_post($title)); ?></h2>
   <?php }; ?>
   <?php if(!empty($sub_title)) { ?>
   <p class="sub_title"><?php echo nl2br(wp_kses_post($sub_title)); ?></p>
   <?php }; ?>
  </div>
 </div>
</div>

<div id="main_col">

 <?php
      $catch = $options['archive_news_headline'];
      $desc = $options['archive_news_desc'];
      if($catch || $desc) {
 ?>
 <div id="archive_catch">
  <?php if(!empty($title)) { ?>
  <h2 class="catch rich_font color_font" style="font-size:<?php echo esc_attr($options['archive_news_headline_font_size']); ?>px;"><?php echo nl2br(wp_kses_post($catch)); ?></h2>
  <?php }; ?>
  <?php if(!empty($desc)) { ?>
  <p class="desc"><?php echo nl2br(wp_kses_post($desc)); ?></p>
  <?php }; ?>
 </div>
 <?php }; ?>

 <?php if ( have_posts() ) : ?>
 <div id="archive_news_list" class="clearfix">
  <?php while ( have_posts() ) : the_post(); ?>
  <article class="item clearfix<?php if(!has_post_thumbnail()) { echo ' no_image'; }; ?>">
   <?php if(has_post_thumbnail()) { ?>
   <a class="image" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('size3'); ?></a>
   <?php }; ?>
   <div class="title_area">
    <h4 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php if(wp_is_mobile()) { trim_title(26); } else { trim_title(50); }; ?></a></h4>
    <p class="date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.j'); ?></time></p>
   </div>
  </article>
  <?php endwhile; ?>
 </div><!-- #blog_list -->
 <?php get_template_part('template-parts/navigation'); ?>
 <?php else: ?>
 <p class="no_post"><?php _e('There is no registered post.', 'tcd-w');  ?></p>
 <?php endif; ?>

</div><!-- END #main_col -->

<?php get_footer(); ?>