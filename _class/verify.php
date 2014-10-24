<?php
include '_class/totp.php';
$totp = new Google2FA();
$token = $_POST['token'];
$key = $totp->verify_key('NEN4XFZF2PQE5THT', $token);
echo $key;

echo '<form action="verify.php" method="post"><input type="number" placeholder="token"><input type="submit" value="verify"></form>';