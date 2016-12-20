<?php
$table = $_POST['table'];
$data = $_POST['id'];
require __DIR__.'/../../../core/connectDb.php';
require __DIR__.'/../../core/adminFns.php';
dbConnect(); // подключаемся к базе
$i = 1;
foreach ($data as $item){
    mysql_query(" UPDATE $table SET `num` = '$i' WHERE id='$item' ");
    $i++;
}
?>