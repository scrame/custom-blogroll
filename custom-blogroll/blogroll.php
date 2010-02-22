<?php
/*
Plugin Name: Custom Blogroll
Plugin URI: http://wordpress.org/#
Description: Custom blogroll
Author: liam
Version: 0.1
Author URI: 
*/


$category = 5;
$sub_category = 16;

function make_link($result_map) {
  return '<a href='
    .'"' . $result_map['link']  .'"'
    .'>'
    .$result_map['title']
    .'</a>'
    .'<p>';
}

function custom_bookmarks() {
  $main_posts = get_posts(array('category__and' => array(4,5)));

  $output = '';

  foreach ( (array) $main_posts as $post) {    
    $result;
    $result['title'] = apply_filters('the_title', $post->post_title);
    $result['link'] = apply_filters('the_title', $post->post_link);

    $output .= make_link($result);
  }

  return $output;
  //  return "this is a test of the custom bookmarks.";
}



add_shortcode('show-bookmarks', 'custom_bookmarks')

?>

