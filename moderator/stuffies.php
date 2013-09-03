<?php
error_reporting(0);
$salt = '9572186cd8f2e34eb43126434391bc77$1$mwI2qhKq$CzGzM43JmtvRWwKpbbl7..$1$CHBkox0S$nEoSlWNwnTB89.U0BRsax/3862f21b65bdb8d2223ef223a978ff6f3862f21b65bdb8d2223ef223a978ff6ff6ff879a322fe3222d8bdb56b12f2683883258566443752882';
if(crypt($_COOKIE['plluser'].$_COOKIE['expon'], $salt) == $_COOKIE['psession']) {
if($_COOKIE['plluser'] == 'Vl@do') { $msg = ''; }
elseif($_COOKIE['plluser'] == 'max360se') { $msg = ''; }
elseif($_COOKIE['plluser'] == 'jazavac') { $msg = ''; }
elseif($_COOKIE['plluser'] == 'iweb [dev]') { $msg = ''; }
else { die(); }
}

else {
die ();
}
?>
<?php
include '../_class/boot.php';
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
<h3>Osnovni podatci o Pulsiru</h3>
<h4>Trenutni moderatori</h4>
<p><a href="http://pulsir.eu/iweb">iweb</a><br><a href="http://pulsir.eu/max360se">max360se</a><br><a href="http://pulsir.eu/vlado">Vl@do</a></p>
<h4>Sustav</h4>
<p>Pulsir je baziran na Minimi i pisan u PHP-u. <br> Trenutno smo hostani kod VlexoFree hostinga, free hosting u zamjenu za linkback i reklame. Tako je, svi novci idu njima. </p>
<h4>Bilješke</h4>
:D
</div>


</body>
<html>
