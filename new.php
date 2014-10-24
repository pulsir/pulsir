<?php
include '_class/boot.php';
$obj->get_page_header('whitey', 'Fresh from the bakery', 'Recently added posts');
$obj->get_page_menu('whitey', $_COOKIE['plluser']);
include 'template/'.$activetheme.'/new_header.php';


	if($_POST['add']):
		$csrf = $obj->validate_session_csrf($_POST['token'], $_COOKIE['psid']);
		if($csrf == true){
			$obj->add_content($_POST);
		}
		else{
			echo '<div class="alert alert-danger">Oh boy, seems like you\'re a victim of a CSRF attack. Seems like someone tried to fake-post to your Pulsir account. <a href="http://pulsir.eu/report/csrf.php">Please report this by clicking here.</a></div>';
		}

	elseif($_POST['update']):
		$csrf = $obj->validate_session_csrf($_POST['token'], $_COOKIE['psid']);
		if($csrf == true){
			$obj->update_post($_POST);
		}
		else{
			echo '<div class="alert alert-danger">Oh boy, seems like you\'re a victim of a CSRF attack. Seems like someone tried to fake-edit some of your posts. <a href="http://pulsir.eu/report/csrf.php">Please report this by clicking here.</a></div>';
		}
	endif;

$obj->get_ad('feed');
$obj->get_content();
include 'template/'.$activetheme.'/new_footer.php';
$obj->get_page_footer('whitey');      
