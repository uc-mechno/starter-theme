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
    ['notosansjapanese', 'vollkorn'],
    filemtime(get_theme_file_path('/assets/css/styles.css')),
  );

  // その他のスタイルを読み込む
  wp_enqueue_style(
    'notosansjapanese',
    'https://fonts.googleapis.com/earlyaccess/notosansjapanese.css',
  );
  wp_enqueue_style(
    'vollkorn',
    'https://fonts.googleapis.com/css?family=Vollkorn:400i',
  );
  wp_enqueue_style(
    'slick',
    GET_PATH('css') . '/slick.css',
    ['my_style']
  );
  wp_enqueue_style(
    'slick-theme',
    GET_PATH('css') . '/slick-theme.css',
    ['slick']
  );
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
