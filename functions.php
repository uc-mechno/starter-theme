<?php

/**
 * ************************************************************************
 * functions.phpを分割
 * @see https://meshikui.com/2018/08/24/753/
 *
 * ************************************************************************
 */

/**
 * get_template_part()だとglobal変数が渡せない
 * @see https://www-creators.com/archives/465
 * locate_template()関数を使う
 * get_template_part('include/global');
 * ↓
 * include locate_template('include/global.php');
 */
include locate_template('functions/global.php'); // global変数
get_template_part('functions/setup'); // wordpressのテーマ拡張機能
get_template_part('functions/custom-menu'); // カスタムメニューの設定
get_template_part('functions/widgets'); // ウィジェットの設定
get_template_part('functions/init'); // 初期設定的な関数など
get_template_part('functions/custom'); // その他のごく短い関数
get_template_part('functions/code'); // ショートコード集
get_template_part('functions/head'); // headタグ
get_template_part('functions/styles'); // styleの読み込み
get_template_part('functions/script'); // scriptの読み込み
get_template_part('functions/editor'); // エディターに関するカスタマイズ
get_template_part('functions/admin'); // 権限別の管理画面の設定
get_template_part('functions/delete'); // 不要なものを削除
get_template_part('functions/posts'); // カスタム投稿の設定
get_template_part('functions/taxonomy'); // カスタムタクソノミーの設定
get_template_part('functions/category'); // カテゴリーの設定
get_template_part('functions/wp_head'); // wp-headの設定
get_template_part('functions/wp_body_open'); // wp_body_openの設定
get_template_part('functions/breadcrumb'); // パンくずの設定
get_template_part('functions/pagination'); // ページネーションの設定
get_template_part('functions/title'); // タイトルの設定
get_template_part('functions/excerpt'); // 抜粋の設定
get_template_part('functions/search'); // 検索の設定
get_template_part('functions/plugins/contactform7'); // contactform7の設定

/**
* Theme Customizer
* テーマカスタマイザーを使うときに。
*/
// get_template_part('customizer/customize'); // カスタマイザーの記述はここ
// get_template_part('customizer/style'); // 色を変えたりするときのstyleの記述
// get_template_part('customizer/customizer-repeater/functions'); // repeaterのプラグイン
// get_template_part('customizer/repeater'); // repeaterのカスタマイズ
