<?php

/* Template Name: Single Page */

global $a_is_singlepage; $a_is_singlepage = true; // that is for sure

?>

<?php get_header() ?>

<?php

  $items = array();
  if ($id = Acorn::getm('_construction_menu_id'))
    $items = wp_get_nav_menu_items($id);

  $sections = array();
  foreach ($items as $item)
    if ($item->object == 'page') $sections[] = $item; // only pages allowed
  
  global $a_head_menu_override; $a_head_menu_override = $sections; // override menu in tile-head
  
  global $a_head_custom_links; $a_head_custom_links = array();

  foreach ($items as $item)
    if ($item->object == 'custom') $a_head_custom_links[] = $item; // fill custom links array
  
  $total = count($sections);
  foreach ($sections as $i => $section) {

    // Globals
    
    global $post, $aSectionTemplate;
    $post = get_post( $section->object_id );
    $tmpl = $aSectionTemplate = get_page_template_slug( $section->object_id );
    
    // Helpers
    
    $isFirst = !$i; // first section
    $isLast = ($total - 1) == $i; // latest section
    
    // For Multi-menus etc.
    
    $slidesFirst = $isFirst &&
     ( $tmpl == 'template-fullscreen.php' || $tmpl == 'template-fullscreen-6.php' );
    
    // Post Setup
    
    setup_postdata($post); // needed for the_content
    
    // Post Render
    
    if ($isFirst && !$slidesFirst) { // fixed menu if first section not slides
      global $a_head_classes_array; $a_head_classes_array = array('top hardfix');
      get_template_part( 'tile', 'head' );
    }
    
    get_template_part( 'tile', 'section-head' );
    
    switch ($tmpl) {
      case 'template-fullscreen.php':
      case 'template-fullscreen-6.php':
        get_template_part( 'template', 'fullscreen.core' );
        if ($slidesFirst) { // add menu only if slides are first section
          global $a_head_classes_array; $a_head_classes_array = array('alt', 'hide-first');
          get_template_part( 'tile', 'head' );
        }
        break;
      case 'template-journal.php':
        get_template_part( 'template', 'journal.core' );
        break;
      case 'template-contact.php':
        get_template_part( 'template', 'contact.core' );
        break;
      case 'template-process.php':
        get_template_part( 'template', 'process.core' );
        break;
      case 'template-process-6.php':
        get_template_part( 'template', 'process-6.core' );
        break;
      case 'template-services.php':
        get_template_part( 'template', 'services.core' );
        break;      
      case 'template-services-6.php':
        get_template_part( 'template', 'services-6.core' );
        break;
      case 'template-works.php':
        get_template_part( 'template', 'works.core' );
        break;
      default:
        get_template_part( 'template', 'basic.core' );
        break;
    }

    if ($isLast) {
      global $a_foot_classes_array; $a_foot_classes_array = array('post wrap');
      get_template_part( 'tile', 'foot' );
    }
    
    get_template_part( 'tile', 'section-foot' );
    
    if ($slidesFirst && $isFirst) { // top 100% menu if first was slides
      global $a_head_classes_array; $a_head_classes_array = array('top', 'hide-first');
      get_template_part( 'tile', 'head' );
    }
  }

?>

<?php get_footer() ?>