<?php
/**
 * ************************************************************************
 *
 * styles.php
 *
 * スタイルシートの読み込み
 *
 * ************************************************************************
 */

function my_enqueue_styles()
{

/**
 * styleの読み込み
 * ************************************************************************
 */
  wp_enqueue_style(
    'my_style',
    GET_PATH('css') . '/styles.css',
    array(),
    filemtime(get_theme_file_path('/assets/css/styles.css')),
  );

  // その他のスタイルを読み込む
  wp_enqueue_style(
    'slick',
    GET_PATH('css') . '/slick.css',
    array('my_style')
  );
  wp_enqueue_style(
    'slick-theme',
    GET_PATH('css') . '/slick-theme.css',
    array('slick')
  );

  // デフォルトのjqueryの読み込み
  wp_enqueue_script('jquery');

  // デフォルトjquery削除
  // wp_deregister_script('jquery');

  // GoogleCDNから読み込む
  // wp_enqueue_script(
  //   'jquery-js',
  //   '//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js',
  //   array(),
  //   '3.6.0'
  // );

/**
 * scriptの読み込み
 * ************************************************************************
 */
  wp_enqueue_script(
    'bundle_js',
    GET_PATH('js') . '/assets/js/bundle.js',
    array('jquery'),
    filemtime(get_theme_file_path('/assets/js/bundle.js')),
  );

  // その他のスクリプトを読み込む
  // wp_enqueue_script(
  //   'slick',
  //   GET_PATH('js') . '/slick.min.js',
  //   array('jquery')
  // );
}
add_action('wp_enqueue_scripts', 'my_enqueue_styles');

/**
 * style scriptの整形
 * ************************************************************************
 */

// TODO：多数追加後の依存関係
// TODO：typeなどの削除
// TODO：シングルクォーテーションなど
// TODO：style_loader_tag
