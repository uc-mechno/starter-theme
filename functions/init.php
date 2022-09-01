<?php

/**
 * ************************************************************************
 *
 * init.php
 *
 * 初期設定
 *
 * ************************************************************************
 */

function my_theme_setup()
{

  /**
   * アイキャッチ画像を利用できるようにする
   * ************************************************************************
   */
  add_theme_support('post-thumbnails');

  /**
   * 画像サイズを登録
   * ************************************************************************
   *
   * @link https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_image_size
   *
   */
  add_image_size('top', 1077, 622, true); // トップページのメイン
  add_image_size('contribution', 557, 280, true); // 地域貢献活動一覧
  add_image_size('front-contribution', 255, 189, true); // トップページの地域貢献活動
  add_image_size('common', 465, 252, true);  // 企業情報・店舗情報一覧
  add_image_size('detail', 1100, 330, true); // 各ページのメイン
  add_image_size('search', 168, 168, true); // 検索一覧画像
  add_image_size('search', 1100, 330, true); // 検索一覧画像

  /**
   * 抜粋を利用できるようにする
   * ************************************************************************
   */
  add_post_type_support('page', 'excerpt');
}
add_action('after_setup_theme', 'my_theme_setup');
