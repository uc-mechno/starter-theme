<div class="more-news">

  <?php
  $next_post = get_next_post();
  $prev_post = get_previous_post();
  if ($next_post) :
  ?>
    <div class="next">
      <a class="another-link" href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">NEXT</a>
    </div>
  <?php
  endif;
  if ($prev_post) :
  ?>
    <div class="prev">
      <a class="another-link" href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">PREV</a>
    </div>
  <?php endif; ?>

</div>
