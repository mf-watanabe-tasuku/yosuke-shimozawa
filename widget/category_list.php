<?php

class tcdw_category_list_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'tcdw_category_list_widget',// ID
      __( 'Category list (tcd ver)', 'tcd-w' ),
      array(
        'classname' => 'tcdw_category_list_widget',
        'description' => __('Displays designed category list.', 'tcd-w')
      )
    );
  }

  function widget($args, $instance) {

    extract( $args );
    $title = apply_filters('widget_title', $instance['title']);
    $exclude_cat_num = $instance['exclude_cat_num'];
    $show_count = $instance['show_count'];

    // Before widget //
    echo $before_widget;

    // Title of widget //
    if ( $title ) { echo $before_title . $title . $after_title; }

    // Widget output //
    $args = array(
      'exclude'   => $exclude_cat_num,
      'title_li'     => '',
      'show_count' => 1,
      'hierarchical' => 1,
      'echo' => 0
    );

?>
<ul class="tcd_category_list clearfix<?php if($show_count == 1) { echo ' show_count'; }; ?>">
 <?php
      $categories = wp_list_categories($args);
      $categories = preg_replace('/<\/a> \((\b\d{1,3}(,\d{3})*\b)\)/', ' <span class="count">\\1</span></a>', $categories);
      echo $categories;
 ?>
</ul>
<?php

    // After widget //
    echo $after_widget;

  } // end function widget


  // Update Settings //
  function update($new_instance, $old_instance) {
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['exclude_cat_num'] = $new_instance['exclude_cat_num'];
    $instance['show_count'] = $new_instance['show_count'];
    return $instance;
  }

  // Widget Control Panel //
  function form($instance) {
    $defaults = array( 'title' => __('Category list', 'tcd-w'), 'exclude_cat_num' => '', 'show_count' => '');
    $instance = wp_parse_args( (array) $instance, $defaults );
?>
<p>
 <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tcd-w'); ?></label>
 <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>'" type="text" value="<?php echo $instance['title']; ?>" />
</p>
<p>
 <label for="<?php echo $this->get_field_id('exclude_cat_num'); ?>"><?php _e('Categories To Exclude:', 'tcd-w'); ?></label>
 <input class="widefat" id="<?php echo $this->get_field_id('exclude_cat_num'); ?>" name="<?php echo $this->get_field_name('exclude_cat_num'); ?>'" type="text" value="<?php echo $instance['exclude_cat_num']; ?>" />
 <span><?php _e('Enter a comma-seperated list of category ID numbers, example 2,4,10<br />(Don\'t enter comma for last number).', 'tcd-w'); ?></span>
</p>
<p>
 <input id="<?php echo $this->get_field_id('show_count'); ?>" name="<?php echo $this->get_field_name('show_count'); ?>" type="checkbox" value="1" <?php checked( '1', $instance['show_count'] ); ?> />
 <label for="<?php echo $this->get_field_id('show_count'); ?>"><?php _e('Display post count', 'tcd-w'); ?></label>
</p>
<?php
  } // end function form

} // end class


function register_tcdw_category_list_widget() {
	register_widget( 'tcdw_category_list_widget' );
}
add_action( 'widgets_init', 'register_tcdw_category_list_widget' );


?>