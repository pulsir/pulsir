<?php
include 'boot.php';
if($obj->validate_session($_COOKIE['plluser'], $_COOKIE['psid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']) != 0){
	die(header('Location: /login?return=new&e=lda'));
}
$obj->get_page_header('whitey', 'Update a post', '');
$obj->get_page_menu('whitey', $_COOKIE['plluser']);
if(isset($_POST['delete'])){
	$csrf = $obj->validate_session_csrf($_POST['token'], $_COOKIE['psid']);
	if($csrf == true){
		$obj->delete_post($_POST['delete'], $_COOKIE['plluser']);
		header('Location: /'.$_COOKIE['plluser'].'?show=deleted');
	}
}
$obj->get_page_footer('whitey');