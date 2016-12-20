<?php
// РЕДАКТИРОВАНИЕ ДАННЫХ В БАЗЕ -------------------------------------------------------------------------
    if($_POST['edit']) {
        $id = $_POST['id'];
        $table = $_POST['table'];
//        echo "<pre>"; var_dump($_POST);die();
        if($_POST['password']) {$_POST['password'] = sha1(md5(clearData($_POST['password'])));} // шифруем пароль
        unset($_POST['edit']); unset($_POST['table']); unset($_POST['id']); unset($_POST['oldImg']);
        $count = 0;
            foreach ($_POST as $ArrKey => $ArrStr)
            {
                $row[$count] = $ArrKey;
                $data[$count] = $_POST[$ArrKey];
                if(in_array($ArrKey, array('title_1','title_2','title_3','title_4','title_5','descript_1','descript_2','descript_3','descript_4','descript_5'))) {
                    $data[$count] = str_replace("'", "`", $data[$count]);
                }
                $data[$count] = htmlspecialchars($data[$count], ENT_QUOTES); // заменяем специальные символы на мнемоники
                $count ++;
            }
//            echo "<pre>"; var_dump($table,$id,$row,$data);die();
            unset($_POST);
            updateData($table,$id,$row,$data);
    }
// ДОБАВЛЕНИЕ ДАННЫХ В БАЗУ -------------------------------------------------------------------------
    if($_POST['add']) {
//        echo "<pre>"; var_dump($_POST);die();
        $table = $_POST['table'];
        if($_POST['password']) {$_POST['password'] = sha1(md5(clearData($_POST['password'])));} // шифруем пароль
        unset($_POST['add']); unset($_POST['table']);
        $count = 0;
            foreach ($_POST as $ArrKey => $ArrStr)
            {
                $row[$count] = $ArrKey;
                if(in_array($ArrKey, array('title_1','title_2','title_3','title_4','title_5','descript_1','descript_2','descript_3','descript_4','descript_5'))) {
                    $_POST[$ArrKey] = str_replace("'", "`", $_POST[$ArrKey]);
                    $_POST[$ArrKey] = htmlspecialchars($_POST[$ArrKey], ENT_QUOTES); // заменяем специальные символы на мнемоники
                }
                $data[$count] = "'".$_POST[$ArrKey]."'";
                $count ++;
            }
            unset($_POST);
//            echo "<pre>"; var_dump($table,$row,$data);die();
            $last = insertData($table,$row,$data);
            if($table == 'pages') {$last = "'".$last."'"; insertNewBlock($last);}
            countRowWrite($table);
    }
// ОБНОВЛЕНИЕ ПОРЯДКА МАТЕРИАЛОВ -------------------------------------------------------------------------
    if($_POST['order']) {
        $table = $_POST['table'];
        $data = $_POST['id'];
        dbConnect();
        $i = 1;
        foreach ($data as $item){
            mysql_query(" UPDATE $table SET `num` = '$i' WHERE id='$item' ");
            $i++;
        }
    }
// УДАЛЕНИЕ МАТЕРИАЛА -------------------------------------------------------------------------
    if($_POST['delete']) {
        $table = $_POST['table'];
        $id = $_POST['id'];
        dbConnect();
        mysql_query(" DELETE FROM $table WHERE id='$id' ");
        countRowWrite($table);
    }
// ДОБАВЛЕНИЕ ФОТОГРАФИЙ В БАЗУ -------------------------------------------------------------------------
    if(isset($_POST['addfotos'])) {
        $id = $_POST['id'];
        if($_POST['table'] == 'news') {$table = 'newsfoto';}
        
        $date = $_POST['date'];
//        echo "<pre>"; var_dump($_POST);die();
        uploadMultiFiles($_FILES['filename'], $table, $id, $date);
        header('Location: '.$id);
    }
    if(isset($_POST['addgallery'])) {
        $table = 'gallery';
//        echo "<pre>"; var_dump($_POST);die();
        uploadFilesGallery($_FILES['filename'], $table);
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
    if(isset($_POST['delPhotos'])) {
        $table = ($_POST['table']);
        unset($_POST['delPhotos']);
        unset($_POST['table']);
//        echo "<pre>"; var_dump($_POST);die();
        $delfotos = $_POST;
        deleteFotos($table,$delfotos);
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
// ---------------------------------------------------------------------------------------------------------------
?>