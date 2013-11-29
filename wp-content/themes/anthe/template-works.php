<?php

/* Template Name: Works */

?>
<?php get_header(); if (have_posts()) the_post(); ?>

<?php
  global $a_head_classes_array; $a_head_classes_array = array('top fix');
  get_template_part( 'tile', 'head' );
?>

<?php get_template_part( 'tile', 'section-head' ) ?>

  <div class="post group wrap">

    <?php the_content(); if ($post->post_content) : ?>
      <br>
    <?php endif; ?>
  
    <ol class="items posts">
    
    <?php

    global $j_post_count;

    $j_post_count = 1;
    $count = 0;

    // post loop
    $query = AExtend::getWorksByPageMeta(); // 'posts_per_page=6'
    
    while ($query->have_posts()) : $query->the_post();

      $third = (++$count%3 === 0);

      get_template_part( 'tile', 'item' );
      $j_post_count++;

      if ($third) echo '<li class="clear"></li>';

    endwhile;

    wp_reset_query(); // needed after query_posts
    
    ?>
    
    </ol>

  </div>

  <?php
    global $a_foot_classes_array; $a_foot_classes_array = array('post wrap');
    get_template_part( 'tile', 'foot' );
  ?>

<?php get_template_part( 'tile', 'section-foot' ) ?>

<?php get_footer() ?>