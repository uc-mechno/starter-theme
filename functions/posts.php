<?php

/**
 * ************************************************************************
 *
 * posts.php
 *
 * カスタム投稿、カスタムタクソノミーなどの設定
 *
 * ************************************************************************
 */

/**
 * カスタム投稿タイプ daily_contribution を登録する
 * ************************************************************************
 *
 * @link https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_post_type
 * @see https://prograshi.com/wordpress/wp-register_post_type/
 * @see https://www.webdesignleaves.com/pr/wp/wp_custom_post_type.html
 *
 */
function my_add_custom_post()
{
  register_post_type(
    'daily_contribution', // スラッグ名
    [
      'label' => '地域貢献活動', // ラベル名
      'labels' => [
        'name' => '地域貢献活動', // ラベル名
        'all_items' => '地域貢献活動一覧', // すべての
        'add_new' => '新規地域貢献活動', // 新規追加
        'edit_item' => 'レンタルの編集', // 編集
        'new_item' => '新規レンタルの編集', // 新規
        'view_item' => 'レンタルを表示', // 表示
        'search_items' => 'レンタルを検索', // 検索
        'not_found' => '見つかりません', // 見つかりません
        'not_found_in_trash' => 'ゴミ箱内に見つかりません', // ゴミ箱内に見つかりません
        'parent_item_colon' => '親', // 親
      ],
      'public' => true, // 公開
      'has_archive' => true, // アーカイブ
      'menu_position' => 5, // 位置
      'show_in_rest' => true, // Gutenbergエディタを有効
      'supports' => [
        'title', // タイトル
        'editor', // エディター
        'custom-fields', // カスタムフィールド
        'thumbnail', // アイキャッチ
        'excerpt', // 抜粋
        'revisions', // リビジョン
        'page-attributes', // ページ属性
      ],
    ]
  );
}
add_action('init', 'my_add_custom_post');

/**
 * カスタム分類 event を登録する
 * ************************************************************************
 */
function my_add_taxonomy()
{
  register_taxonomy(
    'event', // タクソノミー名
    'daily_contribution', // カスタム投稿タイプ名
    [
      'label' => 'イベントの種類',
      'labels' => [
        'name' => 'イベントの種類', // ラベル名
        'all_items' => '全てのイベント', // すべての
        'edit_item' => 'イベントを編集', // 〇〇を編集
        'view_item' => 'イベントを表示', // 表示
        'update_item' => 'イベントを更新', // 〇〇を更新
        'add_new_item' => '新規イベントを追加', // 新規追加の名前
        'parent_item' => '親イベントを追加', // 親
        'search_items' => 'イベントを検索', // 検索
      ],
      'public' => true, // 公開
      'hierarchical' => true, // カテゴリー形式
      'show_in_rest' => true, // Gutenberg で表示
    ]
  );
}
add_action('init', 'my_add_taxonomy');
