<?php
// ===================================================================================================================|
// ФУНКЦИИ ПРИМЕНЯЕМЫЕ ТОЛЬКО В АДМИНКЕ САЙТА ========================================================================|
// ===================================================================================================================|
    function getLastData($table)
    {
        dbConnect();
        $sql = "SELECT id FROM $table ORDER BY id DESC LIMIT 1";
        $result = mysql_query($sql);
        // ---------------------------------------------------------------------
        $result = mysql_fetch_assoc($result);
        return $result;
    }
// ===================================================================================================================|
    function userLog($user,$table,$action) // функция записи данных в базу
    {
        $date = date('Y-m-d');
        $time = date('H:i');
        dbConnect(); // подключаемся к базе
        $result = mysql_query(" INSERT INTO userlog (`date`,`time`,`user`,`table`,`action`) VALUES ('$date','$time','$user','$table','$action') ");
    }
// -------------------------------------------------------------------------------------------------------------------*
    function getData($sql)
    {
        dbConnect();
        $result = mysql_query($sql);
        // ---------------------------------------------------------------------
        $result = dbArray($result);
        return $result;
    }
// =====================================================================================================================
    function pageData($idRow,$table)
    {
        dbConnect();
        $sql = "SELECT * FROM $table WHERE id='$idRow'";
        $result = mysql_query($sql);
        // ---------------------------------------------------------------------
        $result = mysql_fetch_assoc($result);
        return $result;
    }
// -------------------------------------------------------------------------------------------------------------------*
    function insertData($table,$row,$data) // функция записи данных в базу
    {
        $row = implode(',',$row);
        $data = implode(',',$data);
//        print_r(" INSERT INTO $table ($row) VALUES ($data) ");die;
        dbConnect(); // подключаемся к базе
        mysql_query(" INSERT INTO $table ($row) VALUES ($data) ");
    }
// -------------------------------------------------------------------------------------------------------------------*
    function updateData($table,$id,$row,$data) // функция записи данных в базу
    {
        dbConnect(); // подключаемся к базе

        $i = 0;
        foreach ($data as $item => $key):
        mysql_query(" UPDATE $table SET $row[$i] = '$key' WHERE id='$id' ");
        $i++;
        endforeach;
    }
// -------------------------------------------------------------------------------------------------------------------*
    function deleteData($table,$id) // функция удаления данных из базы
    {
        dbConnect(); // подключаемся к базе
        $sql = "SELECT * FROM $table WHERE id='$id'";
        $result = mysql_query($sql);
        $result = mysql_fetch_assoc($result);
        // удаление отдельной фотографии из альбома новостей
        if($table == 'newsfoto') {$target = '../userfiles/news/newsAlbum/'.$result['img']; unlink($target);}
        elseif(($table == 'users' && (!empty ($result['img'])))) {$target = 'upload/users/'.$result['img']; unlink($target);}
        elseif(($table == 'users' && (empty ($result['img'])))) {}
        elseif ($table == 'gallery') {
            $target = '../userfiles/gallery/mini/'.$result['img']; unlink($target);
            $target = '../userfiles/gallery/'.$result['img']; unlink($target);
        }
        elseif ($table == 'redirect') {}
        // удаление обложки новости при удалении самой новости из базы
        else {$target = '../userfiles/'.$table.'/'.$result['img']; unlink($target);
        
            // удаление всех фотографий связанных с новостью
            if($table == 'news') {
                $sql = "SELECT * FROM newsfoto WHERE news_id='$id'"; $fotos = getData($sql);
                foreach ($fotos as $foto) {
                    $idfoto = ($foto['id']);
                    unlink('../userfiles/news/newsAlbum/'.$foto['img']);
                    mysql_query(" DELETE FROM newsfoto WHERE id='$idfoto' ");
                }
            }
        }
        // удаление записи из таблицы
        mysql_query(" DELETE FROM $table WHERE id='$id' ");
    }
// -------------------------------------------------------------------------------------------------------------------*
    function deleteFotos($table,$delfotos)
    {   
        dbConnect(); // подключаемся к базе
        foreach ($delfotos as $id => $foto) {
            mysql_query("DELETE FROM $table WHERE id='$id'");
            if($table == 'newsfoto') {unlink('../userfiles/news/newsAlbum/'.$foto);}
            if($table == 'infrafoto') {unlink('../userfiles/infrastructure/infraAlbum/'.$foto);}
            if($table == 'gallery') {unlink('../userfiles/'.$table.'/mini/'.$foto); unlink('../userfiles/'.$table.'/'.$foto);}
        }
    }
// -------------------------------------------------------------------------------------------------------------------*
    function clearData($data) // функция очистки данных в формах от лишних пробелов и возможных кодов
    {
        $data = trim(htmlspecialchars($data));
        return $data;
    }
