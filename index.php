<?php

include '_class/boot.php';


?>
<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Pulsir is a simple, open source platform for blogging. It's highly customizable and we only approve the best blogs, so there are no crazy groupies and cactus lovers." />
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Blogs, reinvented.</title>
  
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->

  <link rel="stylesheet" href="stylesheets/foundation.min.css">
  

  <style>.body{background-color:#fff;}</style>

  <script src="javascripts/modernizr.foundation.js"></script>


  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->


<meta name="google-site-verification" content="lyjU3KsLakf35VgIofkNQbpL_NHLuQJcjY4iUu7VTxw" />


</head>
<?php
	if($_POST['add']):
echo '<div class="alert-box secondary">';
		$obj->add_content($_POST);
echo '<a href="" class="close">&times;</a></div>';
	elseif($_POST['update']):
		$obj->update_content($_POST);
	endif;
if ($_POST['action']=='add'):
$obj->add_user($_POST);
endif;
?>

<body class="home">

<div class="row">
<div class="twelve columns">
<h2>Pulsir makes blogging simple again.</h2>
<p>Just log in and start writing. No update prompts, no ads and you don't have to worry about hosting and uptime. Packed in a beautiful interface, for free, forever.</p>
<p><a href="/login">Log in</a> &middot; <a href="/new">New posts</a> &middot; <a href="http://eepurl.com/KfALL">Request an invite</a></p>
</div>
</div>



  <div class="row">
    <div class="twelve columns" style="margin-top:50px;">

 <a href="http://legal.pulsir.eu">Legal things <span style="color:green;">(updated)</span></a> | <a href="http://support.pulsir.eu">Support forums</a> | <a href="mailto:say.hello@pulsir.eu">Shoot us an email</a> | <a href="http://pulsir.eu/report">Report something</a> | <a href="http://pulsir.eu/team">Team</a> <br> Friends: <a href="http://internetdefenseleague.org">The Internet Defense Leauge</a> &middot; <a href="http://linuxzasve.com">Linux za sve</a>&middot; <a href="http://webserveri.info">Webserveri</a><br><p><span class="heart" style="color: red;"><3</div></p><br></small>
 </p>
   
  </div>
  




      
 
</div>

  
  <!-- Included JS Files (Compressed) -->
  <script src="javascripts/foundation.min.js"></script>
  
  <!-- Initialize JS Plugins -->
  <script src="javascripts/app.js"></script>

</body>
</html>
            
