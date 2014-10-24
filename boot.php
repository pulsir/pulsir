<?php

error_reporting(E_ALL);

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
$obj->username = 'justin'; // the user!
$obj->password = 'biebsisamazing'; // the password!
$obj->db = 'bieberdotcom'; // the database

$obj->connect(); // let's connect to the database :D

error_reporting(E_ALL);


?>
