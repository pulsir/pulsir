<?php

include '_class/boot.php';

// Avatar Hash
$avhash = md5( strtolower( trim( "iweb@plsr.tk" ) ) );
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

  <title>iweb</title>
  
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->
  
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="stylesheets/foundation.min.css">
  <link rel="stylesheet" href="stylesheets/app.css">
 <link rel="stylesheet" href="stylesheets/profilepost.css">
<link rel="stylesheet" href="stylesheets/pv.css">


  <script src="../../javascripts/modernizr.foundation.js"></script>

  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200|Inika' rel='stylesheet' type='text/css'>



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
<div class="stuff">
<center>
<div class="user">
<h3 class="user"><a href="http://pulsir.eu/profile/iweb" class="circle">
	<?php
echo '<img src="http://www.gravatar.com/avatar/' . $avhash , '?r=pg&d=identicon&s=64" alt="">';
?>
</a><a href="http://pulsir.eu/profile/iweb"> iweb<span class="badge"> [dev]</span></a></h3>
<p>Geek, developer i obožavatelj (skoro) svega otvorenog koda.</p>
</center>
</div>
</div>

 
  <div class="row">
    
  
 <?php
	echo '<div class="post">';
		$obj->get_profile_iweb();
echo '</div>';
	?>


 


<br><br><br><br><hr>
<p> 
 </div>

</div>
<div class="hedfoo">
<div class="row">
<div class="twelve columns">


 <a href="http://pulsir.eu"><h3 class="plsr">pulsir</h3></a>
</div></div></div>
<div class="row">
<div class="twelve columns">
<div class="heart"><3</div> Background photo: London Eye by Fernando Garcaa Redondo </p><br>
      

    
</p></div></div>
    

      
      
      
  
  <!-- Included JS Files (Uncompressed) -->
  <!--
  
  <script src="../../javascripts/modernizr.foundation.js"></script>
  
  <script src="../../javascripts/jquery.js"></script>
  
  <script src="../../javascripts/jquery.foundation.mediaQueryToggle.js"></script>
  
  <script src="../../javascripts/jquery.foundation.reveal.js"></script>
  
  <script src="../../javascripts/jquery.foundation.orbit.js"></script>
  
  <script src="../../javascripts/jquery.foundation.navigation.js"></script>
  
  <script src="../../javascripts/jquery.foundation.buttons.js"></script>
  
  <script src="../../javascripts/jquery.foundation.tabs.js"></script>
  
  <script src="../../javascripts/jquery.foundation.forms.js"></script>
  
  <script src="../../javascripts/jquery.foundation.tooltips.js"></script>
  
  <script src="../../javascripts/jquery.foundation.accordion.js"></script>
  
  <script src="../../javascripts/jquery.placeholder.js"></script>
  
  <script src="../../javascripts/jquery.foundation.alerts.js"></script>
  
  -->
  
  <!-- Included JS Files (Compressed) -->
  <script src="../../javascripts/foundation.min.js"></script>
  
  <!-- Initialize JS Plugins -->
  <script src="../../javascripts/app.js"></script>
</body>
</html>
            
