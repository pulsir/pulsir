<?php
include 'boot.php';
if($obj->validate_session($_COOKIE['plluser'], $_COOKIE['psid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']) != 0){
	die(header('Location: /login?return=archive&e=sensitive'));
}
$vt = time() - 240;
if($obj->get_session_timestamp($_COOKIE['psid']) < $vt){
	die(header('Location: /login?return=archive&e=sensitive'));
}

$csrf = $obj->validate_session_csrf($_POST['token'], $_COOKIE['psid']);
if($csrf == true){
	header('Content-Type: application/json');
	echo '[';
	$obj->get_profile_export_api($_COOKIE['plluser']);
	echo ", \r\n";
	echo "\r\n";
	$obj->get_session_export_api($_COOKIE['plluser']);
	echo ", \r\n";
	echo "\r\n";
	$obj->get_user_export_api($_COOKIE['plluser']);
	echo ']';
		//$obj->delete_user($_COOKIE['plluser']);
		//echo ':(';
}
else{
	echo '<div class="alert alert-danger">Oh boy, seems like you\'re a victim of a CSRF attack. Looks like someone tried to <b>create a backup of your Pulsir account without your consent</b>. While it\'s a good idea to back things up, <a href="http://pulsir.eu/report/csrf.php">please report this by clicking here and help us stop these attacks as they can be dangerous</a>. And, if you want to, <a href="archive.php">you can create a backup archive anyway</a>.</div>';
}
