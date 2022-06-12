<?php

/**
 * ************************************************************************
 *
 *  custom-menu.php
 *
 * カスタムメニューの設定
 *
 * ************************************************************************
 */

/**
 * カスタムメニュー
 * ************************************************************************
 */
function my_menu_init()
{
  register_nav_menus(
    [
      'place_global' => esc_html__('グローバル'),
      'place_footer' => esc_html__('フッターナビ'),
    ]
  );
}
add_action('init', 'my_menu_init');

/**
 * wp_nav_menuのaにclass追加
 * @see https://webutubutu.com/webdesign/3692
 * wp_get_nav_menu_itemsを使う場合は使わなくよい
 */
// function description_in_nav_menu($item_output, $item)
// {
//   return preg_replace('/(<a.*?)/', '$1' . " class='nav-link'", $item_output);
// }
// add_filter('walker_nav_menu_start_el', 'description_in_nav_menu', 10, 4);
