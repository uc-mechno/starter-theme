<?php

/**
 * ************************************************************************
 *
 * ユーザーの設定
 *
 * 管理画面の設定
 *
 * ************************************************************************
 */

/**
 * ユ管理メニューの「投稿」に関する表示を「NEWS（任意）」に変更
 * ************************************************************************
 */
function change_post_menu_label()
{
  global $menu;
  global $submenu;
  $menu[5][0] = 'NEWS';
  $submenu['edit.php'][5][0] = 'NEWS一覧';
  $submenu['edit.php'][10][0] = '新しいNEWS';
  $submenu['edit.php'][16][0] = 'タグ';
}
add_action('init', 'change_post_object_label');

/**
 * 管理画面上の「投稿」に関する表示を「NEWS」に変更
 * ************************************************************************
 */
function change_post_object_label()
{
  global $wp_post_types;
  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'NEWS';
  $labels->singular_name = 'NEWS';
  $labels->add_new = _x('追加', 'NEWS');
  $labels->add_new_item = 'NEWSの新規追加';
  $labels->edit_item = 'NEWSの編集';
  $labels->new_item = '新規NEWS';
  $labels->view_item = 'NEWSを表示';
  $labels->search_items = 'NEWSを検索';
  $labels->not_found = '記事が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に記事は見つかりませんでした';
}
add_action('admin_menu', 'change_post_menu_label');
