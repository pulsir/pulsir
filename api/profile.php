<?php
include '../boot.php';
	if(isset($_GET['profile'])):
		$obj->get_profile_api($_GET['profile']);
	else:
	 $obj->get_profile_api();

	endif;
?>
