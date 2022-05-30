<?php
/**
 * ************************************************************************
 *
 * init.php
 *
 * 初期設定的な関数など
 *
 * ************************************************************************
 */

/**
 * ユーザー権限毎に body にclassをふる
 * ************************************************************************
 */
function add_user_role_class( $admin_body_class ) {
  global $current_user;
  if ( ! $admin_body_class ) {
      $admin_body_class .= ' ';
  }
  $admin_body_class .= ' role-' . urlencode( $current_user->roles[0] );
  return $admin_body_class;
}
add_filter( 'admin_body_class', 'add_user_role_class' );

/**
 * スラッグ名のクラスを自動で出力
 * ************************************************************************
 */
function add_class_page_slug($classes) {
  if( is_page() ) {
      $page = get_post( get_the_ID() );
      $classes[] = $page->post_name;
  }
  return $classes;
}
add_filter('body_class', 'add_class_page_slug');
