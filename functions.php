<?php

/**
 * ************************************************************************
 * functions.phpを分割
 * @see https://meshikui.com/2018/08/24/753/
 *
 * ドキュメント
 * @link https://ja.wordpress.org/team/handbook/coding-standards/inline-documentation-standards/php/
 *
 * テーマの作成
 * @link https://wpdocs.osdn.jp/%E3%83%86%E3%83%BC%E3%83%9E%E3%81%AE%E4%BD%9C%E6%88%90
 *
 * ************************************************************************
 */

/**
 * get_template_part()だとglobal変数が渡せない
 * @see https://www-creators.com/archives/465
 * locate_template()関数を使う
 * get_template_part('include/global');
 * ↓
 * require_once locate_template('include/global.php');
 *
 *
 * @see https://tabibitojin.com/wordpress-functions-php-separate/
 *
 * @link https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/locate_template
 *
 */
require locate_template('functions/global.php'); // global変数
require locate_template('functions/init.php'); // 初期設定
require locate_template('functions/custom-menu.php'); // カスタムメニューの設定
require locate_template('functions/widgets.php'); // ウィジェットの設定
require locate_template('functions/custom.php'); // その他の関数
require locate_template('functions/code.php'); // ショートコード集
require locate_template('functions/head.php'); // headタグ
require locate_template('functions/styles.php'); // styleの読み込み
require locate_template('functions/scripts.php'); // scriptの読み込み
require locate_template('functions/editor.php'); // エディターに関するカスタマイズ
require locate_template('functions/admin.php'); // 権限別の管理画面の設定
require locate_template('functions/delete.php'); // 不要なものを削除
require locate_template('functions/posts.php'); // カスタム投稿の設定
// require locate_template('functions/taxonomy.php'); // カスタムタクソノミーの設定
require locate_template('functions/category.php'); // カテゴリーの設定
require locate_template('functions/wp_head.php'); // wp-headの設定
require locate_template('functions/wp_body_open.php'); // wp_body_openの設定
require locate_template('functions/breadcrumbs.php'); // パンくずの設定
require locate_template('functions/pagination.php'); // ページネーションの設定
require locate_template('functions/titles.php'); // タイトルの設定
require locate_template('functions/excerpts.php'); // 抜粋の設定
require locate_template('functions/search.php'); // 検索の設定
require locate_template('functions/plugins/contactform7.php'); // contactform7の設定

/**
* Theme Customizer
* テーマカスタマイザーを使うときに。
*/
// require locate_template('customizer/customize'); // カスタマイザーの記述はここ
// require locate_template('customizer/style'); // 色を変えたりするときのstyleの記述
// require locate_template('customizer/customizer-repeater/functions'); // repeaterのプラグイン
// require locate_template('customizer/repeater'); // repeaterのカスタマイズ
