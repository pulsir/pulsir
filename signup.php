                                <?php
$salt = '9572186cd8f2e34eb43126434391bc77$1$mwI2qhKq$CzGzM43JmtvRWwKpbbl7..$1$CHBkox0S$nEoSlWNwnTB89.U0BRsax/3862f21b65bdb8d2223ef223a978ff6f3862f21b65bdb8d2223ef223a978ff6ff6ff879a322fe3222d8bdb56b12f2683883258566443752882';
$msg = '';
include '_class/boot.php';
if($obj->validate_session($_COOKIE['plluser'], $_COOKIE['psid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']) == 0){
	die('Um, you\'re logged in, honey.');
}
if($disable_signup != false){
	die('Sorry, signups are disabled while we deal with an emergency. ');
}

if($_POST['action']=='add'){
	if($obj->check_username_collisions($_POST['username']) == 0){
		$t1 = 'yup';
	}
	else{
		$t = 'username';
	}

	if($obj->check_username_reserved($_POST['username']) == 0){
		$t2 = 'yup';
	}
	else{
		$t = 'reserved';
	}

	if(($t1 == 'yup') && ($t2 == 'yup')){
		$obj->add_user($_POST);
		$t = 'yup';

	}
}



$obj->get_page_header('whitey', 'Sign up', 'Sign up for a Pulsir account');
if($disable_signup != false){
	die('Sorry, signups are disabled while we deal with an emergency. ');
}
?>


</head>
<body>
<div class="login">
 <?php
 if($t == 'yup'){
 ?>
<div class="container">
<form action="login.php" role="form">
 <h2>Great! Your account is now set up.</h2>
 <p>You can now log in and start posting.</p>
 <p>Need any help or want a custom domain or theme? Shoot us an email at say.hello@pulsir.eu and we'll be glad to help.</p>
 <input type="submit" id="submit" class="btn btn-primary" value="Log in and start posting &rarr;"><br>
 </form>
</div>
 <?php
 }
 elseif($t == 'csrf'){
?>
<div class="container">
<form action="http://pulsir.eu/report/csrf.php" role="form">
 <h2>Sorry, you can't do that.</h2>
 <p>Seems like you've been a victim of a CSRF attack - somebody tried to submit this form from another site, probably without your permission. CSRF attacks are dangerous, and we can't stop all of them. If you wanted to sign up, <a href="signup.php">click here</a>. If not, please click on the button below. </p>
 <input type="submit" id="submit" class="btn-primary" value="Report this attack to help us defend from them &rarr;"><br>
 </form>
</div>
<?php
}
 else{
 ?>
 <div class="container">
   <form action="signup.php" method="post" id="hash" role="form">
<div class="form-group">
<?php if($t=='username'){echo '<div class="alert alert-danger">There\'s an account with that username already.</div>';}elseif($t=='reserved'){echo '<div class="alert alert-danger">Whoa boy, you can\'t sign up with that username.</div>';}?>
    <h2>Hi.</h2>
<p>Let's start our new relationship.</p> 
</div>
<input type="hidden" name="action" id="action" value="add" />
<input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
<div class="form-group">
<label for="username">What's your name?</label>
<input type="text" name="username" id="username" placeholder="Will be your username. Choose wisely."  class="form-control" required />
</div>
<div class="form-group">
<label for="password">Choose a password.</label>
<input type="password" name="password" id="password" placeholder="Anything you want."  class="form-control" required />
</div>
<div class="form-group">
<label for="email">Email adress.</label>
<input type="email" name="email" id="email" placeholder="Important things only. Used for Gravatar." class="form-control" required />
</div>
<input type="submit" id="submit" class="btn btn-primary" value="Create an account &rarr;"><br>


</form> 
</div>
<?php
}

?>


</body>
</html>
                            