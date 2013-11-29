<?php get_header(); if (have_posts()) the_post(); ?>

<?php
  global $a_head_classes_array; $a_head_classes_array = array('top fix');
  get_template_part( 'tile', 'head' );
?>

<?php get_template_part( 'tile', 'section-head' ) ?>

  <div class="post group wrap">
  
    <div class="one-third">
      
      <?php if ($e = trim(Acorn::getm('_the_excerpt'))) : ?>
        <?php echo do_shortcode("[heading]{$e}[/heading]") ?>
      <?php endif; ?>
      
      <?php the_content() ?>
      
      <?php if ( get_adjacent_post() ) : ?>
        <br>
        <h4 class="pad">
          <?php 
            if ($post && $post->post_type == 'item') 
              _e('Next Work', A_DOMAIN);
            else
              _e('Next Post', A_DOMAIN);
          ?>
        </h4>
        
        <?php previous_post_link('%link', '%title &rarr;') ?>
      <?php endif; ?>
      
    </div>
    <!-- /one-third-->
    
    <div class="two-third last">
      <?php a_the_media_content() ?>
    </div>
    <!-- /two-third-->
  
  </div>
  
  <?php comments_template() ?>

  <?php
    global $a_foot_classes_array; $a_foot_classes_array = array('post wrap');
    get_template_part( 'tile', 'foot' );
  ?>

<?php get_template_part( 'tile', 'section-foot' ) ?>

<?php get_footer() ?>