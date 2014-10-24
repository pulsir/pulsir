<?php
/** ESTILO CONFIG FILE **/
define('default_file', 'main.elcss'); //sets the default estilo file, the file that estilo starts from, must be an .elcss file
define('show_results_on_generator', 'true'); //should estilo show the css it generates on generate.php?
define('store_generated_css_in', 'estilo-generated-css.css'); //where should estilo store the generated css? use /dev/null on linux to not store it
define('minify_generated_css', 'true'); //should estilo minify css automatically
define('on_the_fly', 'true'); //should estilo do everything on the fly - generate.php then serves as a CSS stylesheet - show_results_on_generator must be true for this to work
