<?php
include '../../boot.php';
if(isset($_POST['pll_login_request'])){
	$obj->login_api_request_handler($_POST);
}