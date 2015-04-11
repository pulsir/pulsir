<?php

error_reporting(E_ALL);
ini_set("display_errors", 0);

// leave these things alone. :(
$dirname = dirname($_SERVER['PHP_SELF']);
require_once '_class/cms_class.php';
require_once 'preferences.php';
if($dirname = '/'){
require_once '_class/cms_class.php';
require_once 'preferences.php';
}
else {
require_once '../_class/cms_class.php';
require_once '../preferences.php';
}
$obj = new modernCMS();

// database connection things! :D change this! :D
$obj->host = 'localhost'; // the database server!
$obj->username = 'root'; // the user!
$obj->password = ''; // the password!
$obj->db = 'pulsir'; // the database

$obj->connect(); // let's connect to the database :D

error_reporting(E_ALL);


?>
