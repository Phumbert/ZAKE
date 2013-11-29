<?php

# Defines an array of options

function optionsframework_options() {

  $imgpath = A_THEME_URL . '/img';

  # General Settings

  $options[] = array( 'name' => 'General', 'type' => 'heading' );

  $options[] = array( 
    'name' => 'Custom Logo',
    'desc' => 'Upload a logo for your website, or provide an URL of image starting with http://',
    'std' => "{$imgpath}/logo.png",
    'id' => 'logo',
    'type' => 'upload');

  $options[] = array( 
    'name' => 'Fullscreen Logo',
    'desc' => 'Upload an alternative logo that will alter default logo on fullscreen slider.',
    'class' => 'dark-img-bg',
    'std' => "{$imgpath}/logo-alt.png",
    'id' => 'fullscreen-logo',
    'type' => 'upload');

  $options[] = array( 'name' => 'Custom Favicon',
    'desc' => 'Upload small Png/Gif image that will represent your website&rsquo;s favicon.',
    'id' => 'favicon',
    'type' => 'upload');

  $options[] = array( 'name' => 'Login Logo',
    'desc' => 'Upload a logo (274x63px) for WordPress login page, or provide an URL of image starting with http://',
    'class' => 'hidden',
    'id' => 'login-logo',
    'type' => 'upload');

  $options[] = array( 'name' => 'Footer Text',
    'desc' => 'Enter the text you would like to display in the footer of your site. Use <a href="nav-menus.php">Menus</a> to create and add menu at the footer\'s right corner.',
    'id' => 'copy',
    'class' => '',
    'std' => '&copy; '. date( 'Y' ) ."\n".'<a href="http://themeforest.net/user/alaja/portfolio">'. A_THEME_NAME .'</a> theme by <a href="http://alaja.info/about">Alaja</a>',
    'type' => 'textarea');

  $options[] = array( 'name' => 'FeedBurner URL',
    'desc' => 'Enter FeedBurner URL (or any preferred) if you wish to use it over the standard WordPress Feed e.g. http://feeds.feedburner.com/your-site',
    'class' => 'autoselect',
    'id' => 'feedburner',
    'std' => '',
    'type' => 'text'); 

  $options[] = array( 'name' => 'Tracking Code',
    'desc' => 'Paste your Google Analytics (or other) tracking code here. It will be inserted into the bottom of your content, immediately before the &lt;/body&gt; tag of each page.',
    'id' => 'tracking',
    'std' => '',
    'type' => 'textarea');

  # Style Settings

  $options[] = array( 'name' => 'Style', 'type' => 'heading' );

  $options[] = array( 'name' => 'Custom Colours',
    'desc' => 'Text colour, default - #373432',
    'id' => 'text-color',
    'std' => '#373432',
    'type' => 'color');

  $options[] = array( 'name' => 'Custom Colours',
    'desc' => 'Link colour, default - #1c1a19',
    'class' => 'sub',
    'id' => 'link-color',
    'std' => '#1c1a19',
    'type' => 'color');
  
  $options[] = array( 'name' => 'Custom Colours',
    'desc' => 'Link background on :hover, default - #ffeedd',
    'class' => 'sub',
    'id' => 'link-bg',
    'std' => '#ffeedd',
    'type' => 'color');
  
  $options[] = array( 'name' => 'Content Font',
    'desc' => 'Enter <a href="http://www.google.com/webfonts">google font family</a> name, default - PT Sans:400,700,400italic,700italic',
    'class' => '',
    'id' => 'family-font',
    'std' => 'PT Sans:400,700,400italic,700italic',
    'type' => 'text');

  $options[] = array( 'name' => 'Custom CSS',
    'desc' => 'Quickly add some CSS to your theme here.',
    'id' => 'custom-css',
    'std' => '',
    'type' => 'textarea');
  
  $options[] = array( 'name' => 'Custom Shortcode',
    'desc' => 'Add your favorite shortcodes to extend Shortcode Manager.',
    'id' => 'custom-shortcode',
    'std' => '[shortcode] Find me in Theme Options and Shortcode Manager. [/shortcode]',
    'type' => 'textarea');
  
  $options[] = array( 'name' => 'Global Page Style',
    'desc' => 'Display page style options for each Work & each Post.',
    'id' => 'advanced-styling',
    'type' => 'checkbox');

  # Social Settings

  $options[] = array( 'name' => 'Social', 'type' => 'heading' );

  $options[] = array( 'name' => 'Social Usernames',
    'desc' => 'Enter Dribbble username.',
    'class' => 'autoselect',
    'id' => 'social-dribbble-name',
    'std' => '',
    'type' => 'text');

  $options[] = array( 'name' => 'Social Usernames',
    'desc' => 'Enter GitHub username.',
    'class' => 'autoselect sub',
    'id' => 'social-github-name',
    'std' => '',
    'type' => 'text');

  $options[] = array( 'name' => 'Social Usernames',
    'desc' => 'Enter Instagram username.',
    'class' => 'autoselect sub',
    'id' => 'social-instagram-name',
    'std' => '',
    'type' => 'text');

  $options[] = array( 'name' => 'Social Usernames',
    'desc' => 'Enter Pinterest username.',
    'class' => 'autoselect sub',
    'id' => 'social-pinterest-name',
    'std' => '',
    'type' => 'text');

  $options[] = array( 'name' => 'Social Usernames',
    'desc' => 'Enter Twitter username.',
    'class' => 'autoselect sub',
    'id' => 'social-twitter-name',
    'std' => 'helloalaja',
    'type' => 'text');

  $options[] = array( 'name' => 'Social Usernames',
    'desc' => 'Enter Vimeo username.',
    'class' => 'autoselect sub',
    'id' => 'social-vimeo-name',
    'std' => '',
    'type' => 'text');

  $options[] = array( 'name' => 'Social Media URLs',
    'desc' => 'Enter Facebook custom URL.',
    'class' => 'autoselect',
    'id' => 'social-facebook-url',
    'std' => '#facebook',
    'type' => 'text');

  $options[] = array( 'name' => 'Social Media URLs',
    'desc' => 'Enter Google+ custom URL.',
    'class' => 'autoselect sub',
    'id' => 'social-googleplus-url',
    'std' => '#google',
    'type' => 'text');

  $options[] = array( 'name' => 'Social Media URLs',
    'desc' => 'Enter LinkedIn custom URL.',
    'class' => 'autoselect sub',
    'id' => 'social-linkedin-url',
    'std' => '',
    'type' => 'text');

  $options[] = array( 'name' => 'Social Media URLs',
    'desc' => 'Enter Tumblr custom URL.',
    'class' => 'autoselect sub',
    'id' => 'social-tumblr-url',
    'std' => '',
    'type' => 'text');

  # end

  return $options;
}
