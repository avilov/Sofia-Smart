<?php
//print_r($_SERVER['HTTP_REFERER']);die;
//phpinfo();die;
//var_dump(gd_info());die;
//print_r(__DIR__);die;
include ('../core/connectDb.php');
include ('core/adminFns.php');
include ('core/regFns.php');
include ('views/lang/ru.php');
//echo "<pre>"; var_dump($_GET['action']);die();

//if(empty($_GET['view'])) $view = 'login';
if(!isset($_GET['view'])) {$view = 'main';}
else {$view = $_GET['view'];}
$idRow = $_GET['idRow'];
$id = $_GET['id'];
if(isset($_GET['action'])) {$action = $_GET['action'];}
else {$action = $_GET['id']; $id = $_GET['idRow'];}
//echo "<pre>"; var_dump($view);die();
session_start();
// Проверка пользователя ---------------------------------------------------------------------------------------------
if(!empty($_SESSION['username']) && ($_SESSION['status']) == 'admin') {
    $user = $_SESSION['username'];
// РЕДАКТИРОВАНИЕ ДАННЫХ В БАЗЕ -------------------------------------------------------------------------
    if(isset($_POST['edit'])) {
//        echo "<pre>"; var_dump($_POST);die;
        $id = $_POST['id'];
        $table = $_POST['table'];
        $oldImg = $_POST['oldImg'];
        if($_POST['password']) {$_POST['password'] = sha1(md5(clearData($_POST['password'])));} // шифруем пароль
        // удаляем не уже не нужные переменные из POST
        unset($_POST['edit']); unset($_POST['table']); unset($_POST['id']); unset($_POST['oldImg']);
        // формируем массив
        $count = 0;
            foreach ($_POST as $ArrKey => $ArrStr)
            {
                if(in_array($ArrKey, array('title_ru','descript_ru','title_ua','descript_ua'))) {
                    $ArrStr = htmlspecialchars($_POST[$ArrKey], ENT_QUOTES);
                } else {
                    $ArrStr = $_POST[$ArrKey];
                }
                $row[$count] = $ArrKey;
                $data[$count] = $ArrStr;
                $count ++;
            }
            
            if ($_FILES['filename']['name']) // если переменная содержит то что указанно
            {
                if(($table == 'users') && (empty($oldImg))) {}
                elseif(($table == 'users') && (!empty($oldImg))) {$pathImg = 'upload/users/'.$oldImg; unlink($pathImg);} // удаляем старую картинку
                elseif(!empty($oldImg)) {$pathImg = '../userfiles/'.$table.'/'.$oldImg; unlink($pathImg);} // удаляем старую картинку
                $img = uploadFile($table);
                // ---------------------------
                if($table == 'kvartiry') {$row[$count] = 'img0';}
                else {$row[$count] = 'img';}
                // ---------------------------
                $data[$count] = $img;
            }
            //echo "<pre>"; var_dump($table,$id,$row,$data);die();
//            die();
            unset($_POST);
            updateData($table,$id,$row,$data);
            $action = 'edit'; userLog($user,$table,$action); // ЗАПИСЬ ДЕЙСТВИЙ ПОЛЬЗОВАТЕЛЯ
    }
// ДОБАВЛЕНИЕ ДАННЫХ В БАЗУ -------------------------------------------------------------------------
    if(isset($_POST['add'])) {
//        echo "<pre>"; var_dump($_POST);die();
        $table = $_POST['table'];
        if($_POST['password']) {$_POST['password'] = sha1(md5(clearData($_POST['password'])));} // шифруем пароль
        // удаляем не уже не нужные переменные из POST
        unset($_POST['add']); unset($_POST['table']);
        // формируем массив
        $count = 0;
            foreach ($_POST as $ArrKey => $ArrStr)
            {
                if(in_array($ArrKey, array('title_ru','descript_ru','title_ua','descript_ua'))) {
                    $ArrStr = htmlspecialchars($_POST[$ArrKey], ENT_QUOTES);
                } else {
                    $ArrStr = $_POST[$ArrKey];
                }
                $row[$count] = $ArrKey;
                $data[$count] = "'".$ArrStr."'";
                $count ++;
                if(($ArrKey == 'title_ru') && ($table == 'news')) { // создание урл материала
                    $row[$count++] = 'url';
                    $data[$count++] = "'".translit($_POST['title_ru'])."'";
                }
                if (in_array($table, array('news','gallery','evolution','users','infrastructure','kvartiry','clubresidents'))) // если переменная содержит то что указанно
                {
                    $img = uploadFile($table,$typeNews);
                    if((!empty($img)) && ($row[$count] == 'img')) $data[$count] = uploadFile($table);
                    // ---------------------------
                    if($table == 'kvartiry') {$row[$count] = 'img0';}
                    else {$row[$count] = 'img';}
                    // ---------------------------
                    $data[$count] = "'".$img."'";
                }
            }
            unset($_POST);
//            echo "<pre>"; var_dump($table,$row,$data);die();
            $last = insertData($table,$row,$data);
            
            $action = 'insert'; userLog($user,$table,$action); // ЗАПИСЬ ДЕЙСТВИЙ ПОЛЬЗОВАТЕЛЯ
            
            $id = getLastData($table);
            $link = $table.'-edit/'.$id['id'];
            header('Location: '.$link);
    }
// ДОБАВЛЕНИЕ ФОТОГРАФИЙ В БАЗУ -------------------------------------------------------------------------
    if(isset($_POST['addfotos'])) {
        $id = $_POST['id'];
        if($_POST['table'] == 'news') {$table = 'newsfoto'; $date = $_POST['date'];}
        if($_POST['table'] == 'infrastructure') {$table = 'infrafoto';}
        
//        echo "<pre>"; var_dump($_POST);die();
        uploadMultiFiles($_FILES['filename'], $table, $id, $date);
        header('Location: '.$id);
    }
    if(isset($_POST['addgallery'])) {
        $table = 'gallery';
//        echo "<pre>"; var_dump($_POST);die();
        uploadFilesGallery($_FILES['filename'], $table);
        $action = 'load foto'; userLog($user,$table,$action); // ЗАПИСЬ ДЕЙСТВИЙ ПОЛЬЗОВАТЕЛЯ
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
    if(isset($_POST['delPhotos'])) {
        $table = ($_POST['table']);
        unset($_POST['delPhotos']);
        unset($_POST['table']);
//        echo "<pre>"; var_dump($_POST);die();
        $delfotos = $_POST;
        deleteFotos($table,$delfotos);
        $action = 'delete'; userLog($user,$table,$action); // ЗАПИСЬ ДЕЙСТВИЙ ПОЛЬЗОВАТЕЛЯ
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
// ---------------------------------------------------------------------------------------------------------------
    switch ($action)
    {
        // ---------------------------------------------------------------------------------------------------------------
        case "delete":
//            echo 'удаление записи';die;
//            echo $view.'-'.$category.'-'.$id.'-'.$action;die;
            $table = $view;
            deleteData($table,$id);
            $action = 'delete'; userLog($user,$table,$action); // ЗАПИСЬ ДЕЙСТВИЙ ПОЛЬЗОВАТЕЛЯ
            header('location:'.$_SERVER['HTTP_REFERER']);
        break;
        case "delete-foto":
//            echo 'удаление фотографии';
//            echo $view.'-'.$category.'-'.$id.'-'.$action;die;
            $table = 'newsfoto';
            deleteData($table,$id);
            $action = 'delete'; userLog($user,$table,$action); // ЗАПИСЬ ДЕЙСТВИЙ ПОЛЬЗОВАТЕЛЯ
            header('location:'.$_SERVER['HTTP_REFERER']);
        break;
        case "delete-foto-gallery":
//            echo 'удаление фотографии';
//            echo $view.'-'.$category.'-'.$id.'-'.$action;die;
            $table = 'gallery';
            deleteData($table,$id);
            $action = 'delete'; userLog($user,$table,$action); // ЗАПИСЬ ДЕЙСТВИЙ ПОЛЬЗОВАТЕЛЯ
            header('location:'.$_SERVER['HTTP_REFERER']);
        break;
    }
    switch ($view)
    {
        // ---------------------------------------------------------------------------------------------------------------
        case "exit": // выход из личного кабинета
        exitUser(); // вызываем функцию из db_fns.php
        $action = 'exit'; userLog($user,$table,$action); // ЗАПИСЬ ДЕЙСТВИЙ ПОЛЬЗОВАТЕЛЯ
        header('Location: login'); // перезагружаем на главную страницу
        break;
        // ---------------------------------------------------------------------------------------------------------------
        case "forgot": // восстановление пароля
            if(isset($_POST['send']) && !empty($_POST['username']) && !empty($_POST['email'])) // если нажата кнопка ОТПРАВИТЬ и поля не пустые то...
            {
                $user = clearData($_POST['username']); // ...принимаем значения в полях ...
                $email = clearData($_POST['email']); // ...принимаем значения в полях ...

                if(forgot($user,$email)) // если функция FORGOT возвращает TRUE...
                {
                    $pswd = rand(10000,99999); // генерируем новый пароль из 5 цифр...
                    $subject = "Восстановление пароля!"; // тема письма...
                    $msg = "Ваш временный пароль: ".$pswd.". Рекомендуме сменить временный пароль на более сложный!"; // сообщение...
                    $headers = "Content-type: text/html; charset=utf-8\r\n"; // кодировка письма...
                    mail($mail, $subject, $msg, $headers); // отправляем письмо...
                    // -------------------------------------------------------------
                    $pswd = sha1(md5('$pswd')); // шифруем пароль...
                    changePswd($pswd,$user); // вызываем функцию изменения пароля в базе...
                    $info = 'Ваш пароль успешно заменен и выслан Вам на почту!'; // сообщаем об успехе
                }
                else // иначе, если функция FORGOT возвращает FALSE...
                {
                    $info = 'Пользователь с такий логином и емейлом не зарегистрирован!'; // сообщаем об ошибке
                }
            }
        break;
    }
    // ---------------------------------------------------------------------------------------------------------------
    require_once 'views/admin.php';
}
else {
    if(isset($_POST['enter']) && !empty($_POST['login']) && !empty($_POST['password']))
    {
        $login = clearData($_POST['login']);
        $pswd = sha1(md5(clearData($_POST['password'])));
        unset($_POST);
        if(checkUser($login, $pswd))
        {
            $status = getStatus($login);
            $_SESSION['username'] = $login;
            $_SESSION['status'] = $status['status'];
            $action = 'enter'; $user = $_SESSION['username']; userLog($user,$table,$action); // ЗАПИСЬ ДЕЙСТВИЙ ПОЛЬЗОВАТЕЛЯ
            header("Location: main");
        }
        else header("Location: login");
    }
    require_once 'views/login.php';
}
?>