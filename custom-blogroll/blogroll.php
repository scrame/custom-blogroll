<?php
  /*
   Plugin Name: Custom Blogroll
   Plugin URI: http://wordpress.org/#
Description: Custom blogroll
Very simple, just embed
   [show-bookmarks categories="1,2,3"]

  BUGS: Does not show bookmarks, just posts. 
Author: scrame
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

  $cat_array = explode(',',$args['categories']);;

  $main_posts = get_posts(array('numberposts'=>-1,'category__and' => $cat_array));

  // to do this with bookmarks, we'll probably need to change the field from guid, to whatever the link is.
  //  $main_posts = get_bookmarks(array('numberposts'=>-1,'category__and' => $cat_array));

  foreach ( (array) $main_posts as $post) {    
    $result;
    $result['title'] = $post->post_title;
    $result['link'] = $post->guid;

    $output .= make_link($result);
  }

  return $output;
}

//register handler with WP.
add_shortcode('show-bookmarks', 'custom_bookmarks')

?>

