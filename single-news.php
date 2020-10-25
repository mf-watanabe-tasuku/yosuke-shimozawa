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

    <ul id="post_meta_top" class="clearfix">
     <li class="date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.j'); ?></time></li>
    </ul>

    <?php if($page == '1') { ?>

    <?php if($options['show_thumbnail'] && has_post_thumbnail()) { ?>
    <div id="post_image">
     <?php the_post_thumbnail('size3'); ?>
    </div>
    <?php }; ?>

    <?php if($options['show_news_sns_top']) { ?>
    <div class="single_share clearfix" id="single_share_top">
     <?php get_template_part('template-parts/sns-btn-top'); ?>
    </div>
    <?php };?>

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

    <?php if($options['show_news_sns_btm']) { ?>
    <div class="single_share clearfix" id="single_share_bottom">
     <?php get_template_part('template-parts/sns-btn-btm'); ?>
    </div>
    <?php }; ?>

    <?php if ($options['show_news_next_post']) : ?>
    <div id="previous_next_post" class="clearfix">
     <?php next_prev_post_link(); ?>
    </div>
    <?php endif; ?>

   </article><!-- END #article -->

   <?php endwhile; endif; ?>

   <?php if ( $options['show_news_recent_list'] == 1){ ?>
   <div id="single_news_list">
    <h3 class="headline"><?php echo esc_html($options['single_news_recent_headline']); ?></h3>
    <a class="link" href="<?php echo esc_url(get_post_type_archive_link('news')); ?>"><?php echo esc_html($options['single_news_recent_link']); ?></a>
    <ol>
     <?php
          $args = array('post_type' => 'news', 'posts_per_page' => 10, 'ignore_sticky_posts' => 1);
          $news_list = new WP_Query($args);
          if ($news_list->have_posts()) {
            while ($news_list->have_posts()) : $news_list->the_post();
     ?>
     <li>
      <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="clearfix">
       <h4 class="title"><?php trim_title(45); ?></h4>
       <p class="date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.j'); ?></time></p>
      </a>
     </li>
     <?php endwhile; wp_reset_query(); }; ?>
    </ol>
   </div><!-- END #single_news_list -->
   <?php }; ?>

 </div><!-- END #left_col -->

 <?php get_sidebar(); ?>

</div><!-- END #main_col -->

<?php get_footer(); ?>