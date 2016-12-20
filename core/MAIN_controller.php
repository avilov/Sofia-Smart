<?php
session_start();
$base = $_SERVER['HTTP_HOST'];
$_SESSION['base'] = $_SERVER['HTTP_HOST'];
$_SESSION['trone'] = 'http://trone.work';
include_once 'connectDb.php';
include_once 'dbFns.php';
//include_once 'POST_controller.php';
?>
