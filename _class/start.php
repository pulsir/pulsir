<?php

include '_class/cms_class.php';

$obj = new modernCMS();

// Postavlja vezu s databazom - varijable veze
$obj->host = 'localhost';
$obj->username = 'root';
$obj->password = '';
$obj->db = 'pulsir_sql';

// Matični URL stranice
$url = 'http://localhost/pulsir';

// Spajanje na databazu
$obj->connect();
?>
