<?php
     get_header();
     $options = get_design_plus_option();

     $image_id = $options['archive_course_image'];
     $title = $options['archive_course_title'];
     $sub_title = $options['archive_course_sub_title'];
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
      $catch = $options['archive_course_headline'];
      $desc = $options['archive_course_desc'];
      if($catch || $desc) {
 ?>
 <div id="archive_catch">
  <?php if(!empty($title)) { ?>
  <h2 class="catch rich_font color_font" style="font-size:<?php echo esc_attr($options['archive_course_headline_font_size']); ?>px;"><?php echo nl2br(wp_kses_post($catch)); ?></h2>
  <?php }; ?>
  <?php if(!empty($desc)) { ?>
  <p class="desc"><?php echo nl2br(wp_kses_post($desc)); ?></p>
  <?php }; ?>
 </div>
 <?php }; ?>

 <?php
      $archive_course_cat = $options['archive_course_cat'];
      $archive_course_cat = rtrim($archive_course_cat, ",");
      $archive_cat_ids = explode(',' , $archive_course_cat);
      $cat_args = array(
        'include' => $archive_cat_ids,
        'hide_empty' => 0,
        'orderby' => 'include'
      );
      $course_cats = get_terms("course_category",$cat_args);
      if(!empty($course_cats)) {
 ?>
 <div id="course_list">
  <?php
       foreach ($course_cats as $course_cat):
         $id = $course_cat->term_id;
         $slug = $course_cat->slug;
         $name = $course_cat->name;
         $term_meta = get_option( 'taxonomy_' . $id, array() );
  ?>
  <div class="course" id="course<?php echo esc_attr($id); ?>">
   <h3 class="headline"><?php echo esc_html($name); ?></h3>
   <?php
        $args = array( 'post_type' => 'course', 'posts_per_page'=>-1 , 'orderby' => 'date', 'order' => 'DESC', 'course_category' => $slug);
        $course_list = get_posts($args);
        if ($course_list) {
   ?>
   <ol class="clearfix">
    <?php
         foreach ($course_list as $post) : setup_postdata ($post);
           $desc = get_post_meta($post->ID, 'short_desc', true);
    ?>
    <li>
     <a href="<?php the_permalink() ?>" class="clearfix">
      <?php
           if ( has_post_thumbnail()) {
             $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
      ?>
      <div class="image_area">
       <img class="image" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
      </div>
      <?php }; ?>
      <h4 class="title" href="<?php the_permalink() ?>"><span><?php the_title(); ?></span></h4>
      <?php if(!empty($desc)) { ?><p class="excerpt"><?php echo esc_html($desc); ?></p><?php }; ?>
     </a>
    </li>
    <?php endforeach; wp_reset_query(); ?>
   </ol>
   <?php }; ?>
  </div><!-- END .course -->
  <?php endforeach; ?>
 </div><!-- END #course_list -->
 <?php }; ?>

</div><!-- END #main_col -->

<?php get_footer(); ?>