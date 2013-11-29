<?php

/* Template Name: Journal */

?>
<?php get_header() ?>

<?php 
  global $a_head_classes_array; $a_head_classes_array = array('top fix');
  get_template_part( 'tile', 'head' );
?>

<?php get_template_part( 'tile', 'section-head' ) ?>
  
  <div class="post wrap">
    <ol class="items posts half">

    <?php
    
    # journal post query
    
    $more = false;

    $paged = 1;    
    if (get_query_var('page')) $paged = get_query_var('page');
    if (get_query_var('paged')) $paged = get_query_var('paged');
    
    global $wp_query;

    $args = array_merge( $wp_query->query_vars, array(
      'name' => '',
      'p' => 0,
      'pagename' => '',
      'page_id' => 0
    ));
    
    query_posts($args);
    
    # counter vars
        
    global $j_post_count;
    
    $j_post_count = 1;
    if ($wp_query) $j_post_count += ($paged-1) * $wp_query->query_vars['posts_per_page'];
    
    $count = 0;
    
    # posts loop
    
    while (have_posts()) : the_post();
    
      $even = $count++ %2;

      get_template_part( 'tile', 'item' );
      $j_post_count++;
      
      if ($even) echo '<li class="clear"></li>';
      
    endwhile;
    
    ?>
        
    </ol>
    <!-- /items-->
  </div>
  <!-- /post-->

  <?php
    get_template_part( 'tile', 'navigation' );
    wp_reset_query(); // needed after query_posts
  ?>

  <?php
    global $a_foot_classes_array; $a_foot_classes_array = array('post wrap');
    get_template_part( 'tile', 'foot' );
  ?>

<?php get_template_part( 'tile', 'section-foot' ) ?>

<?php get_footer() ?>