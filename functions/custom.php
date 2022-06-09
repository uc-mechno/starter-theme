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
  $args = [
    'posts_per_page' => $number,
    'post_type' => 'page',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'post_parent' => $parent_id,
  ];
  $child_pages = new WP_Query($args);
  return $child_pages;
}

/**
 * アイキャッチ画像がなければ、標準画像を取得する
 * ************************************************************************
 *
 * <?php $eyecatch = get_eyecatch_with_default(); ?>
 * <header style="background-image: url('<?php echo $eyecatch[0]; ?>')"></header>
 *
 */
function get_eyecatch_with_default()
{
  if (has_post_thumbnail()) :
    $id  = get_post_thumbnail_id();
    $img = wp_get_attachment_image_src($id, 'large');
  else :
    $img = array(get_template_directory_uri() . '/img/post-bg.jpg');
  endif;

  return $img;
}
