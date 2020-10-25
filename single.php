<?php
     get_header();
     $options = get_design_plus_option();
?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<div id="main_col" class="clearfix">

 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 <div id="left_col" class="clearfix">

   <article id="article">

    <h2 id="post_title" class="rich_font entry-title"><?php the_title(); ?></h2>

    <?php if ( $options['show_date'] || $options['show_category']){ ?>
    <ul id="post_meta_top" class="clearfix">
     <?php if ( $options['show_date'] ){ ?><li class="date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.j'); ?></time></li><?php }; ?>
     <?php if ( $options['show_category'] ){ ?><li class="category clearfix"><?php the_category(', '); ?></li><?php }; ?>
    </ul>
    <?php }; ?>

    <?php if($page == '1') { ?>

    <?php if($options['show_thumbnail'] && has_post_thumbnail()) { ?>
    <div id="post_image">
     <?php the_post_thumbnail('size3'); ?>
    </div>
    <?php }; ?>

    <?php
         // mobile banner ------------------------------------------------------------------------------------------------------------------------
         if(is_mobile()) {
    ?>
    <?php if( $options['single_mobile_ad_code1'] || $options['single_mobile_ad_image1'] ) { ?>
    <div id="mobile_banner_top" class="single_banner_area one_banner">
     <?php if ($options['single_mobile_ad_code1']) { ?>
     <div class="single_banner">
      <?php echo $options['single_mobile_ad_code1']; ?>
     </div>
     <?php } else { ?>
     <?php $single_mobile_image = wp_get_attachment_image_src( $options['single_mobile_ad_image1'], 'full' ); ?>
     <div class="single_banner">
      <a href="<?php echo esc_url( $options['single_mobile_ad_url1'] ); ?>" target="_blank"><img src="<?php echo esc_attr($single_mobile_image[0]); ?>" alt="" title="" /></a>
     </div>
     <?php }; ?>
    </div><!-- END #single_banner_area_top -->
    <?php }; ?>
    <?php }; ?>

    <?php if($options['show_sns_top']) { ?>
    <div class="single_share clearfix" id="single_share_top">
     <?php get_template_part('template-parts/sns-btn-top'); ?>
    </div>
    <?php };?>

    <?php
         // banner top ------------------------------------------------------------------------------------------------------------------------
         if(!is_mobile()) {
           if( $options['single_top_ad_code1'] || $options['single_top_ad_image1'] || $options['single_top_ad_code2'] || $options['single_top_ad_image2'] ) {
    ?>
    <div id="single_banner_top" class="single_banner_area clearfix<?php if( !$options['single_top_ad_code2'] && !$options['single_top_ad_image2'] ) { echo ' one_banner'; }; ?>">
     <?php if ($options['single_top_ad_code1']) { ?>
     <div class="single_banner single_banner_left">
      <?php echo $options['single_top_ad_code1']; ?>
     </div>
     <?php } else { ?>
     <?php $single_image1 = wp_get_attachment_image_src( $options['single_top_ad_image1'], 'full' ); ?>
     <div class="single_banner single_banner_left">
      <a href="<?php echo esc_url( $options['single_top_ad_url1'] ); ?>" target="_blank"><img src="<?php echo esc_attr($single_image1[0]); ?>" alt="" title="" /></a>
     </div>
     <?php }; ?>
     <?php if ($options['single_top_ad_code2']) { ?>
     <div class="single_banner single_banner_right">
      <?php echo $options['single_top_ad_code2']; ?>
     </div>
     <?php } else { ?>
     <?php $single_image2 = wp_get_attachment_image_src( $options['single_top_ad_image2'], 'full' ); ?>
     <div class="single_banner single_banner_right">
      <a href="<?php echo esc_url( $options['single_top_ad_url2'] ); ?>" target="_blank"><img src="<?php echo esc_attr($single_image2[0]); ?>" alt="" title="" /></a>
     </div>
     <?php }; ?>
    </div><!-- END #single_banner_area -->
    <?php
           };
         };
    ?>

    <?php }; // if page 1 ?>

    <div class="post_content clearfix">
     <?php
          the_content();
          if ( ! post_password_required() ) {
            $pagenation_type = 'type3' === $post->pagenation_type ? $options['pagenation_type'] : $post->pagenation_type;
            if ( 'type2' === $pagenation_type ) {
              if ( $page < $numpages && preg_match( '/href="(.*?)"/', _wp_link_page( $page + 1 ), $matches ) ) :
     ?>
     <div id="p_readmore">
      <a class="button" href="<?php echo esc_url( $matches[1] ); ?>"><?php _e( 'Read more', 'tcd-w' ); ?></a>
      <p class="num"><?php echo $page . ' / ' . $numpages; ?></p>
     </div>
     <?php
              endif;
            } else {
              custom_wp_link_pages();
            }
          }
     ?>
    </div>

    <?php if($options['show_sns_btm']) { ?>
    <div class="single_share clearfix" id="single_share_bottom">
     <?php get_template_part('template-parts/sns-btn-btm'); ?>
    </div>
    <?php }; ?>

    <?php if ($options['show_author'] || $options['show_category'] || $options['show_tag'] || $options['show_comment']) { ?>
    <ul id="post_meta_bottom" class="clearfix">
     <?php if ($options['show_author']) : ?><li class="post_author"><?php _e("Author","tcd-w"); ?>: <?php if (function_exists('coauthors_posts_links')) { coauthors_posts_links(', ',', ','','',true); } else { the_author_posts_link(); }; ?></li><?php endif; ?>
     <?php if ($options['show_category']){ ?><li class="post_category"><?php the_category(', '); ?></li><?php }; ?>
     <?php if ($options['show_tag']): ?><?php the_tags('<li class="post_tag">',', ','</li>'); ?><?php endif; ?>
     <?php if ($options['show_comment']) : if (comments_open()){ ?><li class="post_comment"><?php _e("Comment","tcd-w"); ?>: <a href="#comment_headline"><?php comments_number( '0','1','%' ); ?></a></li><?php }; endif; ?>
    </ul>
    <?php }; ?>

    <?php if ($options['show_next_post']) : ?>
    <div id="previous_next_post" class="clearfix">
     <?php next_prev_post_link(); ?>
    </div>
    <?php endif; ?>

   </article><!-- END #article -->

   <?php
        // banner bottom ------------------------------------------------------------------------------------------------------------------------
        if(!is_mobile()) {
          if( $options['single_bottom_ad_code1'] || $options['single_bottom_ad_image1'] || $options['single_bottom_ad_code2'] || $options['single_bottom_ad_image2'] ) {
   ?>
   <div id="single_banner_bottom" class="single_banner_area clearfix<?php if( !$options['single_bottom_ad_code2'] && !$options['single_bottom_ad_image2'] ) { echo ' one_banner'; }; ?>">
    <?php if ($options['single_bottom_ad_code1']) { ?>
    <div class="single_banner single_banner_left">
     <?php echo $options['single_bottom_ad_code1']; ?>
    </div>
    <?php } else { ?>
    <?php $single_image1 = wp_get_attachment_image_src( $options['single_bottom_ad_image1'], 'full' ); ?>
    <div class="single_banner single_banner_left">
     <a href="<?php echo esc_url( $options['single_bottom_ad_url1'] ); ?>" target="_blank"><img src="<?php echo esc_attr($single_image1[0]); ?>" alt="" title="" /></a>
    </div>
    <?php }; ?>
    <?php if ($options['single_bottom_ad_code2']) { ?>
    <div class="single_banner single_banner_right">
     <?php echo $options['single_bottom_ad_code2']; ?>
    </div>
    <?php } else { ?>
    <?php $single_image2 = wp_get_attachment_image_src( $options['single_bottom_ad_image2'], 'full' ); ?>
    <div class="single_banner single_banner_right">
     <a href="<?php echo esc_url( $options['single_bottom_ad_url2'] ); ?>" target="_blank"><img src="<?php echo esc_attr($single_image2[0]); ?>" alt="" title="" /></a>
    </div>
    <?php }; ?>
   </div><!-- END #single_banner_area -->
   <?php
          };
        };
   ?>

   <?php
        // mobile banner ------------------------------------------------------------------------------------------------------------------------
        if(is_mobile()) {
   ?>
   <?php if( $options['single_mobile_ad_code2'] || $options['single_mobile_ad_image2'] ) { ?>
   <div id="mobile_banner_bottom" class="single_banner_area one_banner">
    <?php if ($options['single_mobile_ad_code2']) { ?>
    <div class="single_banner">
     <?php echo $options['single_mobile_ad_code2']; ?>
    </div>
    <?php } else { ?>
    <?php $single_mobile_image = wp_get_attachment_image_src( $options['single_mobile_ad_image2'], 'full' ); ?>
    <div class="single_banner">
     <a href="<?php echo esc_url( $options['single_mobile_ad_url2'] ); ?>" target="_blank"><img src="<?php echo esc_attr($single_mobile_image[0]); ?>" alt="" title="" /></a>
    </div>
    <?php }; ?>
   </div><!-- END #single_banner_area_bottom -->
   <?php }; ?>
   <?php }; // END if mobile ?>

   <?php endwhile; endif; ?>

   <?php
        // related post *******************************************************************************
        if ($options['show_related_post']){
          $categories = get_the_category($post->ID);
          if ($categories) {
            $category_ids = array();
            foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
            $args=array( 'category__in' => $category_ids, 'post__not_in' => array($post->ID), 'showposts'=> 6, 'orderby' => 'rand');
            $my_query = new wp_query($args);
            if($my_query->have_posts()):
   ?>
   <div id="related_post">
    <h3 class="headline"><?php echo esc_html($options['related_headline']); ?></h3>
    <ol class="clearfix">
     <?php
          while ($my_query->have_posts()): $my_query->the_post();
     ?>
     <li class="clearfix">
      <?php if(has_post_thumbnail()) { ?>
      <a class="image" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('size3'); ?></a>
      <?php
           } else {
             $no_image2 = wp_get_attachment_image_src( $options['no_image2'], 'full' );
      ?>
      <a class="image" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php if(!empty($no_image2)) { echo esc_attr($no_image2[0]); } else { echo bloginfo('template_url') . '/img/common/no_image2.gif'; }; ?>" title="" alt="" /></a>
      <?php }; ?>
      <h4 class="title"><a href="<?php the_permalink() ?>" name=""><?php trim_title(30); ?></a></h4>
     </li>
     <?php endwhile; wp_reset_postdata(); ?>
    </ol>
   </div>
   <?php endif; }; ?>
   <?php }; ?>

   <?php if ($options['show_comment']) : if (function_exists('wp_list_comments')) { comments_template('', true); } else { comments_template(); }; endif; ?>

 </div><!-- END #left_col -->

 <?php get_sidebar(); ?>

</div><!-- END #main_col -->

<?php get_footer(); ?>