<div id="side_col">
<?php
$sidebar = '';

if ( is_singular('news') ) {
  $sidebar = 'news_widget';
} elseif ( is_page() ) {
  $sidebar = 'page_widget';
} else {
  $sidebar = 'single_widget';
}

if ( is_mobile() ) {
  $sidebar .= '_mobile';
}

if ( is_active_sidebar( $sidebar ) ) {
  dynamic_sidebar( $sidebar );
} elseif ( is_active_sidebar( 'common_widget' ) ) {
  dynamic_sidebar( 'common_widget' );
}
?>
</div>
