<?php
// ПРОВЕРКА ЯЗЫКА ------------------------------------------------------------------------------------------------------------------
if(isset($_GET['lang'])) {$lang = $_GET['lang'];}
else {$lang = 'ru';}
include 'views/lang/'.$lang.'.php';
// ПРОВЕРКА GET ЗАПРОСОВ -----------------------------------------------------------------------------------------------------------
if(!isset($_GET['view']) && !isset($_GET['uaview'])) {$view = 'index';}

if(isset($_GET['view'])) {$view = $_GET['view'];}
if(isset($_GET['page'])) {$page = $_GET['page'];}
if(isset($_GET['material'])) {$material = $_GET['material'];}

if(isset($_GET['uaview'])) {$view = $_GET['uaview'];}
if(isset($_GET['uapage'])) {$page = $_GET['uapage'];}
if(isset($_GET['uamaterial'])) {$material = $_GET['uamaterial'];}

// ПОДГОТОВКА ЛИНКОВ ---------------------------------------------------------------------------------------------------------------
if($view == 'index') {$link = '';}
else {$link = $view;}
if($page) {$link = $view.'/'.$page;}
if($material) {$link = $view.'/'.$page.'/'.$material;}
?>