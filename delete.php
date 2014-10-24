<?php
include 'preferences.php';
include 'boot.php';
if($obj->validate_session($_COOKIE['plluser'], $_COOKIE['psid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']) != 0){
	die(header('Location: /login?return=delete&e=delete'));
}
$vt = time() - 240;
if($obj->get_session_timestamp($_COOKIE['psid']) < $vt){
	die(header('Location: /login?return=delete&e=delete'));
}
$obj->get_page_header('whitey', 'Delete your account', 'Sorry to see you go.');
$obj->get_page_menu('whitey', $_COOKIE['plluser']);
if($_POST['sure'] != 'true'){
	echo '<form action="delete.php" method="post"><input type="hidden" name="sure" value="true">';
	echo '<input type="hidden" name="token" value="'.$obj->get_session_csrf($_COOKIE['psid']).'">';
	echo '<h3>Sorry to see you go :\'(</h3>';
	echo '<p>By doing this, your whole Pulsir account and every single personal detail we store about you will be <b>deleted forever.</b></p>';
	echo '<p>You won\'t be able to recover your account. Your username will be stored in a table containing (just usernames of) deleted accounts and can\'t be used again.</p>';
	echo '<p>All of your posts will be deleted and can\'t be recovered. Export them if you want to keep them.</p>';
	echo '<p>All of the sessions linked to your account will be revoked.</p>';
	echo '<p>If you have any questions or concerns, please feel free to contact our friendly support team over at <a href="mailto:say.hello@pulsir.eu">say.hello@pulsir.eu</a>.';
	echo '<p>We\'d also love to know why you\'re leaving Pulsir. Please let us know over at <a href="mailto:say.hello@pulsir.eu">say.hello@pulsir.eu</a>.';
	echo '<p><b>If you understand all of this and agree to it, you can delete your account by click the button below.</b></p>';
	echo '<input type="submit" value="I understand. Delete my account and posts irrecovably and permanently." class="btn btn-danger"> <a href="/new.php">Um, not what I want.</a>';
	echo '</form>';

}
else{
	$csrf = $obj->validate_session_csrf($_POST['token'], $_COOKIE['psid']);
	if($csrf == true){
		$obj->delete_user($_COOKIE['plluser']);
		echo ':(';
	}
	else{
		echo '<div class="alert alert-danger">Oh boy, seems like you\'re a victim of a CSRF attack. Seems like someone tried to <b>delete your Pulsir account without your consent</b>. <a href="http://pulsir.eu/report/csrf.php">Please report this by clicking here and help us stop these attacks.</a></div>';
	}
}

$obj->get_page_footer('whitey');      
