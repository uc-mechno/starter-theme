<?php
// ContactForm7のpost以外でアクセスしたらTOPへリダイレクト
if (is_page('thanks')) {
  session_start();
  if (!isset($_SESSION['thanks_judge'])) {
    wp_safe_redirect(home_url());
    exit;
  } else {
    unset($_SESSION['thanks_judge']);
  }
}
?>

<?php get_header(); ?>

<div class="page-main">
  <div class="lead-inner">

    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        the_content();
      endwhile;
    endif;
    ?>

  </div>
</div>

<?php get_footer(); ?>
