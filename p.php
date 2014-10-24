<?php
$salt = '9572186cd8f2e34eb43126434391bc77$1$mwI2qhKq$CzGzM43JmtvRWwKpbbl7..$1$CHBkox0S$nEoSlWNwnTB89.U0BRsax/3862f21b65bdb8d2223ef223a978ff6f3862f21b65bdb8d2223ef223a978ff6ff6ff879a322fe3222d8bdb56b12f2683883258566443752882';
include '_class/boot.php';
$pagetitle = $obj->get_title($_GET['id']);
$obj->get_page_header('whitey', $pagetitle, '');
$obj->get_page_menu('whitey', $_COOKIE['plluser']);
$obj->read_content($_GET['id']);
$obj->get_page_footer('whitey');
 
?>
