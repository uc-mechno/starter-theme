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
add_action('wp_enqueue_scripts', 'my_enqueue_script');

/**
 * style scriptの整形
 * ************************************************************************
 */

// TODO：多数追加後の依存関係
// TODO：typeなどの削除
// TODO：シングルクォーテーションなど
// TODO：style_loader_tag
