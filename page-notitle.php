<?php
/*
Template Name:No page title
*/
__('No page title', 'tcd-w');
?>
<?php
     get_header();
     $options = get_design_plus_option();
?>

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