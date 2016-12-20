<?php
            
function massiveTabletToParts($add,$needToSave)
{
    $i = 0;
    foreach ($add as $key => $value)
        {
            if (in_array($key, $needToSave)) {
             
             $massive[$i]['gadget'] = 'TABLET';
             $massive[$i]['model'] = $add['model'];
             // Тут необходимо получить ID типа комплектующей
             $massive[$i]['id_type'] = "'".''."'";
             $massive[$i]['type_parts'] = $key;
             $massive[$i]['title'] = $value;
             $massive[$i]['descript'] = "'".''."'";
             $i++;
            }
        }
        print_r($massive);
    
    die();
    
    return $massive;
}


?>