// -------------------------------------------------------------------------------------------------------------------*
    function createMini($filename,$table) {
	
        switch ($table){
            case "infrastructure": $width = 400; break;
            case "news": $width = 400; break;
            case "evolution": $width = 250; break;
            case "team": $width = 150; break;
            case "clubresidents": $width = 250; break;
            case "users": $width = 200; break;
            case "gallery": $width = 100; break;
        }
        $target = '../userfiles/'.$table.'/'.$filename;
        $image = imagecreatefromjpeg($target); // берем загруженное изображение с сервера
	$oldX = imagesx($image); // получаем его ширину
	$oldY = imagesy($image); // получаем его высоту
	$newX = $width; // задаем новую ширину
	$newY = floor($oldY * ($width / $oldX)); // изменяем пропорционально высоту и округляем
        $newImage = imagecreatetruecolor($newX, $newY); // Создание нового полноцветного изображения
	imagecopyresized($newImage, $image, 0,0,0,0,$newX,$newY,$oldX,$oldY); // Копирование и изменение размера части изображения
        if($table == 'gallery') {$target = '../userfiles/gallery/mini/'.$filename;}
	imagejpeg($newImage, $target); // Выводит изображение в файл
//        echo "<pre>"; var_dump($nm,$target);die();
}
// -------------------------------------------------------------------------------------------------------------------*
    function uploadFile($table) // функция загрузки файлов на сервер
    {
        $size = $_FILES['filename']['size'];
        if(preg_match('/[.](jpg)|(jpeg)|(gif)|(png)$/', $_FILES['filename']['name']) && $size < 1024*2*1024)
        {
            $newName = date('Y-M-d-His');
            $filename = $_FILES['filename']['name'];
            // проверяем расширение файла
            if(preg_match('/[.](jpeg)$/', $_FILES['filename']['name'])) { // если JPEG то меняем на JPG
                $filename = $newName.'.jpg';
            }
            else { // иначе просто режем имя на 4 символа по . включительно
                $filename = substr($filename, -4);
                $filename = $newName.$filename;
            }
            $filetype = $_FILES['filename']['type'];
            $source = $_FILES['filename']['tmp_name'];
            if($table == 'users') {$target = 'upload/users/'.$filename;}
            else {$target = '../userfiles/'.$table.'/'.$filename;}

            move_uploaded_file($source, $target);

            if($table != 'kvartiry') {createMini($filename,$table);} // функция уменьшения изображения
            $img = $filename;
            return $img;
	}
        else return false;
    }
// -------------------------------------------------------------------------------------------------------------------*
    function resize($filename,$path) 
    {
	$width = 900;
        $im = imagecreatefromjpeg($path . $filename);
	$ox = imagesx($im);
	$oy = imagesy($im);
	$nx = $width;
	$ny = floor($oy * ($width / $ox));
	$nm = imagecreatetruecolor($nx, $ny);
	imagecopyresized($nm, $im, 0,0,0,0,$nx,$ny,$ox,$oy);
	imagejpeg($nm, $path . $filename);
    }
// -------------------------------------------------------------------------------------------------------------------*
    /**
     * Мультизагрузка файлов на сервер
     *
     * @param array $files Массив загружаемых файлов
     * @param string $table Таблица БД
     * @param integer $albumId ID альбома, в который загружаем фото
     */
    function uploadMultiFiles($files, $table, $id, $date)
    {
//        echo "<pre>"; var_dump($table);die();
        $blacklist = getBlacklist();
        $q = 1;
        if($table == 'newsfoto') {$path = '../userfiles/news/newsAlbum/';}
        if($table == 'infrafoto') {$path = '../userfiles/infrastructure/infraAlbum/';}
        foreach ($files['name'] as $i => $filename) {
            //Проверка, что при загрузке файла не произошла ошибка
            if ($files['error'][$i] == UPLOAD_ERR_OK) {
                //Проверка расширения
                foreach ($blacklist as $item) {
                    if (preg_match("/$item\$/i", $filename)) {
                        continue;
                    }
                }
                //проверка mime-типа и размера
                if (in_array($files['type'][$i], getAllowedMimeType()) && $files['size'][$i] < 1024*2*1024) {
                    
                    $newName = $id.'_'.date('Y-M-d_His').'_'.$q;
                    // проверяем расширение файла
                    if(preg_match('/[.](jpeg)$/', $filename)) { // если JPEG то меняем на JPG
                        $filename = $newName.'.jpg';
                    }
                    else { // иначе просто режем имя на 4 символа по . включительно
                        $filename = substr($filename, -4);
                        $filename = $newName.$filename;
                    }
                    //загружаем файл
                    move_uploaded_file($files['tmp_name'][$i], $path.$filename);
                    // функция уменьшения изображения
                    resize($filename,$path);
                    //Вставляем в БД
                    if($table == 'newsfoto') {insertData($table, array('news_id', 'img'), array("'".$id."'", "'".$filename."'"));}
                    if($table == 'infrafoto') {insertData($table, array('infra_id', 'img'), array("'".$id."'", "'".$filename."'"));}
                    $q++;
                }
                else return false;
            }
        }
    }
