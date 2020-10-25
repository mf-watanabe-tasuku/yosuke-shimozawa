<?php $options = get_design_plus_option(); ?>
<div id="bread_crumb">

<ul class="clearfix" itemscope itemtype="http://schema.org/BreadcrumbList">
 <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="home"><a itemprop="item" href="<?php echo esc_url(home_url('/')); ?>"><span itemprop="name"><?php _e('Home', 'tcd-w'); ?></span></a><meta itemprop="position" content="1"></li>
<?php if(is_singular('course')) { ?>
 <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo esc_url(get_post_type_archive_link('course')); ?>"><span itemprop="name"><?php echo esc_html($options['bc_course_title']); ?></span></a><meta itemprop="position" content="2"></li>
 <?php
      $category = get_the_terms($post->ID , 'course_category');
      if(!empty($category)) {
        foreach( (array) $category as $cat ) {
          $cat_id = $cat->term_id;
          $cat_name = $cat->name;
        };
 ?>
 <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo esc_url(get_term_link($cat_id)); ?>"><span itemprop="name"><?php echo esc_html($cat_name); ?></span></a><meta itemprop="position" content="3"></li>
 <?php }; ?>
 <li class="last" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name"><?php if(wp_is_mobile()) { echo trim_title(20); } else { echo the_title_attribute(); }; ?></span><meta itemprop="position" content="4"></li>
<?php } elseif(is_singular('news')) { ?>
 <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo esc_url(get_post_type_archive_link('news')); ?>"><span itemprop="name"><?php echo esc_html($options['bc_news_title']); ?></span></a><meta itemprop="position" content="2"></li>
 <li class="last" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name"><?php if(wp_is_mobile()) { echo trim_title(20); } else { echo the_title_attribute(); }; ?></span><meta itemprop="position" content="3"></li>
<?php } elseif(is_post_type_archive('faq')) { ?>
 <li class="last" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name"><?php echo esc_html($options['bc_faq_title']); ?></span><meta itemprop="position" content="2"></li>
<?php } elseif(is_search()) { ?>
 <li class="last" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name"><?php _e('Search result','tcd-w'); ?></span><meta itemprop="position" content="2"></li>
<?php } else { ?>
 <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo esc_url( get_permalink( get_option('page_for_posts')) ); ?>"><span itemprop="name"><?php echo esc_html($options['archive_blog_title']); ?></span></a><meta itemprop="position" content="2"></li>
 <li class="category" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
  <?php
    $categories=get_the_category();
    $count=1;
    foreach ($categories as $category) {
  ?>
  <a itemprop="item" href="<?php echo get_category_link($category->term_id) ?>"><span itemprop="name"><?php echo $category->name ?></span></a>
  <?php $count++; ?>
  <?php } ?>
  <meta itemprop="position" content="3">
 </li>
 <li class="last" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name"><?php if(wp_is_mobile()) { echo trim_title(20); } else { echo the_title_attribute(); }; ?></span><meta itemprop="position" content="4"></li>
<?php }; ?>
</ul>

</div>
