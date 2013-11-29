<?php

class AThemeShortcodes extends AShortcode {
  
  static function init () {
    add_shortcode ('img', 'AThemeShortcodes::img');
    add_shortcode ('accent', 'AThemeShortcodes::accent');
    add_shortcode ('breakline', 'AThemeShortcodes::breakline');
    add_shortcode ('heading', 'AThemeShortcodes::heading');
    add_shortcode ('date', 'AThemeShortcodes::date');
    add_shortcode ('title', 'AThemeShortcodes::title');
    self::addShortcode ('wide', 'AThemeShortcodes::wide');
  }

  static function img ( $atts, $content = null ) {
    
    extract(shortcode_atts(array(
      'src' => false,
      'link' => false
    ), $atts));
    
    $img = '';
    if ($src) $img = "<img src='{$src}' alt='{$content}'>";
    if ($link && $img) $img = "<a href='{$link}'>{$img}</a>";
    
    return $img;
  }

  static function accent ( $atts, $content = null ) {
    
    $pieces = explode('|', $content);
    foreach ($pieces as $i => &$piece) {
      $even = $i++ %2;
      if ($even) $piece = "<strong>{$piece}</strong>";
    }
    $content = implode($pieces);
    $content = do_shortcode($content);

    return $content;
  }

  static function breakline ( $atts, $content = null ) {
    
    $pieces = explode('|', $content);
    $content = implode('<br>', $pieces);
    $content = do_shortcode($content);

    return $content;
  }

  static function heading ( $atts, $content = null ) {
    
    extract(shortcode_atts(array(
      'double' => false
    ), $atts));
    
    if (is_single()) $double = true;
    
    $pad = $double ? 'pad' : 'bottom-pad';
    $content = do_shortcode("[accent]{$content}[/accent]");
    
    return "<h4 class='{$pad}'>{$content}</h4>";
  }
  
  static function title ( $atts, $content = null ) {
    
    return get_the_title();
  }
  
  static function date ( $atts, $content = null ) {
    
    return get_the_date();
  }
  
  static function wide ( $atts, $content = null ) {
    
    extract(shortcode_atts(array(
      'maxwidth' => 'auto'
    ), $atts));
    
    $maxwidth = ($int = intval($maxwidth)) ? "{$int}px" : 'auto';
    return "<div class='wide' style='max-width:{$maxwidth}'>{$content}</div>";
  }
}

AThemeShortcodes::init();