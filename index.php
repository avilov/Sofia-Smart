<?
include_once "core/connectDb.php"; // соединение с базой
include_once "core/dbFns.php"; // подключаем функции выборки
// проверка и подключение языка
if($_GET['lang']) $lang = $_GET['lang'];
else $lang = 'ru';
include_once 'views/lang/'.$lang.'.php';
//
include_once "views/site.php"; // подключение главной страницы
?>