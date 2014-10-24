<?php
$notrack = 1; //don't show warnings here
$salt = '9572186cd8f2e34eb43126434391bc77$1$mwI2qhKq$CzGzM43JmtvRWwKpbbl7..$1$CHBkox0S$nEoSlWNwnTB89.U0BRsax/3862f21b65bdb8d2223ef223a978ff6f3862f21b65bdb8d2223ef223a978ff6ff6ff879a322fe3222d8bdb56b12f2683883258566443752882';
include 'preferences.php';
include 'boot.php';
if($obj->validate_session($_COOKIE['plluser'], $_COOKIE['psid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']) == 0){
	header('Location: '.$domainroot.'new');
}

$obj->get_page_header($activetheme, 'Blogging, reinvented', 'Pulsir makes writing a blog easy and beautiful. For free, forever.');
$obj->get_page_menu($activetheme, $_COOKIE['plluser'], 'index');



include 'template/'.$activetheme.'/index.php';


$obj->get_page_footer($activetheme);
