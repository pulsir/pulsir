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
<title>/user</title>
<link rel="stylesheet" href="../style.css" type="text/css">

</head>

<body>

<div id="page-wrap">
<?php include 'nav.php' ; ?>

<form method="post" action="index.php">
<input type="hidden" name="add" value="true" />
	<div>
<label for="title">Naslov:</label>
<input type="text" name="title" id="title" />
	</div>
	
	<div>
<label for="body">Sadrzaj objave:</label>
<textarea name="body" id="body" rows="8" cols="48"> </textarea>
	</div>

<div>
<label for="email">Adresa e-poste:</label>
<input type="text" name="email" id="email" />
</div>


<input type="submit" name="sumbit" value="Objavi" />
</form>


</body>
<html>
