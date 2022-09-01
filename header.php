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
          */  ?>

            <ul class="menu">
              <?php $items = get_nav_menu('place_global');
              foreach ($items as $item) : ?>
                <li class="menu-item">
                  <a class="nav-link" href="<?php echo esc_attr($item->url); ?>"><?php echo esc_html($item->title); ?></a>
                </li>
              <?php endforeach; ?>
            </ul>

          </nav>

          <form class="search-form" role="search" method="get" action="<?php echo esc_url(home_url()); ?>">
            <div class="search-box">
              <input type="text" class="search-input" name="s" placeholder="キーワードを入力してください" />
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
        <?php echo get_main_image(); ?>
        <div class="wrapper">
          <h1 class="site-title">Connecting the future.</h1>
          <p class="site-caption"><?php echo get_the_excerpt(); ?></p>
        </div>
      </section>
    <?php else : ?>

      <div class="wrap">
        <div id="primary" class="content-area">
          <main>
            <div class="page-contents">
              <div class="page-head">
                <?php echo get_main_image(); ?>
                <div class="wrapper">
                  <span class="page-title-en"><?php echo esc_html(get_main_en_title()); ?></span>
                  <h2 class="page-title"><?php echo esc_html(get_main_title()); ?></h2>
                </div>
              </div>
              <div class="page-container">
                <?php
                if (function_exists('bread_crumb')) {
                  bread_crumb();
                }
                if (function_exists('bcn_display')) {
                  bcn_display();
                }
                if (function_exists('create_breadcrumb')) {
                  create_breadcrumb();
                }
                ?>
              <?php endif; ?>
