<?php

/**
 * ************************************************************************
 *
 * search.php
 * @see https://cocotiie.com/wordpress-search-invisible/
 * ************************************************************************
 */
// 固定ページ
// function my_main_query( $query ) {
//   if ( ! is_admin() && $query->is_main_query() ) {
//     if ( $query->is_search ) {
//       $query->set( 'post_type', 'post' ) ;
//     }
//   }
// }
// add_action ('pre_get_posts', 'my_main_query' );

// 特定ページを除外
function my_post_only_query($query)
{
  if (!is_admin() && $query->is_main_query()) {
    if ($query->is_search) {
      $query->set('post__not_in', array(596));
    }
  }
}
add_action('pre_get_posts', 'my_post_only_query');
