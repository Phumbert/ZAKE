<?php $perma = get_permalink() ?>

<div class="post group wrap">
  
  <?php /*
  <?php the_content() ?>
  <br>
  */ ?>
  
  <ol class="items posts half">

  <?php
  
  # journal post query
  global $more; $more = false;

  query_posts(array(
    'orderby'=>'date',
    'posts_per_page'=>2,
    'post_status'=>'publish',
    's'=>get_query_var('s')
  ));
  
  # counter vars
      
  global $j_post_count; $j_post_count = 1;

  $count = 0;
  
  # posts loop
  
  while (have_posts()) : the_post();
  
    $even = $count++ %2;
    if ($count>2) break; // for pinned

    get_template_part( 'tile', 'item' );
    $j_post_count++;
    
    if ($even) echo '<li class="clear"></li>';
    
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
<!-- /post-->

<?php if ($perma) : ?>

<div class="post wrap">
  <p style="text-align:center">
    <a href="<?php echo $perma ?>" class="button classic">
      <?php echo __('View more posts&hellip;', A_DOMAIN) ?></a></p>
</div>

<?php endif; ?>