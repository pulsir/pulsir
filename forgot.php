<?php
error_reporting(E_ALL);
$msg = 'It happens to the best of us. <br> Fill out the form below and we\'ll reset your password.';
require_once 'boot.php';
error_reporting(E_ALL);

		//login();
		/*echo $_SERVER['HTTP_HOST'];*/
		/*header( "Location: index.php?menu=loginfailed" );*/
		if(isset($_POST['username'])){
			$username=$_POST['username'];
			$queryUsers = "SELECT * FROM tblUser WHERE username='".$username."' LIMIT 1";
			$users = mysql_query($queryUsers) or die('Error, query failed '.$queryUsers);
			$user=mysql_fetch_array($users);

			//echo $username;

		
				if($user['email']==$_POST['email']){
$rpt == crypt($user['password'], $salt);

			$queryChange = "UPDATE tblUser SET password = '".$rpt."' WHERE id = '".$user['id']."'";
			mysql_query($queryChange) or die('Error, query failed '.$queryChange);

$message = 'Hi, '.$username.'. Your password has been changed to '.$rpt.' using the reset password mechanism.  Didn\'t request password change? Contact us at say.hello@pulsir.eu Thanks, -- Pulsir';
$message = wordwrap($message, 70, "\r\n");
mail($_POST['email'], 'You requested password change on Pulsir', $message);

				
				

$msg = '<div class="alert-box success">Great! Check your email. ;)</div>';		}	
			else
			{
                                sleep(3);
				$msg = '<div class="alert-box alert">That doesn\'t match. To prevent possible brute forcing, pages will load slower for you.</div>';
			}
		}
	
		
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

  <title>Reset your password -- Pulsir</title>
  
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
<link href='http://fonts.googleapis.com/css?family=Raleway:200' rel='stylesheet' type='text/css'>
     <script src="http://code.jquery.com/jquery-latest.js"></script>

<style>
body, html, h1 {
font-family: 'Raleway', sans-serif;
color: #fff;
}

.center {
position: fixed;
  left: 30%;
top: 15%
}

form {
background-color:#464646;
padding:15px;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
}
span{
text-align:right;
}
</style>

</head>
<body>

<div class="row">
<div class="center">
   <form action="forgot.php" method=post id="login">

    <h1>Forgot your password?</h1>
<?php echo $msg; ?>
<input type="text" name="username" id="username" placeholder="Username" required />
<input type="text" name="email" id="email" placeholder="Email" required />
<input type="submit" id="submit" class="small button" value="Reset &rarr;"><br><span><a href="/login">I know my password!</a></span>


</form> 
</div>
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