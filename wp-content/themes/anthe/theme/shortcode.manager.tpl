<!-- BEGIN #shortcodemanager -->

<div id="shortcodemanager" class="hidden">
<div id="shortcodewrapper">
<h3></h3>

<!-- BEGIN #shortcode-select -->

<select id="shortcode-select" title="Select this Shortcode">
  
  <option value="custom">Custom Shortcode</option>

  <?php if (false) : ?>
    <optgroup label="<?php echo A_THEME_NAME ?> Specials">
      <option value="work-content">Sample Work Content</option>
    </optgroup>
  <?php endif ?>

  <?php if ($this->postType == 'page') : ?>
    <optgroup label="<?php echo A_THEME_NAME ?> Specials">
      <!-- <option value="portfolio-page">Portfolio Page</option> -->
      <option value="about-page">About Page</option>
      <option value="contact-page">Contact Page</option>
    </optgroup>
  <?php endif ?>
  
  <optgroup label="Mixed Examples">
    <option value="buttons">Graphic Buttons</option>
    <option value="columns">Columned Content</option>
    <option value="dropcap-labels">Dropcap and Labels</option>
    <option value="lists">Custom Lists</option>
    <option value="tabs-togglers">Tabs and Togglers</option>
  </optgroup>

</select> 

<!-- END #shortcode-select -->

<h3> Result: </h3>

<!-- BEGIN Textareas -->

<textarea name="custom" class="result"><?php echo $this->customShortcode ?></textarea>

<!-- == Sample Work Content == -->
<textarea name="work-content" rows="7">At first, entry the Title above, then Subheading and The Excerpt at the Additional box (below this content editor).

<h3>Using Images &amp; Galleries.</h3>

By default, images are fit with a paragraph widths (~400px). To add full-format images please click <strong>Add Media</strong> button, then create &amp; insert galleries with single or multiple images.

<h3>Galleries Examples.</h3>

Single image example:

[gallery ids="100"]

Several images:

[gallery ids="100,99,98"]

<h3>Galleries Options.</h3>

To create a responsive slider, use:

[gallery type=slider ids="100,99,98"]

Sliders are responsive, so you may limit their max widths by:

[gallery type=slider maxwidth=900 ids="100,99,98"]

<h3>Responsive Video.</h3>

You may add responsive video from popular hosters just by copying the video URL:

http://vimeo.com/57175742

<h3>Featured Image.</h3>

Featured Image option here used to set an thumbnail image to use in folio.

If you have any question, please free to ask us at ThemeForest.</textarea>

<!-- == Contact Page == -->
<textarea name="contact-page" rows="7">[one_half]

[heading] About | Us [/heading]

We passionate about <a href="#process">our development process</a>, icing croissant, candy jelly-o gummi bears and pastry faworki caramels powder chocolate cake. Please give us a call, email us (on the right of the page) or use the contact form below to reach us right now.

[contact email='<?php echo get_option ('admin_email') ?>' send='Send' yourname='Your Name' yourmail='Your Email' yourmsg='Your Message']

[/one_half]

[one_fourth]

[heading] The | Social [/heading]

Watch us on <a href="http://alaja.info/about">Envato</a>
Follow us on <a href="http://twitter.com/helloalaja">Twitter</a>
Give a shot on <a href="#">Dribbble</a>
Drop a line through <a href="#">Gmail</a>

[/one_fourth]

[one_fourth_last]

[heading] Get | In Touch [/heading]

T: +8 (41) 9982-23-23
F: +8 (41) 9982-23-24
E: <a href="mailto:noreply@noreply.anthe">contact@Anthe.com</a>

15-984, London, England

[/one_fourth_last]</textarea>

<!-- == About Page == -->
<textarea name="about-page" rows="7">[one_third]

[heading double=true] Hi, our names Alex &amp; Kim. | [br] We Passionate. We know sites. [/heading]

We passionate about icing croissant, candy jelly-o gummi bears and pastry faworki caramels powder chocolate cake.

