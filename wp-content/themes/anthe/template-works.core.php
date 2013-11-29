<?php
  
  $maxHeight =
    ($int = intval(Acorn::getm('_service-slider-max-height'))) ? "{$int}px" : 'auto';
  
  $query = AExtend::getWorksByPageMeta();
  $perma = ($query->found_posts>6) ? get_permalink() : '';
  wp_reset_query();
  
  $query = AExtend::getWorksByPageMeta('posts_per_page=6');

?>

<div class="post group wrap">

  <?php /*
  <?php the_content() ?>
  <br>
  */ ?>

  <div class="text-span titles immobile">
    <!-- slide titles:-->
    <?php 
    
    $count = 0;
    
    while ($query->have_posts()) : $query->the_post();    
      $title = get_the_title(); $active = $count++ ? '' : 'active';
      echo "<h3 class='span {$active}'><span>0{$count}. </span><span>{$title}</span></h3>\n";
    endwhile;
    
    ?>
    <!-- controls:--><a href="#next" class="next"></a>
  </div>
  <!-- /titles-->
  
  <div class="media-container immobile">
    <ul class="silent slides" style='max-height:<?php echo $maxHeight ?>'>
      <?php
      
      // post loop rewind
      rewind_posts();
      
      while ($query->have_posts()) : $query->the_post();
        $img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
        $img = $img ? $img[0] : '';
        echo "<li><img src='{$img}' alt=''></li>";
      endwhile;

      ?>
    </ul>
  </div>
  <!-- /media-container-->
  
  <ol class="items">
    
    <?php

    global $j_post_count; 
    
    $j_post_count = 1;
    $count = 0;
    
    // post loop rewind
    rewind_posts();
    
    while ($query->have_posts()) : $query->the_post();

      $third = (++$count%3 === 0);

      get_template_part( 'tile', 'singlepage.item' );
      $j_post_count++;

      if ($third) echo '<li class="clear"></li>';

    endwhile;
    
    wp_reset_query(); // needed after query_posts
    
    ?>
    
  </ol>
  <!-- /items-->

  <?php /*
  <hr>
  <?php the_content() ?>
  */ ?>
  
</div>


<?php if ($perma) : ?>
  
<div class="post wrap">
  <p style="text-align:center">
    <a href="<?php echo $perma ?>" class="button classic">
      <?php echo __('View all works&hellip;', A_DOMAIN) ?></a></p>
</div>

<?php endif; ?>