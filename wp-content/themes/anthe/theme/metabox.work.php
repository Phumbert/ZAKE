<?php

/*--------------------------------------------------------------------------
  Setup Work Metaboxes
/*------------------------------------------------------------------------*/

class AWorkMetabox extends AMetabox {

  static function getWorkList() {

    if ( isset($_GET['post']) )
      $post_id = (int) $_GET['post'];
    elseif ( isset($_POST['post_ID']) )
      $post_id = (int) $_POST['post_ID'];
    else
      $post_id = 0;

    $works = array('off' => __('Disabled', A_DOMAIN), 'auto' => __('Auto', A_DOMAIN));
    foreach ( AExtend::getWorks( '', $query = false ) as $w )
      if ($w->ID != $post_id) // dont include the current post
        $works[$w->ID] = $w->post_title;

    return $works;
  }

  static function getTypeList () {

    $types = array('');
    foreach (get_terms('item-type') as $type)
      $types[$type->term_id] = $type->name;

    return $types;
  }

  static function init () {
    

    if (Acorn::get('advanced-styling')) {

    # Work Page Style

    parent::$boxes[] = array(

      'page'    => 'item',
      'context' => 'normal',
      'priority'=> 'default',
      'class'   => '',
      
      'title'   => __('Work Page Style', A_DOMAIN),
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
    
    }
    
    # Additional Work Settings
    
    parent::$boxes[] = array(

      'page'    => 'item',
      'context' => 'normal',
      'priority'=> 'high',
      'class'   => '',

      'title'   => __('Additional', A_DOMAIN),
      'desc'    => '',

      'fields'  => array(

        array(
          'name'=> __('The Excerpt', A_DOMAIN),
          'desc'=> __('Hand-crafted summary of your content', A_DOMAIN),
          'id'  => '_the_excerpt',
          'std' => 'The Work | Excerpt',
          'type'=> 'textarea')

      )
    );

  }
}

/*--------------------------------------------------------------------------
  Register This Metabox
/*------------------------------------------------------------------------*/

add_action ( 'admin_init', 'AWorkMetabox::init' );
