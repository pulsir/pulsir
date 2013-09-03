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
color:#fff;
font-size:32px;
text-align:right;
position:fixed;
top:1%;
left:95%;
}
.post, .post-body, p, span{
font-family: "Source Sans Pro", "Arial", sans-serif;
}
</style>

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

<!-- legal stuff -->
 <div id="tos" class="reveal-modal">
    <h2>Terms of Service</h2>
    <p>
     To keep Pulsir in order, you need to follow our Terms of Service. By using Pulsir, you agree that you will not:
<ul>
<li>break the laws of Republic of Croatia or the United States (especially discrimination/hatred-related laws, justifying or glorifying illegal acts, breaking copyright, pedophilia, abuse of animals etc.)
<li>advertising (just buy an ad, don<?php echo'\''; ?>t spam, ffs)</li>
<li>post spam</li>
<li>ignore bans, restore delete posts, smash our servers </li>
<li>troll or insult other users or provoke personal arguments</li>
<li>post other users' personal data.</li>
</ul>
All posts are opinions of their authors, not Pulsir itself or its moderators, of VlexoFree hosting or the authors of the Minima platform.
They can't be held responsible for their content, and our moderators are working on deleting posts that break the TOS, but they may not notice some posts or won't notice them at time. Please be aware of that and report all TOS-breaking posts at dev@pulsir.eu
<br><br>
Thanks.    </p>
    <a class="close-reveal-modal">×</a>
  </div></p>
  <div class="row">
    <div class="tvelwe columns">
         
<div class="plus"><a href="/add">+</a></div>
    

<div class="post">
  
 <?php
	
	$obj->get_content();
	
?>
</div>

 


<br><br><br><br><hr>
<p> 
 

           <p><a href="http://pulsir.eu/p?id=380">TOS</a> | <a href="http://pulsir.eu/privacy">Privacy</a></p>
  
  
 <a href="http://pulsir.eu"><p style="font-family:'Source Sans Pro', sans-serif;">pulsir</p></a>
</div>
<div class="heart"><3</div> </p><br>
      
      

      
  
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
            
