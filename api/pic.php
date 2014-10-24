<?php
include '../boot.php';
$link = 'http://www.gravatar.com/avatar/'.$obj->get_user_gravatar($row['author']).'?r=pg&d=identicon&s=64';
header('Location: '.$link.'');
