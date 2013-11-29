<?php

/*--------------------------------------------------------------------------
  Setup Page Metaboxes
/*------------------------------------------------------------------------*/

class APageMetabox extends AMetabox {

  static function getMenuList () {

    $menus = array('');
    foreach (wp_get_nav_menus() as $menu)
      $menus[$menu->name] = $menu->name;

    return $menus;
  }
  
  static function getTypeList () {

    $types = array('' => 'Disabled');
    foreach (get_terms('item-type') as $type)
      $types[$type->term_id] = $type->name;

    return $types;
  }
  
  static function getPagesList () {
    
    $pages = array();
    foreach (get_pages() as $page)
      $pages[$page->ID] = $page->post_title;
    
    return $pages;
  }

  static function init () {

    # Page Style

    parent::$boxes[] = array(

      'page'    => 'page',
      'context' => 'normal',
      'priority'=> 'default',
      'class'   => 'hide-for-template-contact-php hide-for-template-singlepage-php hide-for-template-fullscreen-php',
      
      'title'   => __('Page Style', A_DOMAIN),
      'desc'    => '',

      'fields'  => array(
        
        array(
          'name'=> __('Image Fill Style', A_DOMAIN),
          'desc'=> '',
          'id'  => '_page-style',
          'type'=> 'select',
          'std' => '',
          'opts'=> array(
            __('Simple Background Image (Original size)', A_DOMAIN),
            'title'=>__('Dark Background (fit in Titles)', A_DOMAIN),
            'full'=>__('Dark Background (fit in Fullpage)', A_DOMAIN)))

        ,array(
          'name'=> __('Image Source', A_DOMAIN),
          'desc'=> '',
          'id'  => '_bg-image',
          'std' => '', // A_THEME_URL . '/img/default-bg.jpg',
          'type'=> 'text' )

        ,array(
          'std' => __('Upload', A_DOMAIN), 'type' => 'button' )

      )
    );
    
    # Single Page Setup
    
    parent::$boxes[] = array(

      'page'    => 'page',
      'context' => 'normal',
      'priority'=> 'default',
      'class'   => 'hidden show-for-template-singlepage-php',
      
      'title'   => __('Single Page Setup', A_DOMAIN),
      'desc'    => __('Single-page creation process is an automatic gluing of trivial pages that have been already created. So first <a href="nav-menus.php">create a menu</a>, fill it with pages, then select here the menu you created. Anthe will do the rest.', A_DOMAIN),

      'fields'  => array(
        
        array(
          'name'=> __('Construction Menu', A_DOMAIN),
          'desc'=> '',
          'id'  => '_construction_menu_id',
          'type'=> 'select',
          'std' => '',
          'opts'=> self::getMenuList())

      )
    );

    # Contact Page Settings

    parent::$boxes[] = array(

      'page'    => 'page',
      'context' => 'normal',
      'priority'=> 'core',
      'class'   => 'hidden show-for-template-contact-php',

      'title'   => __('Contact Page Settings', A_DOMAIN),
      'desc'    => '',

      'fields'  => array(
        
        # starting field id with '_' hiding it from custom fields box

        array(
          'name'=> __('Map Latitude', A_DOMAIN),
          'desc'=> '',
          'id'  => '_map-lat',
          'std' => '51.508',
          'type'=> 'text' ),

        array(
          'name'=> __('Map Longitude', A_DOMAIN),
          'desc'=> __("Don't drop leading '+' or '-' if available", A_DOMAIN),
          'id'  => '_map-long',
          'std' => '-0.128',
          'type'=> 'text' ),

        array(
          'name'=> __('Map Zoom', A_DOMAIN),
          'desc'=> '',
          'id'  => '_map-zoom',
          'std' => 17,
          'type'=> 'select',
          'opts'=> array(
            19 => __('City Bird', A_DOMAIN),
            17 => __('Hot Air Balloon', A_DOMAIN),
            15 => __('Corporate Helicopter', A_DOMAIN),
            13 => __('Aeroplane', A_DOMAIN),
            9 => __('Sputnik', A_DOMAIN))),

        array(
          'name'=> __('Map Style', A_DOMAIN),
          'desc'=> '',
          'id'  => '_map-style',
          'std' => '',
          'type'=> 'select',
          'opts'=> array(
            __('Google Default', A_DOMAIN),
            A_THEME_NAME.__(' Special', A_DOMAIN)))
        
      )
    );
    
    # Services Page Setup

    parent::$boxes[] = array(

      'page'    => 'page',
      'context' => 'normal',
      'priority'=> 'high',
      'class'   => 'hidden show-for-template-services-php show-for-template-services-6-php',

      'title'   => __('Services Page Setup', A_DOMAIN),
      'desc'    => __('Choose the pages, from what content will be fetched (Page titles, content &amp; Featured Images as slides).', A_DOMAIN),

      'fields'  => array(
        
        array(
          'name'=> __('First Service Content', A_DOMAIN),
          'desc'=> __('Choose a source page', A_DOMAIN),
          'id'  => '_service_src_1',
          'std' => '',
          'type'=> 'select',
          'opts'=> self::getPagesList()),
          
        array(
          'name'=> __('Second Service Content', A_DOMAIN),
          'desc'=> __('Choose a source page', A_DOMAIN),
          'id'  => '_service_src_2',
          'std' => '',
          'type'=> 'select',
          'opts'=> self::getPagesList()),
          
        array(
          'name'=> __('Third Service Content', A_DOMAIN),
          'desc'=> __('Choose a source page', A_DOMAIN),
          'id'  => '_service_src_3',
          'std' => '',
          'type'=> 'select',
          'opts'=> self::getPagesList()),
          
        array(
          'name'=> __('Slider Max Height', A_DOMAIN),
          'desc'=> '',
          'id'  => '_service-slider-max-height',
          'std' => '360px',
          'type'=> 'text' )

      )
    );
    
    # Services Page Setup #2

    parent::$boxes[] = array(

      'page'    => 'page',
      'context' => 'normal',
      'priority'=> 'high',
      'class'   => 'hidden show-for-template-services-6-php',

      'title'   => __('Services Page Setup #2', A_DOMAIN),
      'desc'    => '',

      'fields'  => array(
        
        array(
          'name'=> __('Fourth Service Content', A_DOMAIN),
          'desc'=> __('Choose a source page', A_DOMAIN),
          'id'  => '_service_src_4',
          'std' => '',
          'type'=> 'select',
          'opts'=> self::getPagesList()),
          
        array(
          'name'=> __('Fifth Service Content', A_DOMAIN),
          'desc'=> __('Choose a source page', A_DOMAIN),
          'id'  => '_service_src_5',
          'std' => '',
          'type'=> 'select',
          'opts'=> self::getPagesList()),
          
        array(
          'name'=> __('Sixth Service Content', A_DOMAIN),
          'desc'=> __('Choose a source page', A_DOMAIN),
          'id'  => '_service_src_6',
          'std' => '',
          'type'=> 'select',
          'opts'=> self::getPagesList())

      )
    );
    
    # Fullscreen Slide Setup
    
    $pre = '&nbsp;&#8627;&nbsp;';

    parent::$boxes[] = array(

      'page'    => 'page',
      'context' => 'normal',
      'priority'=> 'default',
      'class'   => 'hidden show-for-template-fullscreen-php show-for-template-fullscreen-6-php',

      'title'   => __('Fullscreen Slide Setup', A_DOMAIN),
      'desc'    => '',

      'fields'  => array(
        
        array(
          'name'=> __('Slide Image I', A_DOMAIN),
          'desc'=> '',
          'id'  => '_slide_1_img',
          'std' => A_THEME_URL . '/img/slide.jpg',
          'type'=> 'text')

        ,array(
          'std' => __('Upload', A_DOMAIN), 'type' => 'button' )
        
        ,array(
          'name'=> $pre.__('Main Copy', A_DOMAIN),
          'desc'=> '',
          'id'  => '_slide_1_h1',
          'std' => 'First Line | Second Line | Third Line',
          'type'=> 'text')
        
        ,array(
          'name'=> $pre.__('Foot Copy', A_DOMAIN),
          'desc'=> '',
          'id'  => '_slide_1_h3',
          'std' => 'Normal Text | Strong Text',
          'type'=> 'text')
        
        
        ,array(
          'name'=> __('Slide Image II', A_DOMAIN),
          'desc'=> '',
          'id'  => '_slide_2_img',
          'std' => '',
          'type'=> 'text')

        ,array(
          'std' => __('Upload', A_DOMAIN), 'type' => 'button' )
        
        ,array(
          'name'=> $pre.__('Main Copy', A_DOMAIN),
          'desc'=> '',
          'id'  => '_slide_2_h1',
          'std' => '',
          'type'=> 'text')
        
        ,array(
          'name'=> $pre.__('Foot Copy', A_DOMAIN),
          'desc'=> '',
          'id'  => '_slide_2_h3',
          'std' => '',
          'type'=> 'text')
        
        
        ,array(
          'name'=> __('Slide Image III', A_DOMAIN),
          'desc'=> '',
          'id'  => '_slide_3_img',
          'std' => '',
          'type'=> 'text')

        ,array(
          'std' => __('Upload', A_DOMAIN), 'type' => 'button' )
        
        ,array(
          'name'=> $pre.__('Main Copy', A_DOMAIN),
          'desc'=> '',
          'id'  => '_slide_3_h1',
          'std' => '',
          'type'=> 'text')
        
        ,array(
          'name'=> $pre.__('Foot Copy', A_DOMAIN),
          'desc'=> '',
          'id'  => '_slide_3_h3',
          'std' => '',
          'type'=> 'text')
        
        
        ,array( 'id' => 'Fullscreen Slider Timeout', 'std' => 13, 'type'=> 'custom')
        
        ,array( 'id' => 'Fullscreen Slider Speed', 'std' => 1.3, 'type'=> 'custom')

      )
    );
    
    # Fullscreen Slide Setup #2

    parent::$boxes[] = array(

      'page'    => 'page',
      'context' => 'normal',
      'priority'=> 'default',
      'class'   => 'hidden show-for-template-fullscreen-6-php',

      'title'   => __('Fullscreen Slide Setup #2', A_DOMAIN),
      'desc'    => '',

      'fields'  => array(
        
        array(
          'name'=> __('Slide Image IV', A_DOMAIN),
          'desc'=> '',
          'id'  => '_slide_4_img',
          'std' => '',
          'type'=> 'text')

        ,array(
          'std' => __('Upload', A_DOMAIN), 'type' => 'button' )
        
        ,array(
          'name'=> $pre.__('Main Copy', A_DOMAIN),
          'desc'=> '',
          'id'  => '_slide_4_h1',
          'std' => '',
          'type'=> 'text')
        
        ,array(
          'name'=> $pre.__('Foot Copy', A_DOMAIN),
          'desc'=> '',
          'id'  => '_slide_4_h3',
          'std' => '',
          'type'=> 'text')
        
        
        ,array(
          'name'=> __('Slide Image V', A_DOMAIN),
          'desc'=> '',
          'id'  => '_slide_5_img',
          'std' => '',
          'type'=> 'text')

        ,array(
          'std' => __('Upload', A_DOMAIN), 'type' => 'button' )
        
        ,array(
          'name'=> $pre.__('Main Copy', A_DOMAIN),
          'desc'=> '',
          'id'  => '_slide_5_h1',
          'std' => '',
          'type'=> 'text')
        
        ,array(
          'name'=> $pre.__('Foot Copy', A_DOMAIN),
          'desc'=> '',
          'id'  => '_slide_5_h3',
          'std' => '',
          'type'=> 'text')
        
        
        ,array(
          'name'=> __('Slide Image VI', A_DOMAIN),
          'desc'=> '',
          'id'  => '_slide_6_img',
          'std' => '',
          'type'=> 'text')

        ,array(
          'std' => __('Upload', A_DOMAIN), 'type' => 'button' )
        
        ,array(
          'name'=> $pre.__('Main Copy', A_DOMAIN),
          'desc'=> '',
          'id'  => '_slide_6_h1',
          'std' => '',
          'type'=> 'text')
        
        ,array(
          'name'=> $pre.__('Foot Copy', A_DOMAIN),
          'desc'=> '',
          'id'  => '_slide_6_h3',
          'std' => '',
          'type'=> 'text')
      )
    );
    
    # Process Page Setup

    parent::$boxes[] = array(

      'page'    => 'page',
      'context' => 'normal',
      'priority'=> 'high',
      'class'   => 'hidden show-for-template-process-php show-for-template-process-6-php',

      'title'   => __('Process Page Setup', A_DOMAIN),
      'desc'    => '',

      'fields'  => array(
        
        array(
          'name'=> __('First Step Content', A_DOMAIN),
          'desc'=> __('Choose a source page', A_DOMAIN),
          'id'  => '_page_src_1',
          'std' => '',
          'type'=> 'select',
          'opts'=> self::getPagesList()),

        array(
          'name'=> __('First Step Excerpt', A_DOMAIN),
          'desc'=> __('Hand-crafted summary', A_DOMAIN),
          'id'  => '_excerpt_1',
          'std' => "First line.\nSecond line.",
          'type'=> 'textarea'),
          
        array(
          'name'=> __('Second Step Content', A_DOMAIN),
          'desc'=> __('Choose a source page', A_DOMAIN),
          'id'  => '_page_src_2',
          'std' => '',
          'type'=> 'select',
          'opts'=> self::getPagesList()),

        array(
          'name'=> __('Second Step Excerpt', A_DOMAIN),
          'desc'=> __('Hand-crafted summary', A_DOMAIN),
          'id'  => '_excerpt_2',
          'std' => "First line.\nSecond line.",
          'type'=> 'textarea'),
          
        array(
          'name'=> __('Third Step Content', A_DOMAIN),
          'desc'=> __('Choose a source page', A_DOMAIN),
          'id'  => '_page_src_3',
          'std' => '',
          'type'=> 'select',
          'opts'=> self::getPagesList()),

        array(
          'name'=> __('Third Step Excerpt', A_DOMAIN),
          'desc'=> __('Hand-crafted summary', A_DOMAIN),
          'id'  => '_excerpt_3',
          'std' => "First line.\nSecond line.",
          'type'=> 'textarea')

      )
    );
    
    # Process Page Setup #2

    parent::$boxes[] = array(

      'page'    => 'page',
      'context' => 'normal',
      'priority'=> 'high',
      'class'   => 'hidden show-for-template-process-6-php',

      'title'   => __('Process Page Setup #2', A_DOMAIN),
      'desc'    => '',

      'fields'  => array(
        
        array(
          'name'=> __('Fourth Step Content', A_DOMAIN),
          'desc'=> __('Choose a source page', A_DOMAIN),
          'id'  => '_page_src_4',
          'std' => '',
          'type'=> 'select',
          'opts'=> self::getPagesList()),

        array(
          'name'=> __('Fourth Step Excerpt', A_DOMAIN),
          'desc'=> __('Hand-crafted summary', A_DOMAIN),
          'id'  => '_excerpt_4',
          'std' => "First line.\nSecond line.",
          'type'=> 'textarea'),
          
        array(
          'name'=> __('Fifth Step Content', A_DOMAIN),
          'desc'=> __('Choose a source page', A_DOMAIN),
          'id'  => '_page_src_5',
          'std' => '',
          'type'=> 'select',
          'opts'=> self::getPagesList()),

        array(
          'name'=> __('Fifth Step Excerpt', A_DOMAIN),
          'desc'=> __('Hand-crafted summary', A_DOMAIN),
          'id'  => '_excerpt_5',
          'std' => "First line.\nSecond line.",
          'type'=> 'textarea'),
          
        array(
          'name'=> __('Sixth Step Content', A_DOMAIN),
          'desc'=> __('Choose a source page', A_DOMAIN),
          'id'  => '_page_src_6',
          'std' => '',
          'type'=> 'select',
          'opts'=> self::getPagesList()),

        array(
          'name'=> __('Sixth Step Excerpt', A_DOMAIN),
          'desc'=> __('Hand-crafted summary', A_DOMAIN),
          'id'  => '_excerpt_6',
          'std' => "First line.\nSecond line.",
          'type'=> 'textarea')

      )
    );

    # Works Options

    parent::$boxes[] = array(
    
      'page'    => 'page',
      'context' => 'normal',
      'priority'=> 'core',
      'class'   => 'hidden show-for-template-works-php',
    
      'title'   => __('Works Options', A_DOMAIN),
      'desc'    => __('This page will render all your <a href="edit.php?post_type=item">Works</a> according to these settings:', A_DOMAIN),
    
      'fields'  => array(
        
        array(
          'name'=> __('Category Filter', A_DOMAIN),
          'desc'=> '',
          'id'  => 'category',
          'type'=> 'select',
          'std' => '',
          'opts'=> self::getTypeList()),

        array(
          'name'=> __('Ordering', A_DOMAIN),
          'desc'=> '',
          'id'  => 'order',
          'type'=> 'select',
          'std' => '',
          'opts'=> array(
            ''    => 'by Date',
            'abc' => 'by Title (alphabetically)',
            'rnd' => 'in Random Order'))
    
      )
    );

  }
}

/*--------------------------------------------------------------------------
  Register This Metabox
/*------------------------------------------------------------------------*/

add_action ( 'admin_init', 'APageMetabox::init' );
