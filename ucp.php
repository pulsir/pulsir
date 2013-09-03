<?php error_reporting(0); ?>
<?php $salt = '9572186cd8f2e34eb43126434391bc77$1$mwI2qhKq$CzGzM43JmtvRWwKpbbl7..$1$CHBkox0S$nEoSlWNwnTB89.U0BRsax/3862f21b65bdb8d2223ef223a978ff6f3862f21b65bdb8d2223ef223a978ff6ff6ff879a322fe3222d8bdb56b12f2683883258566443752882'; ?>
<?php if(crypt($_COOKIE['plluser'].$_COOKIE['expon'].$_COOKIE['pllgroup'], $salt) == $_COOKIE['psession']):
if($_COOKIE['pllgroup'] == 'creators') {
$canpost = 1;
}
elseif($_COOKIE['pllgroup'] == 'moderators') {
$canpost = 1;
}


else {
$canpost = 0;
}
endif;

if($canpost == 0) {
header('Location: http://pulsir.eu/login');
}

$ucp_user = $_COOKIE['plluser'];
 ?>

