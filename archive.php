<?php
include 'preferences.php';
include 'boot.php';
if($obj->validate_session($_COOKIE['plluser'], $_COOKIE['psid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']) != 0){
	die(header('Location: /login?return=archive&e=sensitive'));
}
$vt = time() - 240;
if($obj->get_session_timestamp($_COOKIE['psid']) < $vt){
	die(header('Location: /login?return=archive&e=sensitive'));
}
$obj->get_page_header('whitey', 'Generate a backup archive', 'Making backups is important, and you can do it on Pulsir like this.');
$obj->get_page_menu('whitey', $_COOKIE['plluser']);
echo '<form action="generate-archive.php" method="post"><input type="hidden" name="sure" value="true">';
echo '<input type="hidden" name="token" value="'.$obj->get_session_csrf($_COOKIE['psid']).'">';
echo '<h1>Hi there!</h1>';
echo '<h3>It\'s always a good idea to back things up.</h3>';
echo '<p>This will export a lot of your data, a lot of which is quite sensitive. It will contain: all of the user data we have on you, all of the sessions we store on you, all of your posts (both private and public - anonymous posts won\'t get included (as they\'re anonymous, you know) and a lot of metadata about them in a single JSON file. We can\'t give you your password (as it\'s hashed), and we won\'t give you your two-factor shared secret for security reasons.</p>';
echo '<p>Apart from the above stated two-factor shared secret, this will contain everything we have about you, so you might want to keep it secret.</p>';
echo '<p>This make take from a few seconds to a few minutes, depending on the size of your Pulsir account. Just leave this tab loading, okay?</p>';
echo '<input type="submit" value="Okay, make an archive." class="btn btn-primary"> <a href="/new.php">Um, I changed my mind.</a>';
echo '</form>';



$obj->get_page_footer('whitey');      
