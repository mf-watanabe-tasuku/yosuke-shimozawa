<?php
class tcdw_custom_drop_menu extends WP_Widget {

  function __construct() {
    parent::__construct(
      'tcdw_custom_drop_menu',// ID
      __( 'Custom dropdown menu (tcd ver)', 'tcd-w' ),
      array(
        'classname' => 'tcdw_custom_drop_menu_widget',
        'description' => __('Displays custom menu with dorpdown child menu.', 'tcd-w')
      )
    );
  }

  public function widget( $args, $instance ) {

    extract( $args );
    $title = apply_filters('widget_title', $instance['title']);

    // Get menu
    $nav_menu1 = ! empty( $instance['nav_menu1'] ) ? wp_get_nav_menu_object( $instance['nav_menu1'] ) : false;

    if ( !$nav_menu1)
      return;

    // Before widget //
    echo $before_widget;

    // Title of widget //
    if ( $title ) { echo $before_title . $title . $after_title; }

    $nav_menu_args1 = array(
      'fallback_cb' => '',
      'menu' => $nav_menu1
		);

?>

<?php if($nav_menu1) { ?>
<div class="tcdw_custom_drop_menu">
 <?php wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args1, $nav_menu1, $args, $instance ) ); ?>
</div>
<?php }; ?>

<?php

    echo $args['after_widget'];

  }

  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = strip_tags($new_instance['title']);
    if ( ! empty( $new_instance['nav_menu1'] ) ) {
      $instance['nav_menu1'] = (int) $new_instance['nav_menu1'];
    }
    return $instance;
  }

  public function form( $instance ) {
    $nav_menu1 = isset( $instance['nav_menu1'] ) ? $instance['nav_menu1'] : '';

    $defaults = array('title' => __('Menu', 'tcd-w'));
    $instance = wp_parse_args( (array) $instance, $defaults );

    // Get menus
    $menus1 = wp_get_nav_menus();

    // If no menus exists, direct the user to go and create some.
?>
<p>
 <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tcd-w'); ?></label>
 <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>'" type="text" value="<?php echo $instance['title']; ?>" />
</p>
<p class="nav-menu-widget-no-menus-message" <?php if ( ! empty( $menus1 ) ) { echo ' style="display:none" '; } ?>>
<?php
     if ( isset( $GLOBALS['wp_customize'] ) && $GLOBALS['wp_customize'] instanceof WP_Customize_Manager ) {
       $url = 'javascript: wp.customize.panel( "nav_menus" ).focus();';
     } else {
       $url = admin_url( 'nav-menus.php' );
     }
?>
<?php echo sprintf( __( 'No menus have been created yet. <a href="%s">Create some</a>.' ), esc_attr( $url ) ); ?>
</p>
<div class="nav-menu-widget-form-controls" <?php if ( empty( $menus1 ) ) { echo ' style="display:none" '; } ?>>
 <p>
  <label for="<?php echo $this->get_field_id( 'nav_menu1' ); ?>"><?php _e( 'Select menu' , 'tcd-w'); ?></label>
  <select class="widefat" id="<?php echo $this->get_field_id( 'nav_menu1' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu1' ); ?>">
   <option value="0"><?php _e( '&mdash; Select &mdash;' ); ?></option>
   <?php foreach ( $menus1 as $menu1 ) : ?>
   <option value="<?php echo esc_attr( $menu1->term_id ); ?>" <?php selected( $nav_menu1, $menu1->term_id ); ?>><?php echo esc_html( $menu1->name ); ?></option>
   <?php endforeach; ?>
  </select>
 </p>
</div>
<?php

	} // end Widget Control Panel

} // end class


function register_tcdw_custom_drop_menu() {
	register_widget( 'tcdw_custom_drop_menu' );
}
add_action( 'widgets_init', 'register_tcdw_custom_drop_menu' );


?>