<?php
include '../_class/cms_class.php';

$obj = new modernCMS();

// Postavlja vezu s databazom - varijable veze
$obj->host = 'localhost';
$obj->username = 'pulsir_sql1';
$obj->password = 'amadea';
$obj->db = 'pulsir_sql';

// Spajanje na databazu
$obj->connect();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UFT-8" />
<title>Modern - CMS for modern stuff</title>
<link rel="stylesheet" href="../style.css" type="text/css">

</head>

<body>

<div id="page-wrap">
<?php include 'nav.php' ; ?>

<?php
	if($_GET['delete']):
		$obj->delete_content($_GET['delete']);
	endif;
?>

<?=$obj->manage_content()?>


</body>
<html>