We using <a href="#">UI &amp; UX for dragée</a> liquorice sesame snaps. Topping gingerbread halvah candy. Icing donut caramels gummi bears wypas marshmallow icing marshmallow powder. Icing I love liquorice cake toffee sugar plum.

[/one_third]

[two_third_last]

To activate an image slider, place here an image gallery ( Add Media → Create Gallery )

[/two_third_last]</textarea>

<!-- == Mixed Examples: Buttons == -->
<textarea name="buttons" rows="11">[button url="#url"] Button Text [/button]

// styles supported: white, black, blue, orange, teal, yellow, green, brown, gray, purple, steel, cyan, classic
[button url="#url" style=black] Button Text [/button]

// sizes: small, big, wide
[button url="#big" size=big] Big Button [/button]

// compilation
[button url="#wide" size=wide style=gray] Wide Button Caption [/button]</textarea>

<!-- == Mixed Examples: Columns == -->
<textarea name="columns" rows="15">// mixed
[one_third] <strong>one_third</strong>. Jelly beans macaroon cheesecake soufflé marzipan applicake applicake. I love pastry jujubes chocolate. [/one_third]
[two_third_last] <strong>two_third_last</strong>. Jelly beans macaroon cheesecake soufflé marzipan applicake applicake. I love pastry jujubes chocolate cake marshmallow I love cookie carrot cake pudding. [/two_third_last]

[one_sixth] <strong>one_sixth</strong>. Jelly beans macaroon cheesecake soufflé. [/one_sixth]
[one_third] <strong>one_third</strong>. Jelly beans macaroon cheesecake soufflé marzipan applicake chocolate cake marshmallow. [/one_third]
[one_half_last] <strong>one_half_last</strong>. Topping lollipop cookie oat cake fruitcake wafer faworki. Applicake wypas jelly I love. Chocolate cake lollipop. [/one_half_last]

// halves
[one_half] <strong>one_half</strong>. Jelly beans macaroon cheesecake soufflé marzipan applicake applicake. I love pastry jujubes chocolate cake marshmallow I love cookie carrot cake pudding. [/one_half]
[one_half_last] <strong>one_half_last</strong>. Jelly beans macaroon cheesecake soufflé marzipan applicake applicake. I love pastry jujubes chocolate cake marshmallow I love cookie carrot cake pudding. [/one_half_last]

// thirds
[one_third] <strong>one_third</strong>. Topping lollipop cookie oat cake fruitcake wafer faworki. Applicake wypas jelly I love. Chocolate cake lollipop. [/one_third]
[one_third] <strong>one_third</strong>. Topping lollipop cookie oat cake fruitcake wafer faworki. Applicake wypas jelly I love. Chocolate cake lollipop. [/one_third]
[one_third_last] <strong>one_third_last</strong>. Topping lollipop cookie oat cake fruitcake wafer faworki. Applicake wypas jelly I love. Chocolate cake lollipop. [/one_third_last]

// fourths (the same for fifths &amp; sixths)
[one_fourth] <strong>one_fourth</strong>. Cheesecake gummi bears marshmallow cotton candy. Danish gummi bears icing chocolate gummies. [/one_fourth]
[one_fourth] <strong>one_fourth</strong>. Cheesecake gummi bears marshmallow cotton candy. Danish gummi bears icing chocolate gummies. [/one_fourth]
[one_fourth] <strong>one_fourth</strong>. Cheesecake gummi bears marshmallow cotton candy. Danish gummi bears icing chocolate gummies. [/one_fourth]
[one_fourth_last] <strong>one_fourth_last</strong>. Cheesecake gummi bears marshmallow cotton candy. Danish gummi bears icing chocolate. [/one_fourth_last]</textarea>

