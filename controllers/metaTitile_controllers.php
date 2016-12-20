<?php
$pageData = pageData($view,$page);
$pageTitle = $pageData['title_'.$lang];
$pageDescript = $pageData['descript_'.$lang];
$pageKeywords = $pageData['keywords_'.$lang];
$error = $pageData;
if($material) {
    $newsData = newsData($material,$page);
    $pageTitle = $newsData['title_'.$lang].' '.$word['em2'];
    $pageDescript = $newsData['descript_'.$lang];
    $pageKeywords = $newsData['keywords_'.$lang];
    $error = $newsData;
}
?>
