<?php
if($_GET['do']=='enable'){
setcookie('darkmode', 'enabled', time() + (86400 * 365));
}
if($_GET['do']=='disable'){
setcookie('darkmode', 'disabled', time() - 86400);
}
if($_COOKIE['darkmode'] == 'enabled'){
echo '<style>body{background-color:#000 !important;}body,p,div,pre,h1,h2,h3,h4,h5,span{color:#fff !important;}</style>';
echo 'Dark mode enabled. <a href="/dark?do=disable">Disable</a>';
}
else{
echo 'Dark mode disabled. <a href="/dark?do=enable">Enable</a>';
}
