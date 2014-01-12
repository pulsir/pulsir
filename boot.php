<?php
error_reporting(E_FATAL | E_ERROR);

$dirname = dirname($_SERVER['PHP_SELF']);

if ($dirname = '/') {
  require_once '_class/cms_class.php';
}
else {
  require_once '../_class/cms_class.php';
}
$obj = new modernCMS();

// Sets the database connection variables
$obj->host = 'localhost';
$obj->username = 'mastername';
$obj->password = 'masterpass';
$obj->db = 'pulsir';

// Connects to the database
$obj->connect();
