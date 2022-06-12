<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="keywords" content="共通キーワード" />
  <meta name="description" content="><?php bloginfo('description'); ?>" />
  <title><?php bloginfo('name'); ?></title>
  <link rel="shortcut icon" href="<?php echo GET_PATH(); ?>/common/favicon.ico" />

  <?php
  /* functions.phpで読み込み
  <link href="https://fonts.googleapis.com/earlyaccess/notosansjapanese.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Vollkorn:400i" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?php echo GET_PATH('css'); >/styles.css" />
  <script type="text/javascript" src="<?php echo GET_PATH('js'); >/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="<?php echo GET_PATH('js'); >/bundle.js"></script>
  */
  ?>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div class="container">
    <header id="header">
      <div class="header-inner">
        <div class="logo">
          <a class="logo-header" href="/">
            <img src="<?php echo GET_PATH(); ?>/common/logo-main.svg" class="main-logo" alt="PACIFIC MALL DEVELOPMENT" />
            <img src="<?php echo GET_PATH(); ?>/common/logo-fixed.svg" class="fixed-logo" alt="PACIFIC MALL DEVELOPMENT" />
          </a>
        </div>
        <button class="toggle-menu js-toggoleNav">
          <span class="toggle-line">メニュー</span>
        </button>
        <div class="header-nav">
          <nav class="global-nav">

            <?php /* wp_get_nav_menu_itemsの使用に伴い削除
            wp_nav_menu(
              [
                'theme_location' => 'place_global',
                'container' => false,
              ]
            );
            */ ?>

          <?php
          $menu_name = 'place_global'; // メニュー名
          $locations = get_nav_menu_locations(); // メニューを取得
          $menu = wp_get_nav_menu_object($locations[$menu_name]); // ナビゲーションの情報を取得
          $menu_items = wp_get_nav_menu_items($menu->term_id); // term_idを指定して取得
          ?>

            <ul class="menu">
            <?php foreach ($menu_items as $item) : ?>
              <li class="menu-item">
                <a class="nav-link active" href="<?php echo esc_attr($item->url); ?>"><?php echo esc_html($item->title); ?></a>
              </li>
              <?php endforeach; ?>
            </ul>

          </nav>
          <form class="search-form" role="search" method="get" action="">
            <div class="search-box">
              <input type="text" class="search-input" name="" placeholder="キーワードを入力してください" />
              <button type="submit" class="button-submit"></button>
            </div>
            <div class="search-buttons">
              <button type="button" class="close-icon js-searchIcon"></button>
              <button type="button" class="search-icon js-searchIcon"></button>
            </div>
          </form>
        </div>
      </div>
    </header>

    <?php if (is_front_page()) : ?>
      <section class="section-contents" id="keyvisual">
        <img src="<?php echo GET_PATH(); ?>/bg-section-keyvisual.jpg" alt="MAIN IMAGE" />
        <div class="wrapper">
          <h1 class="site-title">Connecting the future.</h1>
          <p class="site-caption">
            私たちパシフィックモール開発は<br />
            世界各地のショッピングモール開発を通じて<br />
            人と人、人と地域を結ぶお手伝いをしています。
          </p>
        </div>
      </section>
    <?php else : ?>

      <div class="wrap">
        <div id="primary" class="content-area">
          <main>
            <div class="page-contents">
              <div class="page-head">
                <img src="<?php echo GET_PATH(); ?>/bg-page-dummy.png" alt="" />
                <div class="wrapper">
                  <span class="page-title-en"></span>
                  <h2 class="page-title"><?php echo esc_html(get_main_title()); ?></h2>
                </div>
              </div>
              <div class="page-container">
              <?php endif; ?>
