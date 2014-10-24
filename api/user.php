<?php
header('Content-Type: application/json');
include '../preferences.php';
include '../boot.php';
$obj->get_profile_api($_GET['user']);
