<?php get_header(); ?>
<div class="page-inner">
  <div class="page-main" id="pg-contribution">
    <div class="contribution">
      <?php
      $terms = get_terms('event');
      foreach ($terms as $term) :
        // TODO：get_template_partの第三引数に変数を渡す
        include locate_template('template-parts/content-contribution.php');
      endforeach;
      ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
