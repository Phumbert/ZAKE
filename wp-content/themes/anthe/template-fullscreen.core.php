<?php

  if (!function_exists('a_get_slides_by_meta')) {
    function a_get_slides_by_meta() {
      
      $slides = array();
      
      $metas = array('_slide_1', '_slide_2', '_slide_3', '_slide_4', '_slide_5', '_slide_6');
      
      if ( is_page_template('template-fullscreen.php') )
        $metas = array_slice($metas, 0, 3); // slide 1, 2, 3
      
      foreach($metas as $meta) {
        
        if (! $img = Acorn::getm($meta.'_img') ) continue;
        $h1 = Acorn::getm($meta.'_h1');
        $h3 = Acorn::getm($meta.'_h3');
        
        $slides[] = array('img'=>$img,'h1'=>$h1,'h3'=>$h3);
      }

      return $slides;
    }
  }

?>

<ul class="full slides" data-timeout="<?php Acorn::egetm('Fullscreen Slider Timeout') ?>" data-speed="<?php Acorn::egetm('Fullscreen Slider Speed') ?>">
  
  <?php foreach (a_get_slides_by_meta() as $slide) : if ($slide['img']) : ?>
  
    <li>
      <img src="<?php echo $slide['img'] ?>" alt="">
      <h1><?php echo do_shortcode("[breakline]{$slide['h1']}[/breakline]") ?></h1>
      <h3><?php echo do_shortcode("[accent]{$slide['h3']}[/accent]") ?></h3>
    </li>
    <!-- /li (full screen slide)-->
  
  <?php endif; endforeach; ?>
  
</ul>
<!-- /ul.slides.full-->
