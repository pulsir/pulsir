<?php
$dirname = dirname($_SERVER['PHP_SELF']);

if($dirname = '/'){
require_once 'boot.php';
}
else {
require_once '../boot.php';
}
?>
                            