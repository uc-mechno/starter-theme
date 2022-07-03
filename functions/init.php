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

  // トップページのメイン画像用のサイズ設定
  add_image_size('top', 1077, 622, true);

  // 地域貢献活動一覧画像用のサイズ設定
  add_image_size('contribution', 557, 280, true);

  // トップページの地域貢献活動にて使用している画像用のサイズ設定
  add_image_size('front-contribution', 255, 189, true);

  // 企業情報・店舗情報一覧画像用のサイズ設定
  add_image_size('common', 465, 252, true);

  // 各ページのメイン画像用のサイズ設定
  add_image_size('detail', 1100, 330, true);

  // 検索一覧画像用のサイズ設定
  add_image_size('search', 168, 168, true);

  /**
   * 抜粋を利用できるようにする
   * ************************************************************************
   */
  add_post_type_support('page', 'excerpt');
}
add_action('after_setup_theme', 'my_theme_setup');
