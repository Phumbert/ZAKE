<?php

  if (!function_exists('a_get_page_as_array_service')) {
    function a_get_page_as_array_service($meta_id) {
      $page = get_page(Acorn::getm($meta_id));
      $img = wp_get_attachment_image_src( get_post_thumbnail_id($page->ID), 'large' );
      return array($page->post_title, wpautop($page->post_content), $img ? $img[0] : '');
    }
  }

  list($title1, $content1, $slide1) = a_get_page_as_array_service('_service_src_1');
  list($title2, $content2, $slide2) = a_get_page_as_array_service('_service_src_2');
  list($title3, $content3, $slide3) = a_get_page_as_array_service('_service_src_3');
  list($title4, $content4, $slide4) = a_get_page_as_array_service('_service_src_4');
  list($title5, $content5, $slide5) = a_get_page_as_array_service('_service_src_5');
  list($title6, $content6, $slide6) = a_get_page_as_array_service('_service_src_6');
  
  $maxHeight =
    ($int = intval(Acorn::getm('_service-slider-max-height'))) ? "{$int}px" : 'auto';

?>

<div class="post group wrap">

  <?php /*
  <?php the_content() ?>
  <br>
  */ ?>

  <div class="text-span titles immobile">
    <!-- slide titles:-->
    <h3 class="span active"><span>01. </span><span><?php echo $title1 ?></span></h4>
    <h3 class="span"><span>02. </span><span><?php echo $title2 ?></span></h3>
    <h3 class="span"><span>03. </span><span><?php echo $title3 ?></span></h3>
    <h3 class="span"><span>04. </span><span><?php echo $title4 ?></span></h3>
    <h3 class="span"><span>05. </span><span><?php echo $title5 ?></span></h3>
    <h3 class="span"><span>06. </span><span><?php echo $title6 ?></span></h3>
    
    <!-- controls:--><a href="#next" class="next"></a>
  </div>
  <!-- /titles-->
  
  <div class="media-container immobile">
    <ul class="silent slides" style='max-height:<?php echo $maxHeight ?>'>
      <li><img src="<?php echo $slide1 ?>" alt=""></li>
      <li><img src="<?php echo $slide2 ?>" alt=""></li>
      <li><img src="<?php echo $slide3 ?>" alt=""></li>
      <li><img src="<?php echo $slide4 ?>" alt=""></li>
      <li><img src="<?php echo $slide5 ?>" alt=""></li>
      <li><img src="<?php echo $slide6 ?>" alt=""></li>
    </ul>
  </div>
  <!-- /media-container-->
  
  <ol class="items">
    <li class="active">
      <h4 class="span bottom-pad"><span>01. </span><span><?php echo $title1 ?></span></h4>
      <!-- this image will be visible on mobile screens only (and slider will be disabled)-->
      <img src="<?php echo $slide1 ?>" alt="" class="mobile">
      <?php echo $content1 ?>
    </li>
    <li>
      <h4 class="span bottom-pad"><span>02. </span><span><?php echo $title2 ?></span></h4>
      <img src="<?php echo $slide2 ?>" alt="" class="mobile">
      <?php echo $content2 ?>
    </li>
    <li>
      <h4 class="span bottom-pad"><span>03. </span><span><?php echo $title3 ?></span></h4>
      <img src="<?php echo $slide3 ?>" alt="" class="mobile">
      <?php echo $content3 ?>
    </li>
    <li class="clear"></li>
    <li>
      <h4 class="span bottom-pad"><span>04. </span><span><?php echo $title4 ?></span></h4>
      <img src="<?php echo $slide4 ?>" alt="" class="mobile">
      <?php echo $content4 ?>
    </li>
    <li>
      <h4 class="span bottom-pad"><span>05. </span><span><?php echo $title5 ?></span></h4>
      <img src="<?php echo $slide5 ?>" alt="" class="mobile">
      <?php echo $content5 ?>
    </li>
    <li>
      <h4 class="span bottom-pad"><span>06. </span><span><?php echo $title6 ?></span></h4>
      <img src="<?php echo $slide6 ?>" alt="" class="mobile">
      <?php echo $content6 ?>
    </li>
  </ol>
  <!-- /items-->

  <?php /*
  <hr>
  <?php the_content() ?>
  */ ?>
  
</div>