<!-- == Mixed Examples: Dropcap & Labels == -->
<textarea name="dropcap-labels" rows="9">// dropcaps
[one_half] [dropcap style="dark"] Dropcap [/dropcap] Gummi bears sweet jujubes chupa chups chocolate cake. Topping gingerbread halvah candy. Lollipop apple pie dragée dessert sugar plum muffin. [/one_half]

[one_half_last] [dropcap] Dropcap [/dropcap] Jelly beans macaroon cheesecake soufflé marzipan applicake applicake. I love pastry jujubes chocolate cake marshmallow I love cookie carrot cake pudding. [/one_half_last]

// labels
[one_fifth] [label style="red"] Red label [/label] Apple pie danish toffee jujubes. [/one_fifth]
[one_fifth] [label style="green"] Green label [/label] Chocolate chocolate muffin. [/one_fifth]
[one_fifth] [label style="orange"] Orange label [/label] Pie I love chupa chups. [/one_fifth]
[one_fifth] [label style="blue"] Blue label [/label] Chupa chups chocolate bar danish. [/one_fifth]
[one_fifth_last] [label style="gray"] Gray label [/label] Cupcake cotton candy powder. [/one_fifth_last]</textarea>

<!-- == Mixed Examples: Dropcap & Labels == -->
<textarea name="lists" rows="12">[list]
<ol>
  <li>Default ordered list</li>
  <li>Pellentesque</li>
  <li>Sed posuere</li>
</ol>
[/list]

[list]
<ul>
  <li>Default unordered list</li>
  <li>Pellentesque</li>
  <li>Sed posuere</li>
</ul>
[/list]

[list type=check]
<ul>
  <li>Unordered check list</li>
  <li>Pellentesque</li>
  <li>Sed posuere</li>
</ul>
[/list]

[list type=circle]
<ul>
  <li>Unordered circle list</li>
  <li>Pellentesque</li>
  <li>Sed posuere</li>
</ul>
[/list]

[list type=disc]
<ul>
  <li>Unordered disc list</li>
  <li>Pellentesque</li>
  <li>Sed posuere</li>
</ul>
[/list]

[list type=zero]
<ol>
  <li>Ordered</li>
  <li>Leading Zero</li>
  <li>List</li>
</ol>
[/list]

[list type=cjk]
<ol>
  <li>Ordered</li>
  <li>CJK Ideographic</li>
  <li>List</li>
</ol>
[/list]

[list type=hebrew]
<ol>
  <li>Ordered</li>
  <li>Hebrew</li>
  <li>List</li>
</ol>
[/list]

[list type=hiragana]
<ol>
  <li>Ordered</li>
  <li>Hiragana</li>
  <li>List</li>
</ol>
[/list]

[list type=katakana]
<ol>
  <li>Ordered</li>
  <li>Katakana</li>
  <li>List</li>
</ol>
[/list]

[list type=latin]
<ol>
  <li>Ordered</li>
  <li>Latin</li>
  <li>List</li>
</ol>
[/list]

[list type=roman]
<ol>
  <li>Ordered</li>
  <li>Roman</li>
  <li>List</li>
</ol>
[/list]

[list type=greek]
<ol>
  <li>Ordered</li>
  <li>Greek</li>
  <li>List</li>
</ol>
[/list]

[list type=Latin]
<ol>
  <li>Ordered</li>
  <li>Upper Latin</li>
  <li>List</li>
</ol>
[/list]

[list type=Roman]
<ol>
  <li>Ordered</li>
  <li>Upper Roman</li>
  <li>List</li>
</ol>
[/list]</textarea>

<!-- == Mixed Examples: Tabs & Togglers == -->
<textarea name="tabs-togglers" rows="12">// tabs
[tabs tab1="Tab 1 Title" tab2="Tab 2 Title" tab3="Tab 3 Title"]
  [tab] Chocolate chocolate muffin. [/tab]
  [tab] Apple pie danish toffee jujubes. [/tab]
  [tab] Pie I love chupa chups. [/tab]
[/tabs]

