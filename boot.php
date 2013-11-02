<?php
error_reporting(E_FATAL | E_ERROR);

$dirname = dirname($_SERVER['PHP_SELF']);

if($dirname = '/'){
require_once '_class/cms_class.php';
}
else {
require_once '../_class/cms_class.php';
}
$obj = new modernCMS();

// Sets the database connection variables
$obj->host = 'localhost';
$obj->username = 'pulsir_sql1';
$obj->password = 'mT+3X)dT2ez1w%7*e8';
$obj->db = 'pulsir_sql';

// Connects to the database
$obj->connect();
error_reporting(E_FATAL | E_ERROR);

?>
