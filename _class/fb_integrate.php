<?php
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
?>
<div class="fb-like" data-send="true" data-layout="button_count" data-width="450" data-show-faces="true"></div>
<!-- Likesyes and Sendseys buttons ^^ -->
<div class="fb-comments" data-href="<?php
  echo curPageURL();
?>" data-num-posts="2" data-width="470"></div>
<!-- Facebook Comments ^^ -->