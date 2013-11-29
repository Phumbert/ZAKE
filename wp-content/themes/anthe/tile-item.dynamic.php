<?php

global $j_post_count, $a_is_singlepage;

$excerpt = false;
if ( is_page_template('template-works.php') ) $excerpt = true;
if ( $a_is_singlepage ) $excerpt = true;

$btn = __('Read more &rarr;', A_DOMAIN);
$btnClass = $a_is_singlepage ? '' : 'classic button';

$liClass = '';
if ( is_sticky() ) $liClass = 'sticky';
if ( $a_is_singlepage &&  $j_post_count==1 ) $liClass = 'active';

?>

<li class="<?php echo $liClass ?>"> 

  <h4 class="span bottom-pad">
    <span><?php printf('%1$02d', $j_post_count) ?>. </span>
    <span><?php the_title() ?></span></h4>

  <?php if (!$a_is_singlepage) : ?>
    <a href="<?php the_permalink() ?>" class="permalink"> <?php the_post_thumbnail() ?> </a>
  <?php else : ?>
    <?php the_post_thumbnail('post-thumbnail', 'class=mobile') ?>
  <?php endif; ?>

  <?php
    if ($excerpt) the_excerpt();
    else the_content( $btn );
  ?>
  
  <?php if ($excerpt) : ?>
  <p><a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="<?php echo $btnClass ?>"><?php echo $btn ?></a></p>
  <?php endif; ?>

</li>