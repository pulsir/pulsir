<?php
if((file_exists("downtime.lock")) || (file_exists("../downtime.lock"))){
  die('Header: down.php'); // let's hope git isn't doing anything to that file.
}
error_reporting(E_ALL);
ini_set("display_errors", 0);

// leave these things alone. :(
$dirname = dirname($_SERVER['PHP_SELF']);
require_once '_class/cms_class.php';
require_once 'preferences.php';
require_once '_class/bugsnag/src/Bugsnag/Autoload.php';
if($dirname = '/'){
  require_once '_class/cms_class.php';
  require_once 'preferences.php';
  require_once '_class/bugsnag/src/Bugsnag/Autoload.php';
}
else {
  require_once '../_class/cms_class.php';
  require_once '../preferences.php';
  require_once '../_class/bugsnag/src/Bugsnag/Autoload.php';
}
$obj = new modernCMS();
$bugsnag = new Bugsnag_Client(bugsnagAPIKey);
$bugsnag->setReleaseStage(bugsnagReleaseStage);

set_error_handler(array($bugsnag, "errorHandler")); // use bugsnag for error handling
set_exception_handler(array($bugsnag, "exceptionHandler")); // yeah


// database connection things! :D change this! :D
$obj->host = 'localhost'; // the database server!
$obj->username = 'root'; // the user!
$obj->password = ''; // the password!
$obj->db = 'pulsir'; // the database

$obj->connect(); // let's connect to the database :D

error_reporting(E_ALL);


?>
