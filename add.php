<?php error_reporting(0); ?>
<?php $salt = '9572186cd8f2e34eb43126434391bc77$1$mwI2qhKq$CzGzM43JmtvRWwKpbbl7..$1$CHBkox0S$nEoSlWNwnTB89.U0BRsax/3862f21b65bdb8d2223ef223a978ff6f3862f21b65bdb8d2223ef223a978ff6ff6ff879a322fe3222d8bdb56b12f2683883258566443752882'; ?>
<?php if(crypt($_COOKIE['plluser'].$_COOKIE['expon'].$_COOKIE['pllgroup'], $salt) == $_COOKIE['psession']):
if($_COOKIE['pllgroup'] == 'creators') {
$canpost = 1;
}
elseif($_COOKIE['pllgroup'] == 'moderators') {
$canpost = 1;
}


else {
$canpost = 0;
}
endif;

if($canpost == 0) {
header('Location: http://pulsir.eu/login');
}
 ?>

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

  <title>Add a post -- Pulsir</title>
  
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
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200|Inika' rel='stylesheet' type='text/css'>

<!-- loads the all-awesome wysihtml5 editor --!>
<!-- wysihtml5 parser rules -->
<script src="assets/wysi/parser_rules/advanced.js"></script>
<!-- Library -->
<script src="assets/wysi/dist/wysihtml5-0.3.0.min.js"></script>

<script>
$(document).ready(function(){
    $('#body-field').autosize();
});
</script>
</head>
<body>

  <div class="row">
    <div class="twelve columns">
      <h2></h2>
      <p></p>
      <br />
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

         <center>

    

<div class="post">






    
    <?php
	
include 'addtemp.php';
	
    ?>
   <?php
	if($_POST['add']):
		$obj->add_content($_POST);
	elseif($_POST['update']):
		echo 'Sorry, but you\'re still a wannabe haxxor. We won\'t just give update rights. <br> -- Hugs and killalls, Pulsir.';
	endif;
?>

<br><br><br><br><hr>
<p> 
</center>
  <div class="row">
    <div class="twelve columns">
           <p><a href="http://pulsir.eu/p?id=380>TOS</a> | <a href="http://pulsir.eu/privacy">Privacy</a></p>
    </div>
  </div>
  
 <a href="http://pulsir.eu"><h3 class="plsr">pulsir</h3></a>

      

      
      
  
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
            
