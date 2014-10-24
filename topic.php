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



<style>
.plus{
font-size:32px;
text-align:right;
position:fixed;
top:1%;
left:95%;
}
.postlist, .postlistitem{
list-style-type: none;
}

</style>

</head>
<body>

  <div class="row">
    <div class="twelve columns">
         
<div class="plus"><a href="/add">+</a></div>

<div class="post">
<?php $salt = '9572186cd8f2e34eb43126434391bc77$1$mwI2qhKq$CzGzM43JmtvRWwKpbbl7..$1$CHBkox0S$nEoSlWNwnTB89.U0BRsax/3862f21b65bdb8d2223ef223a978ff6f3862f21b65bdb8d2223ef223a978ff6ff6ff879a322fe3222d8bdb56b12f2683883258566443752882';
$ct = $_COOKIE['pllsessionid'];
$t = time();
$token = sha1(crypt(sha1(crypt($t, $salt)), $ct));
setcookie('pllcsrfitoken', $token, time()+2700);
setcookie('pat', $t, time()+2700); ?>
 <form action="index.php" method="post">
 				<input type="hidden" name="add" value="true" />
<input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
<div class="qw" style="margin-top:20px;">
<textarea name="body" placeholder="Just write." onclick="showElement('mt');"></textarea>
<div id="mt" style="display:none;">
<input type="text" name="title" id="title-field" class="ned title" placeholder="Add a title" />
<input type="submit" id="submit" class="button" value="Publish">
</div>
</div>
</form>
<div class="row">
<div class="six columns">
<h3>Your latest posts</h3>
<hr>
<?php if($_COOKIE['plluser']){
$obj->get_profile_latest_titles($_COOKIE['plluser']);
}
else{
echo '<p><a href="/login">Log in</a> to see your latests posts.</p>';
}
?>
</div>
<div class="six columns">
<h3>Recommended posts</h3>
<hr>
<ul class="postlist">
<li class="postlistitem"><a href="http://pulsir.eu/p.php?id=445">A lot of changes</a><br><i class="metadata">by iweb [dev]</i></li>
<li class="postlistitem"><a href="http://pulsir.eu/p.php?id=408">Razlika izmedju get i post metode - PHP</a><br><i class="metadata">by hightech</i></li>
<li class="postlistitem"><a href="http://pulsir.eu/p.php?id=431">Vjera na Facebooku</a><br><i class="metadata">posted anonymously</i></li>
<li class="postlistitem"><a href="http://pulsir.eu/p.php?id=434">Great TV shows you should go watch now</a><br><i class="metadata">by iweb [dev]</i></li>
<li class="postlistitem"><a href="http://pulsir.eu/p.php?id=384">Check the integrity of your data with hashing</a><br><i class="metadata">by max360se</i></li>
</ul>

</div>
</div>
<h3>Just posted</h3>
<hr>
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
            
