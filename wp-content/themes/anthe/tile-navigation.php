<?php
  function a_next_posts_link_class($content) { return 'class="button classic"'; }
  add_filter('next_posts_link_attributes', 'a_next_posts_link_class' );
?>


<?php $l = get_next_posts_link(__('&larr; Older Entries', A_DOMAIN )); if ($l) : ?>

<div class="post wrap">
  <p style="text-align:center"><?php echo $l ?></p>
</div>

<?php endif; ?>