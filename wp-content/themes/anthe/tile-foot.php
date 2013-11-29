<?php

global $a_foot_classes_array;
$classes = array_merge( array('foot group'), (array)$a_foot_classes_array );

?>

<div class="clear"></div>
<div class="<?php echo implode(' ', $classes) ?>">
  <hr>
  <p class="l"><?php Acorn::eget( 'copy' ) ?></p>
  <p class="r">
    <?php if ( !dynamic_sidebar() ) get_post_class(); ?>
    <?php
    
    $themeLocation = 'foot';
    
    if ( ($locations = get_nav_menu_locations()) && isset($locations[$themeLocation])) {
      $menu = wp_get_nav_menu_object( $locations[$themeLocation] );
      if ($menu && ($menuItems = wp_get_nav_menu_items( $menu->term_id )) ) {
        
        $items = array();
        foreach ( (array) $menuItems as $key => $item )
          $items[] = "<a href='{$item->url}'>{$item->title}</a>\n";
        
        if ($items) echo implode(' | ', $items);
      }
    }
    
    ?>
  
  </p>
</div>
<!-- /post.foot-->