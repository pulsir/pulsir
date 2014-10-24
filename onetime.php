<?php
include '_class/totp.php';
$totp = new Google2FA();
$key = $totp->generate_secret_key();
echo $key;
echo '<img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data='.$key.'">';
