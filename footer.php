<?php if (!is_front_page()) : ?>
  </div> <!-- #page-container -->
  </div><!-- #page-contents -->
  </main>
  </div><!-- #primary -->
  </div>
<?php endif; ?>

<footer class="footer" id="footer">
  <div class="footerContents">
    <div class="footerContents-contact">
      <div class="enterprise-logo">
        <img src="<?php echo GET_PATH(); ?>/svg/logo-footer.svg" alt="PACIFIC MALL DEVELOPMENT" />
      </div>
      <div class="enterprise-detail">
        <p class="name">パシフィックモール開発株式会社</p>
        <p class="address">
          東京都千代田区大手町0-1-2<br />
          パシフィックモールビルディング18F
        </p>
      </div>
    </div>
    <div class="footerContents-sitemap">

      <nav class="footer-nav">

        <?php /* wp_get_nav_menu_itemsの使用に伴い削除
        wp_nav_menu(
          [
            'theme_location' => 'place_footer',
            'container' => false,
          ]
        );
      */ ?>

        <ul class="menu">
          <?php
          $items = get_nav_menu('place_footer');
          foreach ($items as $item) : ?>
            <li class="menu-item">
              <a class="nav-link" href="<?php echo esc_attr($item->url); ?>"><?php echo esc_html($item->title); ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </nav>
    </div>
  </div>
  <p class="copyright">
    <small class="copyright-text">&#169; 2019 PACIFIC MALL DEVELOPMENT CO.,LTD.</small>
  </p>
</footer>
</div><!-- /.container -->

<?php wp_footer(); ?>

</body>

</html>
