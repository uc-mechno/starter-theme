<?php

/**
 * ************************************************************************
 *
 * script.php
 *
 * スクリプトの読み込み
 *
 * ************************************************************************
 */

function my_enqueue_script()
{

  /**
   * scriptの読み込み
   * ************************************************************************
   */

  // デフォルトのjqueryの読み込み
  wp_enqueue_script('jquery');

  // デフォルトjquery削除
  // wp_deregister_script('jquery');

  // GoogleCDNから読み込む
  // wp_enqueue_script(
  //   'jquery-js',
  //   '//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js',
  //   [],
  //   '3.6.0'
  // );

  wp_enqueue_script(
    'bundle_js',
    GET_PATH('js') . '/assets/js/bundle.js',
    ['jquery'],
    filemtime(get_theme_file_path('/assets/js/bundle.js')),
  );

  // その他のスクリプトを読み込む
  // wp_enqueue_script(
  //   'slick',
  //   GET_PATH('js') . '/slick.min.js',
  //   ['jquery']
  // );
}
add_action('wp_enqueue_scripts', 'my_enqueue_script');

/**
 * style scriptの整形
 * ************************************************************************
 */

// TODO：多数追加後の依存関係
// TODO：typeなどの削除
// TODO：シングルクォーテーションなど
// TODO：style_loader_tag
