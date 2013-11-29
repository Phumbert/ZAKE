<?php

  if (!function_exists('a_get_excerpt_as_span')) {
    function a_get_excerpt_as_span($meta_id) {
      $lines = explode("\n", Acorn::getm($meta_id));
      foreach ($lines as &$line) $line = "<span>{$line}</span>";
      unset($line); // break the reference with the last element
      return implode($lines,'<br>');
    }
  }

  if (!function_exists('a_get_page_as_array')) {
    function a_get_page_as_array($meta_id) {
      $page = get_page(Acorn::getm($meta_id));
      return array($page->post_title, wpautop($page->post_content));
    }
  }

  $span1 = a_get_excerpt_as_span('_excerpt_1');
  $span2 = a_get_excerpt_as_span('_excerpt_2');
  $span3 = a_get_excerpt_as_span('_excerpt_3');
  
  list($title1, $content1) = a_get_page_as_array('_page_src_1');
  list($title2, $content2) = a_get_page_as_array('_page_src_2');
  list($title3, $content3) = a_get_page_as_array('_page_src_3');

?>

<div class="post group wrap">

  <?php /*
  <?php the_content() ?>
  <br>
  */ ?>

  <div class="text-span process immobile">
    <h4 class="span active"><?php echo $span1 ?></h4>
    <h4 class="span"><?php echo $span2 ?></h4>
    <h4 class="span"><?php echo $span3 ?></h4>
  </div>
  <!-- /text-span.process-->
  
  <ol class="items process">
    <li class="active">
      <h4 class="span"><span>01. </span><span><?php echo $title1 ?></span></h4>
      <!-- pad-big text will be shown only in mobile version-->
      <h4 class="pad-big span"><?php echo $span1 ?></h4>
      <?php echo $content1 ?>
    </li>
    <!-- /li.active (class 'active' should be for first item)-->
    <li>
      <h4 class="span"><span>02. </span><span><?php echo $title2 ?></span></h4>
      <h4 class="pad-big span"><?php echo $span2 ?></h4>
      <?php echo $content2 ?>
    </li>
    <!-- /li (item)-->
    <li>
      <h4 class="span"><span>03. </span><span><?php echo $title3 ?></span></h4>
      <h4 class="pad-big span"><?php echo $span3 ?></h4>
      <?php echo $content3 ?>
    </li>
    <!-- /li (item)-->
  </ol>
  <!-- /items.process-->

  <?php /*
  <hr>
  <?php the_content() ?>
  */ ?>
  
</div>