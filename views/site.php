<?
$sql = "SELECT * FROM requisites WHERE id='1'"; $req = pageData($sql);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Благодать!!!!!1212!</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!--Mobile Optimize-->
    <meta name="viewport" content="width=1280">
    <meta name="MobileOptimized" content="1280"/>
    <meta name="HandheldFriendly" content="true"/>
        <!--Style-->
    <link rel="shortcut icon" href="style/img/favicon.png">
    <link rel="stylesheet" href="style/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
        
</head>
<body id="top">

    <div class="back"></div>
    <?
    include "views/pages/header.php"; 
    include "views/pages/main.php";
    include "views/pages/holiday.php";
    include "views/pages/calendar.php";
    include "views/pages/events.php";
    include "views/pages/video.php";
    // include "views/pages/history.php";
    include "views/pages/about.php";
    include "views/pages/footer.php";
    ?>
    <a id="back" href="#top" class="logo-top1"><img src="style/img/up.png"></a>

<!--JavaScript-->
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery.smoothscroll.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script src="https://use.fontawesome.com/90cc137d10.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
</body>
</html>