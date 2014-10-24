                                <?php
include 'preferences.php';
include 'boot.php';

if($obj->validate_session($_COOKIE['plluser'], $_COOKIE['psid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']) != 0){
	header('Location: /login?return=add&e=ae');
}
elseif(!$_COOKIE['plluser']){
	header('Location: /login?return=add&e=ae');
}

$obj->get_page_header('whitey', 'Add a post', 'Write a poem, a journal, a travel blog or anything you want - with our beautiful writing experience.');
$obj->get_page_menu('whitey', $_COOKIE['plluser']);
$token = $obj->get_session_csrf($_COOKIE['psid']);
if(isset($_GET['update'])){
	$obj->verify_post_author($_COOKIE['plluser'], $_GET['update']);
	$data = $obj->get_post_data($_GET['update']);
	$data['title'] = str_replace("\\", "", $data['title']);
	$data['body'] = str_replace("\\", "", $data['body']);
	$data['tags'] == str_replace("\\", "", $data['tags']);	 
        $field = 'update';
	$value = htmlentities($_GET['update']);
}
else{
	$field = 'add';
	$value = 'true';
}
include 'template/whitey/add.php';
$obj->get_page_footer('whitey');
?>

            

                            