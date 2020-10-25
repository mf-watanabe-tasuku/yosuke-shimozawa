<?php
     get_header();
     $options = get_design_plus_option();

     $query_obj = get_queried_object();

     $cat_slug = $query_obj->slug;
     $cat_name = $query_obj->name;
     $cat_id = $query_obj->term_id;
     $term_meta = get_option( 'taxonomy_' . $cat_id, array() );

     $sub_title = $term_meta['sub_title'];
     $catch = $term_meta['headline'];
     $desc = $term_meta['archive_desc'];
     $image_id = $term_meta['archive_image'];
     if(!empty($image_id)) {
       $image = wp_get_attachment_image_src( $image_id, 'full');
     } else {
       $image_id = $options['archive_course_image'];
       $image = wp_get_attachment_image_src( $image_id, 'full');
     }
?>
<div id="page_header"<?php if(!empty($image_id)) { ?> style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"<?php }; ?>>
 <div class="square_headline">
  <div class="square_headline_inner">
   <?php if(!empty($cat_name)) { ?>
   <h2 class="title rich_font"><?php echo nl2br(wp_kses_post($cat_name)); ?></h2>
   <?php }; ?>
   <?php if(!empty($sub_title)) { ?>
   <p class="sub_title"><?php echo nl2br(wp_kses_post($sub_title)); ?></p>
   <?php }; ?>
  </div>
 </div>
</div>

<div id="main_col">

 <?php
      if($catch || category_description() || $desc) {
 ?>
 <div id="archive_catch">
  <?php if(!empty($catch)) { ?>
  <h2 class="catch rich_font color_font"><?php echo nl2br(wp_kses_post($catch)); ?></h2>
  <?php }; ?>
  <?php if(!empty($desc)) { ?>
  <p class="desc"><?php echo nl2br(wp_kses_post($desc)); ?></p>
  <?php } elseif(category_description()) { ?>
  <p class="desc"><?php echo nl2br( strip_tags( category_description() )); ?></p>
  <?php }; ?>
 </div>
 <?php }; ?>

 <div id="course_list">
  <div class="course" id="course<?php echo esc_attr($cat_id); ?>">
   <h3 class="headline"><?php echo esc_html($cat_name); ?></h3>
   <?php
        $args = array( 'post_type' => 'course', 'posts_per_page'=>-1 , 'orderby' => 'date', 'order' => 'DESC', 'course_category' => $cat_slug);
        $course_list = get_posts($args);
        if ($course_list) {
   ?>
   <ol class="clearfix">
    <?php
         foreach ($course_list as $post) : setup_postdata ($post);
           $desc = get_post_meta($post->ID, 'short_desc', true);
           $long_desc = get_post_meta($post->ID, 'desc', true);
           if($long_desc) {
             $long_desc = str_replace(array("\r\n", "\r", "\n"), "", $long_desc);
             $long_desc = mb_substr($long_desc, 0, 72 ,"utf-8");
           };
    ?>
    <li>
     <a href="<?php the_permalink() ?>" class="clearfix">
      <?php
           if ( has_post_thumbnail()) {
             $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
      ?>
      <div class="image_wrap">
       <img class="image" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
      </div>
      <?php }; ?>
		 <h4 class="title" href="<?php the_permalink() ?>"><span><?php the_title(); ?></span></h4>
      <?php if(!empty($desc)) { ?>
      <p class="excerpt"><?php echo esc_html($desc); ?></p>
      <?php } elseif(!empty($long_desc)) { ?>
      <p class="excerpt"><?php echo esc_html($long_desc); ?>...</p>
      <?php }; ?>
     </a>
    </li>
    <?php endforeach; wp_reset_query(); ?>
   </ol>
   <?php }; ?>
  </div><!-- END .course -->
 </div><!-- END #course_list -->

</div><!-- END #main_col -->

<?php get_footer(); ?>