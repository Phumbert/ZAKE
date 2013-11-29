<?php

class ASetup extends Acorn {

  static function setupTheme () {

    # Register Sidebars
    $names = array(); // 'Journal Sidebar', 'Portfolio Sidebar'

    foreach ($names as $name) {
      register_sidebar( array(
        'name' => $name,
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sep"><h4>',
        'after_title' => '</h4></div>'));
    }

    # Post Formats Support
    $formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'audio' );
    // add_theme_support ( 'post-formats', $formats );
    // add_post_type_support ( 'post', 'post-formats' );

    # Post Thumbnails Support
    add_theme_support ( 'post-thumbnails' ); // , array( 'post', 'item' )
    
    # Thumbnail Sizes
    set_post_thumbnail_size ( 505, 318, true );
    add_image_size ( 'large', 1040, '', true );
    // add_image_size ( '300x200', 300, 200, true ); // 300x200 thumbnail

    # Load Translation Text Domain
    load_theme_textdomain( A_DOMAIN );
  }

  static function registerMenu () {
    register_nav_menu( 'main', __( 'Main Menu', A_DOMAIN ));
    register_nav_menu( 'foot', __( 'Footer Menu', A_DOMAIN ));
  }
  
  static function setupRSS () {
    if ( self::get('feedburner') )
      add_action ( 'wp_head', 'ASetup::generateCustomRSS' );
    else
      add_theme_support( 'automatic-feed-links' );
  }

  static function generateCustomRSS() {
    echo '<link rel="alternate" type="application/rss+xml" title="'. get_bloginfo( 'name' ) .'" href="'. self::get('feedburner', get_bloginfo( 'rss2_url' )) .'" />';
  }

  static function enqueueResources () {

    # Enqueue Basic Styles
    wp_enqueue_style( 'style', A_URL .'/style.css' );
    wp_enqueue_style( 'custom', A_CUSTOM_CSS_URL );

    # Enqueue Basic Scripts
    wp_enqueue_script( 'script', A_URL .'/script.js', array('jquery'), A_THEME_VER, true );
    if ( is_single() ) wp_enqueue_script( 'comment-reply' );
  }

  static function excerptLength ($length) { return 19; }
  
  static function excerptMore ($excerpt) { return str_replace('[...]', '&hellip;', $excerpt); }

  static function loginLogoImage () {
    $url = A_THEME_URL .'/img/login-logo.png';
    $url = self::get('login-logo', $url);
    echo "<style>#login h1 a { background-image:url('{$url}') }</style>\n";
  }
  
  static function loginLogoTitle () { return get_bloginfo( 'name' ); }

  static function loginLogoUrl () { return site_url(); }

  static function customGravatar ( $avatar_defaults ) {
    $avatar = A_THEME_URL .'/img/gravatar.png';
    $avatar_defaults[$avatar] = 'Simple (/theme/img/gravatar.png)';
    return $avatar_defaults;
  }
  
  static function customSearchQuery ($q) {
    if ($q->is_search) $q->set( 'post_type', 'post' ); // search posts only
    return $q;
  }
}

/*--------------------------------------------------------------------------
  Theme Setup
/*------------------------------------------------------------------------*/

add_action ( 'after_setup_theme', 'ASetup::setupTheme' );

/*--------------------------------------------------------------------------
  Public (Front-end) Basic Styles & Scripts
/*------------------------------------------------------------------------*/

add_action ( 'wp_enqueue_scripts', 'ASetup::enqueueResources' );

/*--------------------------------------------------------------------------
  Register WP3.0+ Menus
/*------------------------------------------------------------------------*/

add_action ( 'init', 'ASetup::registerMenu' );

/*--------------------------------------------------------------------------
  Generate RSS Links
/*------------------------------------------------------------------------*/

add_action ( 'init', 'ASetup::setupRSS' );

/*--------------------------------------------------------------------------
  Custom Logos
/*------------------------------------------------------------------------*/

add_action ( 'login_head', 'ASetup::loginLogoImage' );
add_filter ( 'login_headertitle', 'ASetup::loginLogoTitle' );
add_filter ( 'login_headerurl', 'ASetup::loginLogoUrl' );

/*--------------------------------------------------------------------------
  Change Default Excerpt Length
/*------------------------------------------------------------------------*/

add_filter ( 'excerpt_length', 'ASetup::excerptLength' );

/*--------------------------------------------------------------------------
  Configure Excerpt String
/*------------------------------------------------------------------------*/

add_filter ( 'wp_trim_excerpt', 'ASetup::excerptMore' );

/*--------------------------------------------------------------------------
  Custom Gravatar Support ( Settings > Discussion )
/*------------------------------------------------------------------------*/

add_filter( 'avatar_defaults', 'ASetup::customGravatar' );

/*--------------------------------------------------------------------------
  Comment the next lines if you plan to use Windows Live Writer
/*------------------------------------------------------------------------*/

remove_action ('wp_head', 'rsd_link');
remove_action ('wp_head', 'wlwmanifest_link');
remove_action ('wp_head', 'wp_generator');

/*--------------------------------------------------------------------------
  Custom Search Query
/*------------------------------------------------------------------------*/

add_filter ( 'pre_get_posts', 'ASetup::customSearchQuery' );