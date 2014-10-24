<?php
include 'boot.php';
$session_thing = $obj->validate_session($_COOKIE['plluser'], $_COOKIE['psid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']);
echo $session_thing;
?>