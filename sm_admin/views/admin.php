<!DOCTYPE html>
<html>
    <head>
        <base href="http://blagodat.work/sm_admin/">
        <title>Admin Panel SmartMouse 2.0 Made By LeoCRAFT 2015 | Euromisto.com.ua</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="Cache-Control" content="no-cache">
        <meta name="robots" content="noindex">
        <link rel="icon" href="images/logo.gif" />
        <link rel="stylesheet" type="text/css" href="css/adminLeoCraft.css" />
        <script type="text/javascript" src="editor/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="js/jquery-1.11.3.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.11.4/jquery-ui.js"></script>
        <script type="text/javascript" src="js/admin.js"></script>
        <script type="text/javascript" src="js/jquery.smoothscroll.js"></script>
    </head>
    <body>
        <contentainer>
            <header>
                <h3>CMS "SmartMouse v2.0" Made By LeoCRAFT 2015 - © LeoCRAFT </h3>
                <div>
                    <p>Приветствем: <?=$_SESSION['username'];?></p>
                    <a href="exit">Выйти</a>
                </div>
            </header>
            <div class="headMenu">
                <img src="images/SmartMouse.svg">
            </div>
            <content>
                <div class="left">
                    <ul class="menu">
                        <h1>Управление содержанием</h1>
                        <li><a href="requisites">Реквизиты и настройки</a></li>
                        <li><a href="stock">Акция</a></li>
                        <li class="part"></li>
                        <li><a href="pages">Содержание и блоки страниц</a></li>
                        <li class="part"></li>
                        <li><a href="video">Видео</a></li>
                        <li><a href="events">События</a></li>
                        <li><a href="reviews">Отзывы жильцов</a></li>
                        <li><a href="team">Наша команда</a></li>
                        <li class="part"></li>
                        <li><a href="gallery-edit">Галерея</a></li>
                        <li class="part"></li>
                        <li class='podcat'><a>Квартиры</a>
                            <ul>
                                <? $sql = "SELECT * FROM newstype WHERE type='progress' ORDER BY id DESC"; $news = getData($sql); foreach ($news as $item) {?>
                                <li><a href="kvartiry/<?=$item['url'];?>">Квартиры <?=$item['title_ru'];?></a></li>
                                <?}?>
                            </ul>
                        <li class="part"></li>
                        <li><a href="scripts">Scripts Body</a></li>
                        <li class="part"></li>
                        <li><a href="redirect-edit">Редиректы</a></li>
                        <li class="part"></li>
                        <li><a href="users">Администраторы</a></li>
                    </ul>
                    <ul class="menu">
                        <h1>Добавление данных на сайт</h1>
                        <li><a href="pages-add">Новая Страница</a></li>
                        <li class="part"></li>
                        <li><a href="newstype-add">Тип Новостей</a></li>
                        <li><a href="news-add">Новость</a></li>
                        <li class="part"></li>
                        <li><a href="evolution-add">Эволюция комплекса</a></li>
                        <li><a href="infrastructure-add">Инфраструкрура</a></li>
                        <li><a href="video-add">Видео</a></li>
                        <li><a href="events-add">События</a></li>
                        <li><a href="reviews-add">Отзывы жильцов</a></li>
                        <li><a href="team-add">Наша команда</a></li>
                        <li><a href="kvartiry-add">Квартиры</a></li>
                        <li class="part"></li>
                        <li><a href="">Секции страниц</a></li>
                        <li><a href="users-add">Администратор</a></li>
                    </ul>
                    <ul class="menu">
                        <h1>Статистика</h1>
                        <li><a href="logmail">Логи заявок с сайта</a></li>
                        <li><a href="userlog">Логи операций администраторов</a></li>
                    </ul>
                </div>
                <div class="right">
                    <? require 'views/pages/'.$view.'.php'; ?>
                </div>
                <div style="clear: both;"></div>
            </content>
            <footer></footer>
        </contentainer>
    </body>
</html>
