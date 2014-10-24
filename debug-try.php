<?php
$username='admin';
$group = 'administrators';
$enccookie=crypt($username.$expon.$group, $salt);
setcookie('plluser', $username, $expt);
setcookie('psession', $enccookie, $expt);
setcookie('pllgroup', $group, $expt); 
setcookie('expon',$expon,$expt);
setcookie('psid', 10, $expt);