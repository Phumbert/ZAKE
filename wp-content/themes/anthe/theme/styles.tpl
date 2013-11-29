/* auto-generated file / all manual changes will be lost */

/* custom fonts import */

<?php $fontsReq = str_replace(' ', '+', implode('|', $this->fonts)); if ($fontsReq) : ?>
@import url('http://fonts.googleapis.com/css?family=<?php echo $fontsReq ?>');
<?php endif; ?>

/* custom fonts init */

<?php foreach ($this->fonts as $t=>$f): $name = preg_replace('/:.*$/', '', $f) ?>
<?php switch ($t): case 'family': ?>
body { font-family: '<?php echo $name ?>', 'Georgia', serif }
<?php break; endswitch; endforeach; ?>

/* custom colors */

html, body { color: <?php echo AStyles::lighten($this->textC, .25) ?> }

.section h1,
.section h2,
.section h3,
.section h4,
blockquote,
.map-container.bright h2,
.head a { color: <?php echo $this->textC ?> }

.section .map-container,
.section .bg-container,
.section h2:after,
.section .bg-container a:hover,
.bg-container .fieldset input[type="submit"]:hover,
.slides.full { background-color: <?php echo $this->textC ?> }

#map.bg { background: <?php echo $this->textC ?> !important }

.head ol.menu li ul li:hover,
.head ol.menu li.active,
.head ol.menu li.current-menu-item { border-color: <?php echo $this->textC ?> }

#contact input.err,
#contact textarea.err {
  color: <?php echo AStyles::blend($this->textC, '#ff0000') ?>;
}

.head ol.menu li ul li,
.media-container.border:before,
ol.items>li.active,
.section h4.bottom-pad,
.section h4.pad-big,
.section h4.pad,
hr,
.fieldset input,
.fieldset textarea,
.widget.widget_search input#s {
  border-color: <?php echo AStyles::lighten($this->textC, .75) ?>;
}

#contact .name:before,
#contact .mail:before,
#contact .msg:before,
#contact .name:after,
#contact .mail:after,
#contact .msg:after {
  background-color: <?php echo AStyles::lighten($this->textC, .75) ?>;
}

input,
textarea,
a { color: <?php echo $this->linkC ?> }

.fieldset input[type="submit"]:hover,
a:hover { background-color: <?php echo $this->linkBgC ?> }

.text-span.titles .next { border-left-color: <?php echo AStyles::lighten($this->textC, .75) ?>; }
.text-span.titles .next:active { border-left-color: <?php echo $this->textC ?> }

/* custom css */

<?php echo $this->css ?>
