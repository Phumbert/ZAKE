<?php

global $aSectionHeadStyle, $aSectionTemplate;
$aSectionHeadStyle = Acorn::getm('_page-style');

if ( is_page_template('template-contact.php') ) 
  $aSectionHeadStyle = 'contact';
if ( $aSectionTemplate && $aSectionTemplate == 'template-contact.php' )
  $aSectionHeadStyle = 'contact';
  
if ( is_page_template('template-fullscreen.php') || 
     is_page_template('template-fullscreen-6.php') ) $aSectionHeadStyle = 'removed';
  
if ( $aSectionTemplate && 
    ( $aSectionTemplate == 'template-fullscreen.php' || 
      $aSectionTemplate == 'template-fullscreen-6.php' ) ) $aSectionHeadStyle = 'removed';

$bgImg = Acorn::getm('_bg-image');
$style = ( !$aSectionHeadStyle && $bgImg ) ? "background-image:url('{$bgImg}')" : '';

$title = get_the_title();
if ( is_category() ) { $o = get_queried_object(); if ($s = $o->name) $title = $s; }

?>

<!-- BEGIN section -->
<div id="section-<?php the_ID() ?>" class="section <?php if ($aSectionHeadStyle == 'removed') echo 'full' ?>" style="<?php echo $style ?>">
  
  <?php if ($aSectionHeadStyle == 'contact') : ?>
  
  <div class="title map-container <?php if (!Acorn::egetm('_map-style')) echo 'bright' ?>">
    <!-- request necessary map script-->
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <div id="map" class="bg" data-marker="<?php echo A_THEME_URL ?>/img/marker.png" data-lat="<?php Acorn::egetm('_map-lat') ?>" data-long="<?php Acorn::egetm('_map-long') ?>" data-hue="<?php Acorn::eget('text-color') ?>" data-zoom="<?php Acorn::egetm('_map-zoom') ?>" data-style="<?php Acorn::egetm('_map-style') ?>"></div>
    
    <div class="wrap">
      <h2><?php the_title() ?></h2>
    </div>
  </div>
  <!-- /title-->

  <?php elseif ($aSectionHeadStyle == 'title') : ?>
  
  <div class="title bg-container">
    <?php if ($bgImg) : ?>
      <img src="<?php echo $bgImg ?>" class="bg">
    <?php endif; ?>
    <div class="wrap">
      <h2><?php echo $title ?></h2>
    </div>
  </div>
  <!-- /title-->
  
  <?php elseif ($aSectionHeadStyle == 'full') : ?>
  
  <div class="bg-container">
    <?php if ($bgImg) : ?>
      <img src="<?php echo $bgImg ?>" class="bg">
    <?php endif; ?>
    <div class="title">
      <div class="wrap">
        <h2><?php echo $title ?></h2>
      </div>
    </div>
    <!-- /title-->
  
  <?php elseif ($aSectionHeadStyle == 'removed') : ?>
  
  <?php else : ?>
  
  <div class="title">
    <div class="wrap">
      <h2><?php echo $title ?></h2>
    </div>
  </div>
  <!-- /title-->
  
  <?php endif; ?>

