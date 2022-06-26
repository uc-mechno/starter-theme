<div class="page-inner full-width">
  <div class="page-main" id="pg-newsDetail">
    <div class="main-container">
      <div class="main-wrapper">

        <div class="news">
          <time class="time"><?php the_time('Y.m.d'); ?></time>
          <p class='title'><?php the_title(); ?></p>
          <div class="news-body">
            <?php the_content(); ?>
          </div>
        </div>

        <?php get_template_part('template-parts/pagination', 'single'); ?>
