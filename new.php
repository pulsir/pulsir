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

  <title>Fresh from the bakery -- Recently added on Pulsir</title>
  
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->
  
  <meta charset="utf-8" />
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

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,200' rel='stylesheet' type='text/css'>

<style>
.plus{
font-size:32px;
text-align:right;
position:fixed;
top:1%;
left:95%;
}

</style>

</head>
<body>

  <div class="row">
    <div class="twelve columns">
         
<div class="plus"><a href="/add">+</a></div>

<div class="post">
 <form action="index.php" method="post">
 				<input type="hidden" name="add" value="true" />
<div class="qw" style="margin-top:20px;">
<textarea name="body" placeholder="Just write." onclick="showElement('mt');"></textarea>
<div id="mt" style="display:none;">
<input type="text" name="title" id="title-field" class="ned title" placeholder="Add a title" />
<input type="submit" id="submit" class="button" value="Publish">
</div>
</div>
</form>

 <?php
	
	$obj->get_content();
	
?>
</div>

 


<div class="margin-top:8px;">
<p> 
 

           <p><a href="http://pulsir.eu/p?id=380">TOS</a> | <a href="http://pulsir.eu/privacy">Privacy</a></p>
  
  
 <a href="http://pulsir.eu"><p style="font-family:'Source Sans Pro', sans-serif;">pulsir</p></a>
</div>
<div class="heart"><3</div></div>
      <style>.vis{  transition: opacity 400ms; }</style>
      

      
  
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
            
