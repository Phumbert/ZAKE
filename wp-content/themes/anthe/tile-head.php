<?php

global $a_head_classes_array, $a_is_singlepage, $a_head_menu_override, $a_head_custom_links;

$classes = array_merge(array('head'), (array)$a_head_classes_array);
$altHead = in_array('alt', $classes); // (white colored)
$hideMobileMenu = $altHead && in_array('hide-first', $classes); // slides are first section

?>

<div class="<?php echo implode(' ', $classes) ?>">
  <div class="wrap">
    
    <div class="logo">
    <?php
    
      $logo = false;
      if ( $altHead ) $logo = Acorn::get( 'fullscreen-logo' );
      if ( !$logo ) $logo = Acorn::get( 'logo' );
    
    ?>
    <?php if ( $logo ) : ?>
      <a href="<?php echo home_url() ?>"><img src="<?php echo $logo ?>" title="<?php bloginfo( 'name' ) ?>" alt="<?php bloginfo( 'name' ) ?>"></a>
    <?php endif; ?>
    </div>
    <!-- /logo-->
    
    <ol class="menu">
      <?php
      
        if ($a_is_singlepage && $a_head_menu_override) { // singlepage custom menu here
          
          $att = ' class="active"';
          foreach ($a_head_menu_override as $item) {
            echo "<li{$att}><a href='#section-{$item->object_id}'>{$item->title}</a></li>\n";
            $att = '';
          }
          
          foreach ($a_head_custom_links as $item)
            echo "<li><a href='{$item->url}'>{$item->title}</a></li>\n";
          
        } else wp_nav_menu( array( 'theme_location' => 'main', 'container' => false, 'items_wrap' => '%3$s', 'fallback_cb' => false, 'depth' => 2 ))
      ?>
    </ol>
    <!-- /menu-->
    
    <?php get_template_part( 'tile', 'social' ) ?>
    <!-- /social-->
    
    <?php if (!$hideMobileMenu) : ?>
    <select id="menu-list-mobile">
      <option value=''>NAVIGATE&hellip;</option>
      
      <?php

      if ($a_is_singlepage && $a_head_menu_override) { // singlepage custom menu here
        
        foreach ($a_head_menu_override as $item)
          echo "<option value='#section-{$item->object_id}'>{$item->title}</option>\n";
        
        foreach ($a_head_custom_links as $item)
          echo "<option value='{$item->url}'>{$item->title}</option>\n";
        
      } else { // default multipage menu

        $themeLocation = 'main';
        
        if ( ($locations = get_nav_menu_locations()) && isset($locations[$themeLocation])) {
          $menu = wp_get_nav_menu_object( $locations[$themeLocation] );
          if ($menu && ($menuItems = wp_get_nav_menu_items( $menu->term_id )) ) {
            foreach ( (array) $menuItems as $key => $item ) {
              $pre = ($item->menu_item_parent) ? '- ' : '';
              echo "<option value='{$item->url}'>{$pre}{$item->title}</option>\n";
            }
          }
        }
      }

      ?>
    </select>
    <!-- /menu-list-mobile-->
    <?php endif; ?>
  </div>
</div>