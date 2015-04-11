<?php
include 'preferences.php';
include 'boot.php';
include '_class/totp.php'; //includes the twofactor authentication class
$cid = md5($_COOKIE['pllsessionx'].$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
$totp = new Google2FA(); //two factor auth
if($_GET['action'] == 'logout'){
	setcookie('plluser', 'sharknadoisdabest', 1);
	setcookie('psession', 'wat', 1);
	setcookie('pllgroup', 'loggedoutbich', 1); 
	setcookie('expon','nope',1);
	setcookie('psid','-1', 1);
	$obj->revoke_session($cid);
	setcookie('pllsessionx', 'justkidding', 1);


	$msg = '<p>You\'ve been logged out.</p>';
}
if($disable_login != false){
	die('Sorry, logins are disabled while we deal with an emergency. You can still use Pulsir on a device where you\'re logged in until we fix this.');
}
$expon = time() + 259200;
$expt = time() + (259200 * 7);
$notrack = 1;
$salt = '9572186cd8f2e34eb43126434391bc77$1$mwI2qhKq$CzGzM43JmtvRWwKpbbl7..$1$CHBkox0S$nEoSlWNwnTB89.U0BRsax/3862f21b65bdb8d2223ef223a978ff6f3862f21b65bdb8d2223ef223a978ff6ff6ff879a322fe3222d8bdb56b12f2683883258566443752882';
$salt2 = '$2a$07$9572186cd8f2e34eb43126434391bc77$1$mwI2qhKq$CzGzM43JmtvRWwKpbbl7..$1$CHBkox0S$nEoSlWNwnTB89.U0BRsax/3862f21b65bdb8d2223ef223a978ff6f3862f21b65bdb8d2223ef223a978ff6ff6ff879a322fe3222d8bdb56b12f2683883258566443752882';
$msg = '';
if($_GET['e'] == 'ae'){
	$msg = '<div class="alert alert-info"><p>To use the advanced post editor, you\'ll need to log in.</p></div>'; 
}
if($_GET['app'] == 'android'){
	$msg = '<div class="alert alert-info"><p><b>Pulsir for Android</b> is requesting access to your account.</p></div>';
	$expt = time()+31536000;
}
if($_GET['app'] == 'ucp'){
	$msg = '<div class="alert alert-info"><p>To use the <b>User Control Panel</b>, you\'ll need to log in.</p></div>';
//$expt = time()+31536000;
}
if($_GET['app'] == 'hash'){
	$msg = '<div class="alert alert-info"><p><b>Hash by Pulsir</b> is requesting access to your account. (To use Hash, you need to be a member of the <b>moderators</b> group)</p></div>';
}
if($_GET['e'] == 'notoken'){
	$msg = '<div class="alert alert-info">You have two-factor authentication enabled. Log in again and enter the token.</div>';
}
if($_GET['e'] == 'delete'){
	$msg = '<div class="alert alert-info">To delete your account, you\'ll need to log in again.</div>';
}
if($_GET['e'] == 'sensitive'){
	$msg = '<div class="alert alert-info">To view, modify, delete or export sensitive account information, you\'ll need to log in again.</div>';
}
if($_GET['e'] == 'lda'){
	$msg = '<div class="alert alert-info">Please log in and do that again.</div>';
}
if($_GET['show'] == 'twofactor'){
	$showtf = true;
}
if($_GET['request'] == 'jwt'){
  $msg = '<div class="alert alert-info">Log in with your Pulsir account to use this application. The application did not provide any details about itself.</div>';
  if(isset($_GET['jwt_request_app'])){
    $msg = '<div class="alert alert-info">To use the app <b>'.$_GET['jwt_request_app'].'</b>, log in with your Pulsir account.</div>';
  }
  $msg .= '<div class="alert alert-info">This app will <b>know your Pulsir username, email and your Pulsir avatar</b>. It <b>will not know your password</b>, and it will not be able to post to or manage your Pulsir account.</div>';
  $jwtPrepare = true;
}
if(isset($_POST['username']))
{
		//login();
	/*echo $_SERVER['HTTP_HOST'];*/
	/*header( "Location: index.php?menu=loginfailed" );*/
	if(isset($_POST['username']) && !isset($_POST['newUser'])) 
	{
		$username=mysql_real_escape_string($_POST['username']);
		$queryUsers = "SELECT * FROM tblUser WHERE username='".$username."' LIMIT 1";
		$users = mysql_query($queryUsers) or die('Error, query failed '.$queryUsers);
		$user=mysql_fetch_array($users);
		if ($user['group'] == 'banned')
 {
die(include 'template/whitey/banned.php');
}
		if($obj->count_recent_failed_attempts($username) >= 3){
			die('Sorry, this account is in lockdown mode due to 3 or more failed login attempts. You can try to log in again in about half an hour.');
		}
			//echo $username;

		if($user['password']==crypt($_POST['password'], $salt))
		{

			if(($obj->twofactor_check($_POST['username']) == true) && (isset($_POST['token']) == false)){die(header('Location: login.php?show=twofactor&e=notoken'));}
			if($_POST['tf'] == 'true'){
				if(isset($_POST['token'])){
					$secret = $obj->twofactor_get_secret($_POST['username']);
					$secret = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($_POST['password']), base64_decode($secret), MCRYPT_MODE_CBC, md5(md5($_POST['password']))), "\0");
					$validate = $totp->verify_key($secret, $_POST['token']);
					if($validate != true){
						$obj->set_user_session($username, '0.0.0.0', 'pulsir_failed_login_attempt', time());
						die('<div class="alert alert-danger">That token isn\'t valid. <a href="login.php?show=twofactor&e=notoken">Try again.</a></div>');
					}
				}
				else{
					die('<div class="alert alert-danger">Whoa, you need to enter that token. <a href="login.php?show=twofactor&e=notoken">Try again.</a></div>');

				}
			}
			$username=mysql_real_escape_string($_POST['username']);
			$group = $user['group'];
			$enccookie=crypt($username.$expon.$group, $salt);
			setcookie('plluser', $username, $expt);
			setcookie('psession', $enccookie, $expt);
			setcookie('pllgroup', $group, $expt); 
			setcookie('expon',$expon,$expt);
			$sessionid = $obj->set_user_session($username, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], time());
			if($user['verif'] == 4){setcookie('betatester', md5($username), $expt);}
			setcookie('psid', $sessionid, $expon);
			if($_POST['return'] == 'twofactor'){echo '<form action="twofactor.php" method="post"><input type="hidden" name="password" value="'.$_POST['twofactor'].'"><input type="submit" class="btn btn-primary" value="Continue to twofactor settings &rarr;"></form><p>We can\'t properly redirect you to this page, sorry.';}
			else{ $msg = '<script type="text/javascript">

				window.location = "'.$domainroot.htmlentities($_POST['return']).'"

		</script>';	}

	}
	elseif($user['password']==crypt($_POST['password'], $salt2)){

		if(($obj->twofactor_check($_POST['username']) == true) && (isset($_POST['token']) == false)){die(header('Location: login.php?show=twofactor&e=notoken'));}
		if($_POST['tf'] == 'true'){
			if(isset($_POST['token'])){
				$secret = $obj->twofactor_get_secret($_POST['username']);
				$secret = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($_POST['password']), base64_decode($secret), MCRYPT_MODE_CBC, md5(md5($_POST['password']))), "\0");
				$validate = $totp->verify_key($secret, $_POST['token']);
				if($validate != true){
					$obj->set_user_session($username, '0.0.0.0', 'pulsir_failed_login_attempt', time());
					die('<div class="alert alert-danger">That token isn\'t valid. <a href="login.php?show=twofactor&e=notoken">Try again.</a></div>');
				}
			}
			else{
				die('<div class="alert alert-danger">Whoa, you need to enter that token. <a href="login.php?show=twofactor&e=notoken">Try again.</a></div>');

			}
		}
		$username=mysql_real_escape_string($_POST['username']);
		$group = $user['group'];
		$enccookie=crypt($username.$expon.$group, $salt);
		setcookie('plluser', $username, $expt);
		setcookie('psession', $enccookie, $expt);
		setcookie('pllgroup', $group, $expt); 
		setcookie('expon',$expon,$expt);
		if($user['verif'] == 4){setcookie('betatester', md5($username), $expt);}
		$sessionid = $obj->set_user_session($username, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], time());
		setcookie('psid', $sessionid, $expon);
		if($_POST['return'] == 'twofactor'){echo '<form action="twofactor.php" method="post"><input type="hidden" name="password" value="'.$_POST['twofactor'].'"><input type="submit" class="btn btn-primary" value="Continue to twofactor settings &rarr;"></form><p>We can\'t properly redirect you to this page, sorry.';}
		else{ $msg = '<script type="text/javascript">

			window.location = "'.$domainroot.htmlentities($_POST['return']).'"

	</script>';	}

}
elseif($user['password']==crypt($_POST['password'], $user['salt'])){

	if(($obj->twofactor_check($_POST['username']) == true) && (isset($_POST['token']) == false)){die(header('Location: login.php?show=twofactor&e=notoken'));}
	if($_POST['tf'] == 'true'){
		if(isset($_POST['token'])){
			$secret = $obj->twofactor_get_secret($_POST['username']);
			$secret = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($_POST['password']), base64_decode($secret), MCRYPT_MODE_CBC, md5(md5($_POST['password']))), "\0");
			$validate = $totp->verify_key($secret, $_POST['token']);
			if($validate != true){
				$obj->set_user_session($username, '0.0.0.0', 'pulsir_failed_login_attempt', time());
				die('<div class="alert alert-danger">That token isn\'t valid. <a href="login.php?show=twofactor&e=notoken">Try again.</a></div>');
			}
		}
		else{
			die('<div class="alert alert-danger">Whoa, you need to enter that token. <a href="login.php?show=twofactor&e=notoken">Try again.</a></div>');

		}
	}
	$_SESSION['username']=$username;
	$_SESSION['userId']=$user['id'];
	$username=mysql_real_escape_string($_POST['username']);
	$group = $user['group'];
	$enccookie=crypt($username.$expon.$group, $salt);
	setcookie('plluser', $username, $expt);
	setcookie('psession', $enccookie, $expt);
	setcookie('pllgroup', $group, $expt); 
	setcookie('expon',$expon,$expt);		
	if($user['verif'] == 4){setcookie('betatester', md5($username), $expt);}
	$sessionid = $obj->set_user_session($username, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], time());
	setcookie('psid', $sessionid, $expon);
	if($_POST['return'] == 'twofactor'){echo '<form action="twofactor.php" method="post"><input type="hidden" name="password" value="'.$_POST['twofactor'].'"><input type="submit" class="btn btn-primary" value="Continue to twofactor settings &rarr;"></form><p>We can\'t properly redirect you to this page, sorry.';}
	else{ $msg = '<script type="text/javascript">

		window.location = "'.$domainroot.htmlentities($_POST['return']).'"

</script>';	}
}


else
{
	sleep(3);
	$obj->set_user_session($username, '0.0.0.0', 'pulsir_failed_login_attempt', time());
	$msg = '<div class="alert-box alert">That doesn\'t match. To prevent possible brute forcing, pages will load slower for you.</div>';
}
}
else
{
	sleep(3);
	$msg = '<div class="alert-box alert">That doesn\'t match. To prevent possible brute forcing, pages will load slower for you.</div>';
}
}

$obj->get_page_header('whitey', 'Log in', 'Log in to access your Pulsir account');
include 'template/whitey/login.php';

                            