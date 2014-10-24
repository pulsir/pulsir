<?php
include 'boot.php';
include '_class/totp.php'; //includes the twofactor authentication class
$totp = new Google2FA(); //two factor auth
if($obj->validate_session($_COOKIE['plluser'], $_COOKIE['psid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']) != 0){
	die(header('Location: /login?return=twofactor&e=sensitive'));
}
$vt = time() - 900;
if($obj->get_session_timestamp($_COOKIE['psid']) < $vt){
	die(header('Location: /login?return=twofactor&e=sensitive'));
}

if($_GET['tf-do'] == 'disable'){
	$obj->twofactor_disable($_COOKIE['plluser']);
}
$obj->get_page_header('whitey', 'Twofactor settings', 'Protect your Pulsir account even further.');
$obj->get_page_menu('whitey', $_COOKIE['plluser']);
if(isset($_POST['token-setup'])){
	$validate = $totp->verify_key($_POST['key'], $_POST['token-setup']);
	if($validate == true):
		$enc = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($_POST['password']), $key, MCRYPT_MODE_CBC, md5(md5($_POST['password']))));
		$obj->twofactor_set_secret($_COOKIE['plluser'], $enc);
		echo '<div class="alert alert-info">Everything set up! :D</div>';
	else:
		echo '<div class="alert alert-info">Sorry, that code didn\'t work. Try again.</div>';
	endif;

}


if($obj->twofactor_check($_COOKIE['plluser']) != 'true'){
	echo '<h1>Let\'s get you started on twofactor.</h1>';
	echo '<p>Twofactor means that you need to enter a code from your phone every time you log in.</p>';
	echo '<h3>First things first...</h3>';
	echo '<p>Install a twofactor app on your phone. We recommend Google Authenticator on Android, iOS and Blackberry (not supported on >7.0) devices or Microsoft Authenticator on Windows Phone.</p>';
	echo '<p>Download Google Authenticator: <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2">Android</a> &middot; <a href="https://itunes.apple.com/en/app/google-authenticator/id388497605?mt=8">iOS</a> &middot; links not available for BlackBerry</p>';
	echo '<p>Download Microsoft Authenticator: <a href="http://www.windowsphone.com/en-us/store/app/authenticator/e7994dbc-2336-4950-91ba-ca22d653759b">Windows Phone</a></p>';
	echo '<h3>When you\'ve done that...</h3>';
	echo '<p>Now, enter this code into the app:  <code>';
	$key = $totp->generate_secret_key();
	echo $key;
	echo '</code> or scan the QR code below: </p>';
  echo '<img src="http://www.google.com/chart?chs=200x200&chld=M|0&cht=qr&chl=otpauth://totp/twofactor for '.$_COOKIE['plluser'].' on pulsir?secret='.$key.'">';
	echo '<h3>If that\'s okay...</h3>';
	echo '<p>Your app should be generating a code. If it is, enter the code below: </p>';
	echo '<form action="twofactor.php" method="post"><input type="hidden" name="key" value="'.$key.'"><input type="password" name="password" placeholder="Enter your password that you log in with usually." class="form-control"><input type="number" name="token-setup" class="form-control" placeholder="Enter the 6-digit code from your phone."><input type="submit" class="btn btn-primary" value="Next &rarr;"></form>';
}
else{
	echo 'You already have twofactor set. <a href="?tf-do=disable">Disable twofactor</a>.';
	echo '<h3>Add another device.</h3>';
	$secret = $obj->twofactor_get_secret($_COOKIE['plluser']);
	var_dump($secret);
	$secret = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($_POST['password']), base64_decode($secret), MCRYPT_MODE_CBC, md5(md5($_POST['password']))), "\0");
	var_dump($secret);
	echo '<p>Install a twofactor app on your phone. We recommend Google Authenticator on Android, iOS and Blackberry (not supported on >7.0) devices or Microsoft Authenticator on Windows Phone.</p>';
	echo '<p>Download Google Authenticator: <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2">Android</a> &middot; <a href="https://itunes.apple.com/en/app/google-authenticator/id388497605?mt=8">iOS</a> &middot; links not available for BlackBerry</p>';
	echo '<p>Download Microsoft Authenticator: <a href="http://www.windowsphone.com/en-us/store/app/authenticator/e7994dbc-2336-4950-91ba-ca22d653759b">Windows Phone</a></p>';
	echo '<h3>When you\'ve done that...</h3>';
	echo '<p>Now, enter this code into the app:  <code>';
	$key = $secret;
	echo $key;
	echo '</code> or scan the QR code below: </p>';
  echo '<img src="http://www.google.com/chart?chs=200x200&chld=M|0&cht=qr&chl=otpauth://totp/twofactor for '.$_COOKIE['plluser'].' on pulsir?secret='.$key.'">';
  echo '<h3>If that\'s okay...</h3>';
	echo '<p>Your app should be generating a code. If it is, everything is set up. It should be the same as on your other devices. If not, just send us an email at say.hello@pulsir.eu. There\'s not a need to verify this activation :) </p>';
}
$obj->get_page_footer('whitey');  

