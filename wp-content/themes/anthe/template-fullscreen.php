<?php

/* Template Name: Fullscreen Slider */

?>
<?php get_header(); if (have_posts()) the_post(); ?>

<?php get_template_part( 'tile', 'section-head' ) ?>

  <?php get_template_part( 'template', 'fullscreen.core' ) //!// ?>
  
  <?php
    global $a_head_classes_array; $a_head_classes_array = array('alt');
    get_template_part( 'tile', 'head' );
  ?>
  <!-- /head.alt (white colored)-->

<?php get_template_part( 'tile', 'section-foot' ) ?>

<?php get_footer() ?>