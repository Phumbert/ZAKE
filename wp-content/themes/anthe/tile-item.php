<?php

global $j_post_count;

$excerpt = is_page_template('template-works.php') || is_tax('item-type');
$btn = __('Read more &rarr;', A_DOMAIN);

?>

<li class="<?php if (is_sticky()) echo 'sticky' ?>"> 

  <h4 class="span bottom-pad">
    <span><?php printf('%1$02d', $j_post_count) ?>. </span>
    <span><?php the_title() ?></span></h4>

  <a href="<?php the_permalink() ?>" class="permalink"><?php the_post_thumbnail() ?></a>

  <?php
    if ($excerpt) the_excerpt();
    else the_content( $btn );
  ?>
  
  <?php if ($excerpt) : ?>
  <p><a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="classic button"><?php echo $btn ?></a></p>
  <?php endif; ?>

</li>