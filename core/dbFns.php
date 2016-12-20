<?php
// ===================================================================================================================|
    function checkUser($login,$pass)
    {
        dbConnect();
        $result = mysql_query("SELECT login FROM users WHERE login='$login' OR email='$login' ");
        $result = mysql_fetch_assoc($result);
        if($result) {
            $res = mysql_query("SELECT id,login,firstname,lastname,img,rank FROM users WHERE password='$pass' ");
            $res = mysql_fetch_assoc($res);
            return $res;
        }
        else {
            
        }
    }
// ===================================================================================================================|
    function getData($sql)
    {
        dbConnect();
        $result = mysql_query($sql);
        // ---------------------------------------------------------------------
        $result = dbArray($result);
        return $result;
    }
// ===================================================================================================================|
    function pageData($sql)
    {
        dbConnect();
        $result = mysql_query($sql);
        // ---------------------------------------------------------------------
        $result = mysql_fetch_assoc($result);
        return $result;
    }
// ===================================================================================================================|
function getCat($sql) {
    dbConnect();
    $result = mysql_query($sql);
    if(!$result) {return NULL;}
    $arr_cat = array();
    if(mysql_num_rows($result) != 0) {
        for($i = 0; $i < mysql_num_rows($result);$i++) {
            $row = mysql_fetch_array($result,MYSQL_ASSOC);
            if(empty($arr_cat[$row['parent_id']])) {$arr_cat[$row['parent_id']] = array();}	
            $arr_cat[$row['parent_id']][] = $row;	
        }
        return $arr_cat;
    }
}
function viewCat($arr,$parent_id = 0) {
    if(empty($arr[$parent_id])) {return;}?>
    <ul>
    <? for($i=0; $i < count($arr[$parent_id]);$i++) { ?>
        <li><a href="<?=$arr[$parent_id][$i]['id'];?>" url='<?=$arr[$parent_id][$i]['url'];?>'><i class="fa fa-1x <?=$arr[$parent_id][$i]['icon'];?>"></i><?=$arr[$parent_id][$i]['menu_1'];?></a>
        <? viewCat($arr,$arr[$parent_id][$i]['id']); ?>
        </li>
    <?}?>
    </ul>
<?}
// -------------------------------------------------------------------------------------------------------------------*
    function insertData($table,$row,$data) // функция записи данных в базу
    {
        $row = implode(',',$row);
        $data = implode(',',$data);
        dbConnect(); // подключаемся к базе
//        print_r(" INSERT INTO $table ($row) VALUES ($data) ");die;
        mysql_query(" INSERT INTO $table ($row) VALUES ($data) ");
        $last = mysql_insert_id();
        return $last;
    }
// -------------------------------------------------------------------------------------------------------------------*
    function updateData($table,$id,$row,$data) // функция записи данных в базу
    {
        dbConnect(); // подключаемся к базе
        $i = 0;
        foreach ($data as $item => $key):
//        print_r(" UPDATE $table SET $row[$i] = '$key' WHERE id='$id' "); echo '<br>';
        mysql_query(" UPDATE $table SET $row[$i] = '$key' WHERE id='$id' ");
        $i++;
        endforeach;
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
            "/"=> "-",
            ","=>"-",
            "-"=>"-",
            "("=>"",
            ")"=>"",
            "["=>"",
            "]"=>"",
            "="=>"",
            "+"=>"",
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
// =====================================================================================================================
    function ChangeDate($date,$word){
        $y = substr($date, 0, 4);
        $m = substr($date, 5, 2);
        $d = substr($date, 8, 2);
        $newDate['d'] = $d;
        $newDate['m'] = $word[$m];
        $newDate['y'] = $y;
        return $newDate;
    }
// =====================================================================================================================
    function clear_data($data) // функция очистки данных в формах от лишних пробелов и возможных кодов
    {
        $data = mysql_escape_string(trim(strip_tags($data)));
        return $data;
    }
?>