// togglers
[toggle title="Closed by default" state="closed"] Toggle closed by default. [/toggle]
[toggle title="Open by default" state="open"] Toggle open by default. [/toggle]

// accordion
[accordion title="Closed by default"] Toggle closed by default. [/accordion]
[accordion title="Open by default" state="open"] Toggle open by default. [/accordion]
[accordion title="Closed by default"] Toggle closed by default. [/accordion]
[accordion title="Closed by default"] Toggle closed by default. [/accordion]
</textarea>

<!-- END Textareas -->

<p>
  <input type="submit" id="shortcode-cancel" class="button" value="Cancel">
  <input type="submit" id="shortcode-insert" class="button-primary" value="Use This Code">
</p>
</div>
</div>

<!-- END #shortcodemanager -->

<!-- shortcode manager styles -->

<style>
#shortcodewrapper { max-width: 540px; margin: 0 auto; }
#shortcodewrapper h3 { padding: 10px 0 }
#shortcodewrapper p { margin-top: 1.63em }
#shortcodewrapper select { width: 100%; height: 30px; }
#shortcodewrapper textarea { display: none; width: 100%; min-height: 114px; resize: vertical; }
#shortcodewrapper textarea.result { display: block }
#shortcodewrapper #shortcode-insert { float: right }
#shortcodewrapper textarea {line-height:19px;font-size:11px;padding:0 0 0 .5em;font-family:"Lucida Sans Typewriter","Lucida Console",Monaco,"Bitstream Vera Sans Mono",monospace;background:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAmCAYAAAAMV1F9AAAAHUlEQVQoU2MQVHLhR8cMo4IDJfj//38MPCo4UIIAHGtNredMLVMAAAAASUVORK5CYII=")top;background-attachment:local}

.wp_themeSkin .mceIcon { background: url('<?php echo A_THEME_URL ?>/img/magic.png') no-repeat center bottom; }
.wp_themeSkin a:hover .mceIcon { background-position: center top; }
</style>

<!-- shortcode manager scripts -->

<script>
jQuery.noConflict();

var ShortcodeManager = {
  
  btnCode: '<td><a id="content_wp_asc" href="#TB_inline?&amp;inlineId=shortcodemanager&amp;width=640&amp;height=695" class="mceButton mceButtonEnabled mce_wp_asc thickbox" title="Shortcode Manager" tabindex="-1"><span class="mceIcon mce_wp_asc"></span><span class="mceVoiceLabel mceIconOnly" style="display:none;" id="mce_wp_asc_voice">Shortcode Manager</span></a></td>',

  init: function () { // called from shortcode.manager.php
    
    if (this.initialized) return; // multiple init calls are very possible
    
    this.addSMButton();
    this.initDelegates();
    
    this.initialized = true;
  },
  // add shortcode manager buttons
  addSMButton: function() {
    jQuery('#wp-fullscreen-buttons').append('<div>' + this.btnCode + '</div>'); // inject fullscreen editor
    jQuery('#content_toolbar1').find('.mceToolbarEnd.mceLast').before(this.btnCode); // inject TinyMCE 1st row
  },
  // activate shortcode manager actions
  initDelegates: function() {
    var self = this;
    jQuery('body').delegate('#shortcode-insert', 'click', function () {
      self.insertShortcode();
      tb_remove();
    }).delegate('#shortcode-cancel', 'click', function () {
      tb_remove();
    }).delegate('#shortcode-select', 'change', function () {
      jQuery('#TB_window textarea:visible').hide();
      jQuery('#TB_window textarea[name="' + this.value +'"]').fadeIn('fast').focus();
    });
  },
  // insert shortcode content
  insertShortcode: function () {
    var v = jQuery('#TB_window textarea:visible').val();
    v = v.replace( new RegExp('^\/\/.*$', 'gmi'), '' ); // remove comments starting with '//'
    if (switchEditors.wpautop) v = switchEditors.wpautop(v);
    if (v) tinyMCE.execCommand('mceInsertContent', false, v);
  }
}
</script>
