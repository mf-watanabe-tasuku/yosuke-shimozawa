<?php

function next_prev_post_link() {

  $prev_post = get_adjacent_post(false, '', true);
  $next_post = get_adjacent_post(false, '', false);
  $url = get_bloginfo('template_url');

  if ($prev_post) {
    echo "<div class='prev_post'><a href='" . get_permalink($prev_post->ID) . "' title='" . esc_attr(get_the_title($prev_post->ID)) . "'><span class='title'>" . esc_html(wp_trim_words(get_the_title($prev_post->ID), 40)) . "</span><span class='nav'>". __('Prev post', 'tcd-w') ."</span></a></div>\n";
  };

  if ($next_post) {
    echo "<div class='next_post'><a href='" . get_permalink($next_post->ID) . "' title='" . esc_attr(get_the_title($next_post->ID)) . "'><span class='title'>" . esc_html(wp_trim_words(get_the_title($next_post->ID), 40)) . "</span><span class='nav'>". __('Next post', 'tcd-w') ."</span></a></div>\n";
  };

}


function course_next_prev_post_link() {

  $options = get_design_plus_option();
  $prev_post = get_adjacent_post(false, '', true);
  $next_post = get_adjacent_post(false, '', false);
  $url = get_bloginfo('template_url');

  if ($prev_post) {
    echo "<div class='course_prev_post'><a href='" . get_permalink($prev_post->ID) . "' title='" . esc_attr(get_the_title($prev_post->ID)) . "'><span>". esc_html($options['course_single_prev_label']) ."</span></a></div>\n";
  };

  if ($next_post) {
    echo "<div class='course_next_post'><a href='" . get_permalink($next_post->ID) . "' title='" . esc_attr(get_the_title($next_post->ID)) . "'><span>". esc_html($options['course_single_next_label']) ."</span></a></div>\n";
  };

}


function next_prev_page_link() {

  $prev_post = get_adjacent_post(false, '', true);
  $next_post = get_adjacent_post(false, '', false);
  $options = get_design_plus_option();
  $next = $options['page_link_next'];
  $prev = $options['page_link_prev'];

  if ($prev_post) {
    echo "<a class='prev' href='" . esc_url(get_permalink($prev_post->ID)) . "' title='" . esc_attr(get_the_title($prev_post->ID)) . "'>" . esc_html($prev) . "</a>\n";
  };

  if ($next_post) {
    echo "<a class='next' href='" . esc_url(get_permalink($next_post->ID)) . "' title='" . esc_attr(get_the_title($next_post->ID)) . "'>" . esc_html($next) . "</a>\n";
  };

}


// add class to posts_nav_link()
add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');

function posts_link_attributes_1() {
    return 'class="next"';
}
function posts_link_attributes_2() {
    return 'class="prev"';
}


?>