// -------------------------------------------------------------------------------------------------------------------*
    function uploadFilesGallery($files, $table)
    {
//        echo "<pre>"; var_dump($table);die();
        $blacklist = getBlacklist();
        $q = 1;
        $path = '../userfiles/gallery/';
        $pathMini = '../userfiles/gallery/mini/';
        foreach ($files['name'] as $i => $filename) {
            //Проверка, что при загрузке файла не произошла ошибка
            if ($files['error'][$i] == UPLOAD_ERR_OK) {
                //Проверка расширения
                foreach ($blacklist as $item) {
                    if (preg_match("/$item\$/i", $filename)) {
                        continue;
                    }
                }
                //проверка mime-типа и размера
                if (in_array($files['type'][$i], getAllowedMimeType()) && $files['size'][$i] < 1024*2*1024) {
                    
                    $newName = date('Y-M-d_His').'_'.$q;
                    // проверяем расширение файла
                    if(preg_match('/[.](jpeg)$/', $filename)) { // если JPEG то меняем на JPG
                        $filename = $newName.'.jpg';
                    }
                    else { // иначе просто режем имя на 4 символа по . включительно
                        $filename = substr($filename, -4);
                        $filename = $newName.$filename;
                    }
                    //загружаем файл
                    move_uploaded_file($files['tmp_name'][$i], $path.$filename);
                    // функция уменьшения изображения
                    resize($filename,$path);
                    createMini($filename,$table);
                    insertData($table, array('img'), array("'".$filename."'"));
                    $q++;
                }
                else return false;
            }
        }
    }
// -------------------------------------------------------------------------------------------------------------------*
    function getBlacklist()
    {
        return array(".php", ".phtml", ".php3", ".php4", ".html", ".htm", ".txt", ".js");
    }
// -------------------------------------------------------------------------------------------------------------------*
    function getAllowedMimeType()
    {
        return array("image/jpg", "image/jpeg", "image/png", "image/gif");
    }
// =====================================================================================================================
    function translit($str) // функция перевода символов для title_url
    {
        $tr = array(
            "А"=>"a",
            "Б"=>"b",
            "В"=>"v",
            "Г"=>"g",
            "Д"=>"d",
            "Е"=>"e",
            "Ё"=>"e",
            "Ж"=>"j",
            "З"=>"z",
            "И"=>"i",
            "Й"=>"y",
            "К"=>"k",
            "Л"=>"l",
            "М"=>"m",
            "Н"=>"n",
            "О"=>"o",
            "П"=>"p",
            "Р"=>"r",
            "С"=>"s",
            "Т"=>"t",
            "У"=>"u",
            "Ф"=>"f",
            "Х"=>"h",
            "Ц"=>"ts",
            "Ч"=>"ch",
            "Ш"=>"sh",
            "Щ"=>"sch",
            "Ъ"=>"",
            "Ы"=>"i",
            "Ь"=>"j",
            "Э"=>"e",
            "Ю"=>"yu",
            "Я"=>"ya",
            "а"=>"a",
            "б"=>"b",
            "в"=>"v",
            "г"=>"g",
            "д"=>"d",
            "е"=>"e",
            "ё"=>"e",
            "ж"=>"j",
            "з"=>"z",
            "и"=>"i",
            "й"=>"y",
            "к"=>"k",
            "л"=>"l",
            "м"=>"m",
            "н"=>"n",
            "о"=>"o",
            "п"=>"p",
            "р"=>"r",
            "с"=>"s",
            "т"=>"t",
            "у"=>"u",
            "ф"=>"f",
            "х"=>"h",
            "ц"=>"ts",
            "ч"=>"ch",
            "ш"=>"sh",
            "щ"=>"sch",
            "ъ"=>"y",
            "ы"=>"i",
            "ь"=>"j",
            "э"=>"e",
            "ю"=>"yu",
            "я"=>"ya",
            " "=> "-",
            "."=> "",
            "/"=> "_",
            ","=>",",
            "-"=>"-",
            "("=>"",
            ")"=>"",
            "["=>"",
            "]"=>"",
            "="=>"_",
            "+"=>"_",
            "*"=>"",
            "?"=>"",
            "\""=>"",
            "'"=>"",
            "&"=>"",
            "%"=>"",
            "#"=>"",
            "@"=>"",
            "!"=>"",
            ";"=>"",
            "№"=>"",
            "^"=>"",
            ":"=>"",
            "~"=>"",
            "\\"=>""
        );
        return strtr($str,$tr);
    }
?>
