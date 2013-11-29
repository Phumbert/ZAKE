<?php get_header(); if (have_posts()) the_post(); ?>

<?php
  global $a_head_classes_array; $a_head_classes_array = array('top fix');
  get_template_part( 'tile', 'head' );
?>

<?php get_template_part( 'tile', 'section-head' ) ?>

  <div class="post group wrap">
  
  <?php the_content(); wp_link_pages(); ?>
  
  </div>

  <?php
    global $a_foot_classes_array; $a_foot_classes_array = array('post wrap');
    get_template_part( 'tile', 'foot' );
  ?>

<?php get_template_part( 'tile', 'section-foot' ) ?>

<?php get_footer() ?>