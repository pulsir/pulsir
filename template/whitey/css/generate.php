<?php
include 'estilo.php';
include 'constants.php';
if(on_the_fly == 'true'){
	header('Cache-Control: public');
	header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 86400) . ' GMT');
	header("Content-type: text/css");
}
$escss = new estilo();
$processed = $escss->put_together(default_file);
if(minify_generated_css == 'true'){
	$processed = $escss->minify($processed);
}
if(show_results_on_generator == 'true'){
	echo $processed;
}
file_put_contents(store_generated_css_in, $processed);