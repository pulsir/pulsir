<?php
include '_class/totp.php';
$totp = new Google2FA();
$token = $_POST['token'];
$InitalizationKey = "Y6KCFCEYFETKQH47";					// Set the inital key
/**
$TimeStamp	  = $totp->get_timestamp();
$secretkey 	  = $totp->base32_decode($InitalizationKey);	// Decode it into binary
$otp       	  = $totp->oath_hotp($secretkey, $TimeStamp);	// Get current token
**/
$key = $totp->verify_key($InitalizationKey, $token);
var_dump($otp);
echo '\n\n';
var_dump($token);
if($otp == $token){
	echo 'true';
}
else{
	echo 'false';
}

var_dump($key);

$init = $totp->generate_secret_key();
echo $init;
echo '<img src="http://www.google.com/chart?chs=200x200&chld=M|0&cht=qr&chl=otpauth://totp/twofactor on pulsir.local?secret='.$init.'">';


echo '<form action="verify.php" method="post"><input type="number" name="token" placeholder="token"><input type="submit" value="verify"></form>';