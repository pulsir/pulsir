<?php
//if($_COOKIE['plluser'] == 'iweb [dev]'){

//}
//else{
//die('We\'re down for maintenance. Don\'t worry, we\'ll be back up in just a bit.');
//}
error_reporting(E_ALL);

$dirname = dirname($_SERVER['PHP_SELF']);

if($dirname = '/'){
require_once '_class/cms_class.php';
}
else {
require_once '../_class/cms_class.php';
}
$obj = new modernCMS();

// Postavlja vezu s databazom - varijable veze
$obj->host = 'localhost';
$obj->username = 'pulsir_sql1';
$obj->password = 'mT+3X)dT2ez1w%7*e8';
$obj->db = 'pulsir_sql';

// Spajanje na databazu
$obj->connect();
error_reporting(E_FATAL | E_ERROR);

?>
