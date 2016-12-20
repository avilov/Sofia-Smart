<?php
function dbConnect()
    {
        
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'blagodat';

        $connection = mysql_connect ($host,$user,$password);
        mysql_query("SET NAMES utf8");

        if(!$connection || !mysql_select_db($database,$connection))
        {
            return false;
        }
        return $connection;
    }
// =====================================================================================================================
    function dbArray($result)
    {   
        $res_array = array();
        $count = 0;
        while($row = mysql_fetch_assoc($result))
        {
            $res_array[$count] = $row;
            $count ++;
        }
        return $res_array;
    }
?>
