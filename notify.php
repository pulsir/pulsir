<?php
include '_class/boot.php';
$obj->get_page_header('whitey', 'What\'s new', 'Recent notifications');
$obj->get_page_menu('whitey', $_COOKIE['plluser']);
include 'template/whitey/new_header.php';
if($obj->validate_session($_COOKIE['plluser'], $_COOKIE['psid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']) == 0){
$obj->get_notifications($_COOKIE['plluser']);
}
else{
die(header('Location: /login.php?e=notif'));
}
$obj->get_page_footer('whitey');      
?>