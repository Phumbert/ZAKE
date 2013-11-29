<?php

class AExtend extends Acorn {

  static function registerWork () {

    $slug = 'item';
    
    $labels = array(
      'add_new' => __('Add New', A_DOMAIN ),
      'add_new_item' => __('Add New Portfolio Work', A_DOMAIN ),
      'edit_item' => __('Edit Work', A_DOMAIN ),
      'name' => __('Works', A_DOMAIN ),
      'new_item' => __('New Work', A_DOMAIN ),
      'not_found' =>  __('No portfolio works found', A_DOMAIN ),
      'not_found_in_trash' => __('No works found in Trash', A_DOMAIN ),
      'search_items' => __('Search Works', A_DOMAIN ),
      'singular_name' => __('Work', A_DOMAIN ),
      'view_item' => __('View Work', A_DOMAIN )
    );

    $args = array(
      'exclude_from_search' => true,
      'hierarchical' => false,
      'labels' => $labels,
      'public' => true,
      'rewrite' => array( 'with_front' => false, 'slug' => $slug ),
      'supports' => array( 'title','editor','thumbnail' ) // ,'excerpt','comments'
    ); 

    register_post_type( 'item', $args );
  }

  static function registerWorkTaxonomies () {

    # category-like
    
    $args = array( 'hierarchical' => true );
    register_taxonomy( 'item-type', 'item', $args );
    
    # tag-like
    
    // $args = array( 'hierarchical' => false );
    // register_taxonomy( 'item-tag', 'item', $args );
  }

  static function getWorks ( $args = '', $query = true ) {

    $args = wp_parse_args( $args,
      array(
        'item-type' => '', // category slug req.
        'order' => 'DESC',
        'orderby' => 'post_date',
        'post_status' => 'publish',
        'post_type' => 'item',
        'posts_per_page' => -1
      ));

    return ($query) ? new WP_Query($args) : get_posts($args);
  }

  static function getWorkCategories () {
    return get_the_terms( get_the_ID(), 'item-type' );
  }
  
  static function getWorkTags () {
    return get_the_terms( get_the_ID(), 'item-tag' );
  }

  static function getWorksByPageMeta ( $args = '', $query = true ) {
    
    $args = wp_parse_args( $args );

    if ($category = self::getm('category')) {
      $term = get_term( $category, 'item-type' );
      $args['item-type'] = $term->slug;
    }
    
    if ($order = self::getm('order')) {
      if ($order == 'abc') {
        $args['order'] = 'ASC';
        $args['orderby'] = 'title';
      } 
      elseif ($order == 'rnd') {
        $args['orderby'] = 'rand';
      }
    }

    return self::getWorks($args, $query);
  }

  static function getFolioSet () {

    $s = array();
    $s['class'] = '';
    $s['gallery'] = '';
    $s['rel'] = '';
    $s['target'] = get_permalink();
    $s['title'] = get_the_title();

    $type = self::getm('handler-type');
    $curl = self::getm('handler-url');

    # lightbox gallery

    if ( $type == 'lightbox-gallery' ) {

      $atts = self::getAttachments();

      if (count($atts)) { // has attachments

        $s['atts'] = $atts;

        $s['class'] = 'lightbox'; // 1st attachment -> base target
        $s['rel'] = 'gallery-'. get_the_ID();
        $s['target'] = $atts[0]->guid;

        foreach (array_slice($atts, 1) as $a) { // other -> hidden gallery

          $title = apply_filters( 'the_title' , $a->post_title );
          $s['gallery'] .= '<a href="'. $a->guid .'" class="'. $s['class'] .'" rel="'. $s['rel'] .'" title="'. $title .'"></a>';
        }

        $s['gallery'] = '<div class="hidden">'. $s['gallery'] .'</div>';
      }
    }

    # custom target

    else if ( $type == 'custom-target' ) {

      $s['target'] = $curl;
    }

    # custom lightbox

    else if ( $type == 'custom-lightbox' ) {

      $s['class'] = 'lightbox';
      $s['target'] = $curl;     
    }

    return (object) $s;
  }

  static function getAttachments ( $args = '' ) {

    # extract function arguments

    extract(wp_parse_args( $args,
      array(
        'as_slides' => false,
        'filter_gt_99' => true,
        'filter_thumb' => false,
        'parent_id' => get_the_ID(),
        'size' => false
      )));

    # get attachments

    $atts = get_posts(array(
        'exclude' => $filter_thumb ? get_post_thumbnail_id() : '',
        'numberposts' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'post_parent' => $parent_id,
        'post_status' => null,
        'post_type' => 'attachment'
      ));

    # filter items with menu order > 99

    if ( $filter_gt_99 ) {

      $new = array();
      foreach ( $atts as $a ) {
        if ($a->menu_order && $a->menu_order > 99)
          continue;
        $new[] = $a;
      }

      $atts = $new;
    }

    # image size (file setup.php)

    if ( $size ) {

      foreach ( $atts as $a ) {
        $imgarr = image_downsize($a->ID, $size);
        $a->guid = $imgarr[0];
      }
    }

    # return attachments as slide tags

    if ( $as_slides ) {
      
      $o = '';
      foreach($atts as $a)
        $o .= "[slide img='{$a->guid}']\n";
        // $o .= "[slide img='{$a->guid}' title='{$a->post_content}' url='{$a->post_excerpt}']\n";

      $atts = $o;
    }

    return $atts;
  }
}

/*--------------------------------------------------------------------------
  Register Work Type & Category
/*------------------------------------------------------------------------*/

add_action ( 'init', 'AExtend::registerWork' );
add_action ( 'init', 'AExtend::registerWorkTaxonomies' );
