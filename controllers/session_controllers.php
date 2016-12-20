<?php
if(!isset($_SESSION['time'])) $_SESSION['time'] = 10000;
else $_SESSION['time'] = $_SESSION['time'] + 50000;
$time = $_SESSION['time'];

if(!isset($_SESSION['referer'])) $_SESSION['referer'] = $_SERVER['HTTP_REFERER'];
$_SESSION['page'] = $_SERVER['REQUEST_URI'];

if(!isset($_SESSION['usertime'])) $_SESSION['usertime'] = date('H:i:s');
?>
