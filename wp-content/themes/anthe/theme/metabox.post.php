<?php

/*--------------------------------------------------------------------------
  Setup Post Metaboxes
/*------------------------------------------------------------------------*/

class APostMetabox extends AMetabox {

  static function init () {
    
    # Additional Post Settings
    
    parent::$boxes[] = array(

      'page'    => 'post',
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
          'std' => 'The Post | Excerpt',
          'type'=> 'textarea')

      )
    );
    
    if (Acorn::get('advanced-styling')) {
      
    # Post Page Style

    parent::$boxes[] = array(

      'page'    => 'post',
      'context' => 'normal',
      'priority'=> 'default',
      'class'   => '',
      
      'title'   => __('Post Page Style', A_DOMAIN),
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
    

    /*
    
    # Link Settings

    parent::$boxes[] = array(

      'page'    => 'post',
      'context' => 'normal',
      'priority'=> 'high',
      'class'   => 'hidden show-for-post-format-link',

      'title'   => __('Link Settings', A_DOMAIN),

      'fields'  => array(

        array(
          'name'  => __('The URL', A_DOMAIN),
          'desc'  => __('Insert the URL you wish to link to.', A_DOMAIN),
          'id'    => 'url',
          'type'  => 'text' )
      )
    );

    # Quote Settings

    parent::$boxes[] = array(

      'page'    => 'post',
      'context' => 'normal',
      'priority'=> 'high',
      'class'   => 'hidden show-for-post-format-quote',

      'title'   => __('Quote Settings', A_DOMAIN),

      'fields'  => array(

        array(
          'name'  => __('The Quote', A_DOMAIN),
          'desc'  => __('Write your quote in this field.', A_DOMAIN),
          'id'    => 'quote',
          'type'  => 'textarea' )
      )
    );

    # Audio Settings

    parent::$boxes[] = array(

      'page'    => 'post',
      'context' => 'normal',
      'priority'=> 'high',
      'class'   => 'hidden show-for-post-format-audio',

      'title'   => __('Audio Settings', A_DOMAIN),
      'desc'    => __('For audio playback, you must supply both MP3 and OGG files to satisfy all browsers.', A_DOMAIN),

      'fields'  => array(

        array(
          'name'  => __('MP3 File URL', A_DOMAIN),
          'desc'  => __('Provide an URL starting with http://', A_DOMAIN),
          'id'    => 'mp3-url',
          'type'  => 'text' ),
        
        array(
          'name'  => __('OGG File URL', A_DOMAIN),
          'desc'  => __('Provide an URL starting with http://', A_DOMAIN),
          'id'    => 'ogg-url',
          'type'  => 'text' )
      )
    );
    
    */
  }
}

/*--------------------------------------------------------------------------
  Register This Metabox
/*------------------------------------------------------------------------*/

add_action ( 'admin_init', 'APostMetabox::init' );
