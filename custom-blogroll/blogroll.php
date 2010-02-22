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

  //  extract (shortcode_atts(array('categories'=>''), $args));

  $cat_array = explode(',',$args['categories']);;
  
 
  //working version with posts.
  $main_posts = get_posts(array('numberposts'=>-1,'category__and' => $cat_array));

  foreach ( (array) $main_posts as $post) {    
    $result;
    $result['title'] = $post->post_title;
    $result['link'] = $post->guid;

    $output .= make_link($result);
  }

  return $output;
  //  return "this is a test of the custom bookmarks.";
}



add_shortcode('show-bookmarks', 'custom_bookmarks')

?>

