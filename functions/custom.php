<?php

/**
 * ************************************************************************
 *
 * custom.php
 *
 * その他のごく短い関数
 *
 * ************************************************************************
 */

/**
 * ユーザー権限毎に body にclassをふる
 * ************************************************************************
 */
function add_user_role_class($admin_body_class)
{
  global $current_user;
  if (!$admin_body_class) {
    $admin_body_class .= ' ';
  }
  $admin_body_class .= ' role-' . urlencode($current_user->roles[0]);
  return $admin_body_class;
}
add_filter('admin_body_class', 'add_user_role_class');

/**
 * スラッグ名のクラスを自動で出力
 * ************************************************************************
 */
function add_class_page_slug($classes)
{
  if (is_page()) {
    $page = get_post(get_the_ID());
    $classes[] = $page->post_name;
  }
  return $classes;
}
add_filter('body_class', 'add_class_page_slug');

/**
 * メイン画像上にテンプレートごとの文字列を表示
 * ************************************************************************
 */
function get_main_title()
{
  if (is_singular('post')) :
    $category_obj = get_the_category();
    return $category_obj[0]->name;
  elseif (is_page()) :
    return get_the_title();
  elseif (is_category() || is_tax()) :
    return single_cat_title();
  elseif (is_search()) :
    return ' サイト内検索結果';
  elseif (is_404()) :
    return ' ページが見つかりません';
  elseif (is_singular('daily_contribution')) :
    global $post;
    $term_obj = get_the_terms($post->ID, 'event');
    return $term_obj[0]->name;
  endif;
}

/**
 * 子ページを出力する関数
 * ************************************************************************
 *
 * @param int $numberに記事数を指定
 * 初期値：-1
 * @param int $specified_idに現在表示している記事のIDを指定
 * 初期値：null
 * @return object $child_pagesにWP_Queryを格納
 *
 *  <?php $sample_pages = get_child_pages(第一引数, 第二引数);
 *  if ($sample_pages->have_posts()) :
 *    while ($sample_pages->have_posts()) : $sample_pages->the_post();
 *
 *      ここに回す記事
 *
 *    endwhile;
 *    wp_reset_postdata();
 *  endif; ?>
 *
 */
function get_child_pages($number = -1, $specified_id = null)
{
  if (isset($specified_id)) :
    $parent_id = $specified_id;
  else :
    $parent_id = get_the_ID();
  endif;
  $args = [
    'posts_per_page' => $number,
    'post_type' => 'page',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'post_parent' => $parent_id,
  ];
  $child_pages = new WP_Query($args);
  return $child_pages;
}

/**
 * 特定の記事を出力する関数
 * ************************************************************************
 *
 * @param int $post_typeに投稿タイプを指定
 * @param int $taxonomyにタクソノミー名を指定
 * 初期値：null
 * @param int $termにターム名を指定
 * 初期値：null
 * @param int $numberに記事数を指定
 * 初期値：-1
 * @return object $specific_postsにWP_Queryを格納
 *
 *  <?php $term = get_specific_posts(第一引数, 第二引数, 第三引数, 第四引数);
 *  if ($term->have_posts()) :
 *    while ($term->have_posts()) : $term->the_post();
 *
 *      ここに回す記事
 *
 *    endwhile;
 *    wp_reset_postdata();
 *  endif; ?>
 *
 */
function get_specific_posts($post_type, $taxonomy = null, $term = null, $number = -1)
{
  if (!$term) :
    $terms_obj = get_terms('event');
    $term = wp_list_pluck($terms_obj, 'slug');
  endif;

  $args = [
    'post_type' => $post_type,
    'tax_query' => [
      [
        'taxonomy' => $taxonomy,
        'field' => 'slug',
        'terms' => $term,
      ],
    ],
    'posts_per_page' => $number,
  ];
  $specific_posts = new WP_Query($args);
  return $specific_posts;
}

// TODO：アイキャッチ関係の関数はまだ色々できそう

/**
 * アイキャッチ画像がなければ、ダミー画像を取得する
 * ************************************************************************
 *
 * @param string $sizeに画像のサイズを指定
 * 初期値：thumbnail
 * @param string $pathにダミー画像のパスを指定
 * 初期値：'/img/post-bg.jpg'
 * @return array $imgにterm_idを指定して取得して格納
 *
 * <?php $eyecatch = get_eyecatch_with_default(第一引数, 第二引数); ?>
 * <header style="background-image: url('<?php echo $eyecatch[0]; ?>')"></header>
 *
 */
function get_eyecatch_with_default($size = 'thumbnail', $path = '/img/post-bg.jpg')
{
  if (has_post_thumbnail()) :
    $id  = get_post_thumbnail_id();
    $img = wp_get_attachment_image_src($id, $size);
  else :
    $img = array(get_template_directory_uri() . $path);
  endif;

  return $img;
}

/**
 * アイキャッチ画像がなければ、ダミー画像を取得する
 * ************************************************************************
 *
 * @param string $idに投稿IDを指定
 * @param string $sizeに画像のサイズを指定
 * 初期値：thumbnail
 * @return array $imageにget_the_post_thumbnail()を指定して取得して格納
 *
 * <?php get_eyecatch_default($post->ID, 'search'); ?>
 *
 */
function get_eyecatch_default($id, $size = 'thumbnail')
{
  $image = get_the_post_thumbnail($id,  $size);
  if ($image) :
    echo $image;
  else :
    echo '<img src="' . get_template_directory_uri() . '/assets/images/img-noImage.png">';
  endif;

  return $image;
}

/**
 * カスタムメニューを柔軟に使用する
 * ************************************************************************
 *
 * @param string $nameに該当するメニュー名を指定する
 * @return object $menu_itemsにterm_idを指定して取得して格納
 *
 * <?php
 * $items = get_nav_menu('place_global');
 * foreach ($items as $item) : ?>
 *   <li class="menu-item">
 *     <a class="nav-link" href="<?php echo esc_attr($item->url); ?>"><?php echo esc_html ($item->title); ?></a>
 *   </li>
 *<?php endforeach; ?>
 *
 */
function get_nav_menu($name)
{
  $menu_name = $name; // メニュー名
  $locations = get_nav_menu_locations(); // メニューを取得
  $menu = wp_get_nav_menu_object($locations[$menu_name]); // ナビゲーションの情報を取得
  $menu_items = wp_get_nav_menu_items($menu->term_id); // term_idを指定して取得

  return $menu_items;
}

/**
 * 各テンプレートごとのメイン画像を表示
 * ************************************************************************
 * @see https://ekuriyu.com/archives/wp-global-post/
 * TODO：グローバル変数をあまりつかいたくない
 */
function get_main_image()
{
  global $post;

  if (is_page()) :
    return get_the_post_thumbnail($post->ID, 'detail');
  elseif (is_category('news') || is_singular('post')) :
    return '<img src="' . GET_PATH() . '/bg-page-news.jpg">';
  elseif (is_search() || is_404()) :
    return '<img src="' . GET_PATH() . '/bg-page-search.jpg">';
  elseif (is_tax('event')) :
    $term_obj = get_queried_object();
    $image_id = get_field('event_image', $term_obj->taxonomy . '_' . $term_obj->term_id);
    return wp_get_attachment_image($image_id, 'detail');
  else :
    return '<img src="' . GET_PATH() . '/bg-page-dummy.png">';
  endif;
}
