<?php
     get_header();
     $options = get_design_plus_option();

     $header_image = get_post_meta($post->ID, 'header_image', true);
     $catch = get_post_meta($post->ID, 'catch', true);
     $desc = get_post_meta($post->ID, 'desc', true);

     $category = get_the_terms($post->ID , 'course_category');
     if(!empty($category)) {
         foreach( (array) $category as $cat ) {
           $cat_id = $cat->term_id;
           $cat_name = $cat->name;
           $cat_slug = $cat->slug;
         };
         $term_meta = get_option( 'taxonomy_' . $cat_id, array() );
         $color = $term_meta['color'];
         $hex_color = hex2rgb($color);
         $hex_color = implode(",",$hex_color);
     };
?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<div id="main_col">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div id="single_course">

   <div id="course_title_area" class="clearfix" style="background:rgba(<?php echo $hex_color; ?>,0.1);">
    <?php if(!empty($category)) { ?>
    <p class="category" style="background:<?php echo esc_attr($color); ?>;"><span><?php echo esc_html($cat_name); ?></span></p>
    <?php }; ?>
    <h2 class="title" style="color:<?php echo esc_attr($color); ?>;"><?php the_title(); ?></h2>
   </div>

   <?php
        if ($header_image) {
          $header_image = wp_get_attachment_image_src( $header_image, 'full');
   ?>
   <div id="course_image" style="background:url(<?php echo esc_attr($header_image[0]); ?>) no-repeat center center; background-size:cover;"></div>
   <?php }; ?>

   <div id="curse_main_content">

    <?php if(!empty($catch)) { ?>
    <h3 class="catch rich_font"><?php echo esc_html($catch); ?></h3>
    <?php }; ?>

    <?php if(!empty($desc)) { ?>
    <div class="desc">
     <p><?php echo nl2br(wp_kses_post($desc)); ?></p>
    </div>
    <?php }; ?>

    <?php
         $course_data = get_ml_repeater_values($post->ID, 'course_data');
         if(!empty($course_data)):
    ?>
    <div id="course_content_list">
     <?php
          $i = 1;
          foreach($course_data as $key => $value) :
            $image = null;
            if (!empty($value['course_image'])) {
              $image = wp_get_attachment_image_src($value['course_image'], 'size3');
            }
            if (empty($image[0])) {
              continue;
            }
     ?>
     <div class="item clearfix <?php if($i%2==0){ echo 'even'; } else { echo 'odd'; }; ?>">
      <img class="image" src="<?php echo $image[0]; ?>" alt="" />
      <?php if(!empty($value['course_desc'])) { ?>
      <p class="desc"><?php echo nl2br(wp_kses_post($value['course_desc'])); ?></p>
      <?php }; ?>
     </div>
     <?php $i++; endforeach; ?>
    </div><!-- END #course_content_list -->
    <?php endif; ?>

    <?php if ( $options['show_course_next_post'] == 1){ ?>
    <div id="course_next_prev_link" class="clearfix">
     <?php course_next_prev_post_link(); ?>
    </div>
    <?php }; ?>

   </div><!-- END #curse_main_content -->

  </div><!-- END #single_course -->

  <?php endwhile; endif; ?>

  <?php if(!empty($category)) { ?>
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
     ?>
     <li>
      <a href="<?php the_permalink() ?>" class="clearfix">
       <?php
            if ( has_post_thumbnail()) {
              $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
       ?>
       <img class="image" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
       <?php }; ?>
		  <h4 class="title" href="<?php the_permalink() ?>"><span><?php the_title(); ?></span></h4>
       <?php if(!empty($desc)) { ?><p class="excerpt"><?php echo esc_html($desc); ?></p><?php }; ?>
      </a>
     </li>
     <?php endforeach; wp_reset_query(); ?>
    </ol>
    <?php }; ?>
   </div><!-- END .course -->
  </div><!-- END #course_list -->
  <?php }; ?>

</div><!-- END #main_col -->

<?php get_footer(); ?>