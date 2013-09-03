<?php
include '../boot.php';
	if(isset($_GET['id'])):
		$obj->get_content_api($_GET['id']);
	else:
	 $obj->get_content_api();

	endif;
?>
