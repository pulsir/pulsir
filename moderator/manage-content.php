<?php 
error_reporting(0);
$salt = '9572186cd8f2e34eb43126434391bc77$1$mwI2qhKq$CzGzM43JmtvRWwKpbbl7..$1$CHBkox0S$nEoSlWNwnTB89.U0BRsax/3862f21b65bdb8d2223ef223a978ff6f3862f21b65bdb8d2223ef223a978ff6ff6ff879a322fe3222d8bdb56b12f2683883258566443752882';
if(crypt($_COOKIE['plluser'].$_COOKIE['expon'], $salt) == $_COOKIE['psession']) {
if($_COOKIE['plluser'] == 'somemod') { $msg = ''; }

else { die(); }
}

else {
die ();
}
include '../boot.php';
 ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UFT-8" />
<title>Pulsir CMS</title>
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
