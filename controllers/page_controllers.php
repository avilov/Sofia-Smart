<?php // ЯДРО СБОРКИ СТРАНИЦЫ ============================================================================================
$arrView = array('index','about','kvartiry-kiev','gallery','progress','news','contacts');
if(isset($material) && ($view == 'news' || $view == 'progress')) {$date = $newsData['date']; $newDate = ChangeDate($date,$word); include 'views/section/newsView.php';}
if(in_array($view,$arrView)) {$q=1; foreach ($pageData as $item): if(!empty($pageData['section'.$q])) {include 'views/section/'.$pageData['section'.$q].'.php';} $q++; endforeach;}
if(!in_array($view,$arrView)) {$q=1; foreach ($pageData as $item): if(!empty($pageData['section'.$q])) {include 'views/section/'.$pageData['section'.$q].'.php';} $q++; endforeach;}
?>