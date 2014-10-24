<?php

$r = $_SERVER['REQUEST_URI'];

$t = strpos($r, "?");
$h = strpos($r, "+");

if($t){
$g = substr($r, 0, $t);
$g = substr($g, 1);
$p = substr($r, $t);
}
elseif($h == 1 || $h == 2){
$topic = substr($r, 0, $h);
$url = 'http://pulsir.eu/topic.php?topic='.$topic;
header('Location: '.$url.'');
}
else{
$g = substr($r, 1);
//$p = substr($r, $t);
}
$d = $g.'.php'.$p;
$b = "r = ".$r."<br> t = ".$t."<br>g = ".$g."<br>d = ".$d;
//die($b);
// User data
$u = strpos($ud_username, ".php");
$ud_username = $_GET['user'];
$user = $_GET['user'];
//$f = $ud_username.'.php';
if(file_exists($g)){
die(header('Location: '.$d.''));
}
if(file_exists($g.'.php')){
die(header('Location: '.$d.''));
}
if(file_exists($_GET['user'])){
die(header('Location: '.$_GET['user'].''));
}
include '_class/boot.php';



// Avatar Hash
$avhash = md5( strtolower( trim( $obj->get_user_email($ud_username) ) ) );
if($_GET['show'] == 'deleted'){
	echo '<div class="alert alert-info">Post deleted.</div>';
}
$obj->get_page_header('whitey', $ud_username, $ud_username.'\'s Pulsir profile');
$obj->get_user_css($ud_username);
$obj->get_page_menu('whitey', $_COOKIE['plluser']);
if($_GET['show'] == 'deleted'){
	echo '<div class="alert alert-info">Post deleted.</div>';
}
echo '<p class="text-center h3">';
echo '<img src="http://www.gravatar.com/avatar/'.$avhash.'?r=pg&d=identicon&s=64" width="64" height="64" alt="Photo">  ';
echo htmlentities($ud_username).' ';
echo $obj->get_user_badges($ud_username).'</p>'; 
$obj->get_profile_posts($ud_username);
$obj->get_page_footer('whitey');

