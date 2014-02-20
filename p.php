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

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title> <?php
	if(isset($_GET['id'])):
		$obj->get_title($_GET['id']);
	else:
	 echo 'Četiri, oh, četiri. Post nije određen.';
	endif;
?>
</title>
  
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->
  
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="stylesheets/foundation.min.css">
  <link rel="stylesheet" href="stylesheets/app.css">
 <link rel="stylesheet" href="stylesheets/profilepost.css">
<link rel="stylesheet" href="stylesheets/pv.css">

  <script src="javascripts/modernizr.foundation.js"></script>

  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
<meta charset="utf-8">


</head>
<body>

  <div class="row">
    <div class="twelve columns">
<div class="hedfoo">
      <h2></h2>
      <p></p>
      <br />
    </div>
  </div>
</div>

 
 
 <?php
	if(isset($_GET['id'])):
		$obj->read_content($_GET['id']);
	else:
	 echo '<h1>You didn\'t set a post ID.</h1>';
	endif;
?>

 


<?php
	if($_POST['add']):
		$obj->add_content($_POST);
	elseif($_POST['update']):
		echo 'Sorry, ali još si wannabe haxxor. Nećemo ti samo tako dati prava za update sadržaja. <br> -- Hugs and killalls, Pulsir.';
	endif;
?>
 
  
<div id="footer">

           <p><a href="http://pulsir.eu/p?id=380">TOS</a> | <a href="http://pulsir.eu/privacy">Privacy</a><br>
 <a href="http://pulsir.eu"><h3 class="plsr">pulsir</h3></a><br><p>Background photo: London Eye by Fernando Garcaa Redondo <div class="heart"><3</div>
</div>
 
      



      
      
  
  <!-- Included JS Files (Uncompressed) -->
  <!--
  
  <script src="javascripts/modernizr.foundation.js"></script>
  
  <script src="javascripts/jquery.js"></script>
  
  <script src="javascripts/jquery.foundation.mediaQueryToggle.js"></script>
  
  <script src="javascripts/jquery.foundation.reveal.js"></script>
  
  <script src="javascripts/jquery.foundation.orbit.js"></script>
  
  <script src="javascripts/jquery.foundation.navigation.js"></script>
  
  <script src="javascripts/jquery.foundation.buttons.js"></script>
  
  <script src="javascripts/jquery.foundation.tabs.js"></script>
  
  <script src="javascripts/jquery.foundation.forms.js"></script>
  
  <script src="javascripts/jquery.foundation.tooltips.js"></script>
  
  <script src="javascripts/jquery.foundation.accordion.js"></script>
  
  <script src="javascripts/jquery.placeholder.js"></script>
  
  <script src="javascripts/jquery.foundation.alerts.js"></script>
  
  -->
  
  <!-- Included JS Files (Compressed) -->
  <script src="javascripts/foundation.min.js"></script>
  
  <!-- Initialize JS Plugins -->
  <script src="javascripts/app.js"></script>
</body>
</html>
            
