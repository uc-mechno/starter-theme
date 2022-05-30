<?php

/**
 * ************************************************************************
 *
 * custom.php
 *
 * その他のごく短い関数
 *
 * ************************************************************************
 */

/**
 * メイン画像上にテンプレートごとの文字列を表示
 * ************************************************************************
 */
function get_main_title()
{
  if (is_singular('post')) :
    $category_obj = get_the_category();
    return $category_obj[0]->name;
  elseif (is_page()) :
    return get_the_title();
  elseif (is_category()) :
    return single_cat_title();
  endif;
}

/**
 * 子ページを取得する
 * ************************************************************************
 */
function get_child_pages($number = -1, $specified_id = null)
{
  if (isset($specified_id)) :
    $parent_id = $specified_id;
  else :
    $parent_id = get_the_ID();
  endif;
  $args = array(
    'posts_per_page' => $number,
    'post_type' => 'page',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'post_parent' => $parent_id,
  );
  $child_pages = new WP_Query($args);
  return $child_pages;
}
