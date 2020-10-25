<?php
     get_header();
     $options = get_design_plus_option();

     if (!is_search()) {

     $image_id = $options['archive_blog_image'];
     $title = $options['archive_blog_title'];
     $sub_title = $options['archive_blog_sub_title'];
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
<?php } else { ?>
<?php get_template_part('template-parts/breadcrumb'); ?>
<?php }; ?>

<div id="main_col">

 <?php if (is_category()) { ?>
 <div id="archive_catch">
  <h2 class="catch rich_font color_font" style="font-size:<?php echo esc_attr($options['archive_blog_headline_font_size']); ?>px;"><?php echo single_cat_title('', false); ?></h2>
  <?php if(category_description()) { ?>
  <p class="desc"><?php echo nl2br( strip_tags( category_description() )); ?></p>
  <?php }; ?>
 </div>

 <?php } elseif( is_tag() ) { ?>
 <div id="archive_catch">
  <h2 class="catch rich_font color_font" style="font-size:<?php echo esc_attr($options['archive_blog_headline_font_size']); ?>px;"><?php echo single_tag_title('', false); ?></h2>
  <?php if(tag_description()) { ?>
  <p class="desc"><?php echo nl2br( strip_tags( tag_description() )); ?></p>
  <?php }; ?>
 </div>

 <?php } elseif (is_search()) { ?>
 <div id="archive_catch">
  <?php
       if ( have_posts() ) :
         if (isset($_GET['s']) && empty($_GET['s'])) {
  ?>
  <h2 class="catch rich_font color_font" style="font-size:<?php echo esc_attr($options['archive_blog_headline_font_size']); ?>px;"><?php _e('Search result','tcd-w'); ?></h2>
  <?php } else { ?>
  <h2 class="catch rich_font color_font" style="font-size:<?php echo esc_attr($options['archive_blog_headline_font_size']); ?>px;"><?php printf(__('Search results for - %s', 'tcd-w'), get_search_query()); ?></h2>
  <?php }; ?>
  <?php else: ?>
  <h2 class="catch rich_font color_font" style="font-size:<?php echo esc_attr($options['archive_blog_headline_font_size']); ?>px;"><?php _e('Search result','tcd-w'); ?></h2>
  <?php endif; ?>
 </div>

 <?php } elseif (is_day()) { ?>
 <div id="archive_catch">
  <h2 class="catch rich_font color_font" style="font-size:<?php echo esc_attr($options['archive_blog_headline_font_size']); ?>px;"><?php printf(__('Archive for &#8216; %s &#8217;', 'tcd-w'), esc_html(get_the_time(__('F jS, Y', 'tcd-w')))); ?></h2>
 </div>

 <?php } elseif (is_month()) { ?>
 <div id="archive_catch">
  <h2 class="catch rich_font color_font" style="font-size:<?php echo esc_attr($options['archive_blog_headline_font_size']); ?>px;"><?php printf(__('Archive for &#8216; %s &#8217;', 'tcd-w'), esc_html(get_the_time(__('F, Y', 'tcd-w')))); ?></h2>
 </div>

 <?php } elseif (is_year()) { ?>
 <div id="archive_catch">
  <h2 class="catch rich_font color_font" style="font-size:<?php echo esc_attr($options['archive_blog_headline_font_size']); ?>px;"><?php printf(__('Archive for &#8216; %s &#8217;', 'tcd-w'), esc_html(get_the_time(__('Y', 'tcd-w')))); ?></h2>
 </div>

 <?php } elseif (is_author()) { ?>
 <div id="archive_catch">
  <?php global $wp_query; $curauth = $wp_query->get_queried_object(); //get the author info ?>
  <h2 class="catch rich_font color_font" style="font-size:<?php echo esc_attr($options['archive_blog_headline_font_size']); ?>px;"><?php printf(__('Archive for the &#8216; %s &#8217;', 'tcd-w'), esc_html($curauth->display_name) ); ?></h2>
 </div>

 <?php } else { // if is blog page ?>

 <?php
      $catch = $options['archive_blog_headline'];
      $desc = $options['archive_blog_desc'];
      if($catch || $desc) {
 ?>
 <div id="archive_catch">
  <?php if(!empty($title)) { ?>
  <h2 class="catch rich_font color_font" style="font-size:<?php echo esc_attr($options['archive_blog_headline_font_size']); ?>px;"><?php echo nl2br(wp_kses_post($catch)); ?></h2>
  <?php }; ?>
  <?php if(!empty($desc)) { ?>
  <p class="desc"><?php echo nl2br(wp_kses_post($desc)); ?></p>
  <?php }; ?>
 </div>
 <?php }; ?>

 <?php }; ?>

 <?php if (isset($_GET['s']) && empty($_GET['s'])) { ?>
 <p class="no_post"><?php _e('Search keyword is empty.','tcd-w'); ?></p>
 <?php } else { ?>

 <?php if ( have_posts() ) : ?>
 <div id="blog_list" class="clearfix">
  <?php while ( have_posts() ) : the_post(); ?>
  <article class="item clearfix">
   <?php if(has_post_thumbnail()) { ?>
   <a class="image" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('size3'); ?></a>
   <?php
        } else {
          $no_image2 = wp_get_attachment_image_src( $options['no_image2'], 'full' );
   ?>
   <a class="image" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php if(!empty($no_image2)) { echo esc_attr($no_image2[0]); } else { echo bloginfo('template_url') . '/img/common/no_image2.gif'; }; ?>" title="" alt="" /></a>
   <?php }; ?>
   <div class="title_area">
    <h4 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php if(wp_is_mobile()) { trim_title(26); } else { trim_title(52); }; ?></a></h4>
    <ul class="meta clearfix">
     <li class="date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.j'); ?></time></li>
     <li class="category"><?php the_category(', '); ?></li>
    </ul>
   </div>
  </article>
  <?php endwhile; ?>
 </div><!-- #blog_list -->
 <?php get_template_part('template-parts/navigation'); ?>
 <?php else: ?>
 <p class="no_post"><?php _e('There is no registered post.', 'tcd-w');  ?></p>
 <?php endif; ?>

 <?php }; ?>

</div><!-- END #main_col -->

<?php get_footer(); ?>