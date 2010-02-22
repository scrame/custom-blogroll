<?php
  /*
   Plugin Name: Custom Blogroll
   Plugin URI: http://wordpress.org/#
Description: Custom blogroll
Author: liam
Version: 0.1
Author URI: 
*/

         /*
          helper function for generating a link.
          */
function make_link($result_map) {
  return '<a href='
    .'"' . $result_map['link']  .'"'
    .'>'
    .$result_map['title']
    .'</a>'
    .'<p>';
}

function custom_bookmarks($args) {

  extract (shortcode_atts(array('categories'=>''), $args));
  
  
 
  //working version with posts.
  $main_posts = get_posts(array('numberposts'=>-1,'category__and' => array($categories)));

  $output = "<h1>$args</h1>";
  foreach(array_keys($args) as $key) {
    $output .= "<p>$arg</p>";
  }

  foreach($args as $arg) {
    $output .= "<p>$arg</p>";
  }

  foreach($categories as $cat) {
    $output .= "<p>$cat</p>";
  }

  foreach ( (array) $main_posts as $post) {    
    $result;
    $result['title'] = apply_filters('the_title', $post->post_title);
    $result['link'] = apply_filters('the_link', $post->post_link);

    $output .= make_link($result);
  }

  return $output;
  //  return "this is a test of the custom bookmarks.";
}



add_shortcode('show-bookmarks', 'custom_bookmarks')

?>

