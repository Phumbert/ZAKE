<?php

global $j_post_count;

$liClass = ($j_post_count == 1) ? 'active' : '';
$btn = __('Read more &rarr;', A_DOMAIN);

?>

<li class="<?php echo $liClass ?>"> 

  <h4 class="span bottom-pad">
    <span><?php printf('%1$02d', $j_post_count) ?>. </span>
    <span><?php the_title() ?></span></h4>

  <?php the_post_thumbnail('post-thumbnail', 'class=mobile') ?>

  <?php the_excerpt() ?>

  <p><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php echo $btn ?></a></p>

</li>