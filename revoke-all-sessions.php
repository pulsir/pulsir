<?php
include 'preferences.php';
include 'boot.php';
if($obj->validate_session($_COOKIE['plluser'], $_COOKIE['psid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']) != 0){
	die(header('Location: /login?return=revoke-all-sessions&e=sensitive'));
}
$vt = time() - 240;
if($obj->get_session_timestamp($_COOKIE['psid']) < $vt){
	die(header('Location: /login?return=revoke-all-sessions&e=sensitive'));
}
$obj->get_page_header('whitey', 'Revoke user sessions', '');
$obj->get_page_menu('whitey', $_COOKIE['plluser']);
if($_POST['sure'] != 'true'){
	echo '<form action="revoke-all-sessions.php" method="post"><input type="hidden" name="sure" value="true">';
	echo '<input type="hidden" name="token" value="'.$obj->get_session_csrf($_COOKIE['psid']).'">';
	echo '<h3>Worried about account security? <b>Revoke all active and archived sessions.</b></h3>';
	echo '<p>This will log you out on all devices, including this one. You should do this if you\'ve left yourself logged in somewhere or if your account may be compromised.</p>';
	echo '<p>Need any help in keeping your account safe? Send us an email on say.hello@pulsir.eu and we\'ll be glad to help.</p><br>';
	echo '<input type="submit" value="Okay, revoke all sessions" class="btn btn-primary"> <a href="/new.php">Um, not what I want.</a>';
	echo '</form>';

}
else{
	$csrf = $obj->validate_session_csrf($_POST['token'], $_COOKIE['psid']);
	if($csrf == true){
		$obj->revoke_sessions($_COOKIE['plluser']);
		echo 'Done! You should turn on two factor authentification in Settings if you want to keep your account more secure.';
	}
	else{
		echo '<div class="alert alert-danger">Oh boy, seems like you\'re a victim of a CSRF attack. Seems like someone tried to <b>revoke all sessions for your account without your consent</b>. <a href="http://pulsir.eu/report/csrf.php">Please report this by clicking here and help us stop these attacks.</a></div>';
	}
}

$obj->get_page_footer('whitey');      
