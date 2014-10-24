<?php 
if(file_exists(install.lock)){
	die('It seems like Pulsir is already installed here. If that\'s not true, remove the install.lock file. If it is, remove the install/ folder.');
}
if($_POST['install'] == 'true'){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$server = $_POST['server'];
	$database = $_POST['database'];
	$con = mysql_connect($server, $username, $password) or die(mysql_error());
	mysql_select_db($database, $con) or die(mysql_error());
	$res = mysql_query(file_get_contents('../database.sql')) or die(mysql_error());
	echo 'Look, it seems like the database works! We just need to do one little thing. <a href="index.php?do=lock">Finish installing</a>';
	file_put_contents('works.installdata', crypt($username.$username, $server.$password));
}
if($_GET['do'] == 'lock'){
	if(file_exists('works.installdata')){
		file_put_contents('install.lock', 'installation finished at '.time().' :)');
		echo 'Yay :) We\'re done';
	}
	else{
		echo 'Uh, that\'s not right';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Let's install. — Pulsir</title>
	<meta description="Install Pulsir on your server">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/template/whitey/whitey.css">
	<link href="/template/whitey/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<form action="index.php#" method="post">
			<h1>Let's get started.</h1>
			<p>The database and the database user need to exist.</p>
			<p>This installer is in deep beta and should not be used if possible.</p> 
			<input type="hidden" name="install" value="true" />
			<input type="text" name="database" placeholder="Database" />
			<input type="text" name="user" placeholder="Username" />
			<input type="password" name="password" placeholder="Password" />
			<input type="text" name="server" placeholder="Server" />
			<input type="sumbit" value="Populate my database!" class="btn btn-primary" />
		</form>
      </div>
    <script src="http://oss.maxcdn.com/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="/template/whitey/whitey.js"></script>
  </body>



