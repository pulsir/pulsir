<?php error_reporting(E_ALL); ?>

<?php 

$salt = '9572186cd8f2e34eb43126434391bc77$1$mwI2qhKq$CzGzM43JmtvRWwKpbbl7..$1$CHBkox0S$nEoSlWNwnTB89.U0BRsax/3862f21b65bdb8d2223ef223a978ff6f3862f21b65bdb8d2223ef223a978ff6ff6ff879a322fe3222d8bdb56b12f2683883258566443752882'; ?>
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
header('Location: http://pulsir.eu/login?return=add&e=ae');
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

<style>
p, h1, h2, h3, h4, h5{
color:#000 !important;
}
</style>


 <!-- <script src="javascripts/modernizr.foundation.js"></script> -->

  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <script src="http://pulsir.eu/assets/redactor-js-master/lib/jquery-1.9.0.min.js"></script>
 <link rel="stylesheet" href="http://pulsir.eu/assets/redactor-js-master/redactor/redactor.css" /> <script src="http://pulsir.eu/assets/redactor-js-master/redactor/redactor.min.js"></script> <script type="text/javascript"> $(document).ready( function() { $('#body-field').redactor(); } ); </script>

</head>
<body>





    
    <?php
	
include 'bform.php';
	
    ?>
   
<hr>
  <div class="row">
    <div class="twelve columns">
           <p> <a href="http://pulsir.eu"><h3 class="plsr">pulsir</h3></a> <a href="http://pulsir.eu/p?id=380">TOS</a> | <a href="http://pulsir.eu/privacy">Privacy</a></p>
<small><i>wysiwyg editor: redactor (an older, opensource version)</i></small>
    </div>
  </div>
  


      

      
      
  
  <!-- Included JS Files (Uncompressed) -->

  
  
  <script src="javascripts/app.js"></script>
  

  
  
  
 
</body>
</html>
            
