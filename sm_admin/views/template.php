<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel SmartMouse 2.0 Made By LeoCRAFT 2015</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="Cache-Control" content="no-cache">
        <meta name="robots" content="noindex">
        <link rel="icon" href="images/logo.gif" />
        <link rel="stylesheet" type="text/css" href="css/adminLeoCraft.css" />
        
<!--        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>-->
        <script type="text/javascript" src="editor/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <contentainer>
            <header>
                <h3>CMS "SmartMouse v2.0" Made By LeoCRAFT 2015</h3>
                <div>
                    <p>Приветствем: UserName</p>
                    <a href="exit_user">Выйти</a>
                </div>
            </header>
            <div class="headMenu"></div>
            <content>
                <div class="left">
                    <ul class="menu">
                        <h1>Меню разделов 1</h1>
                        <li>Пункт 1</li>
                        <li>Пункт 2</li>
                        <li>Пункт 3</li>
                        <li>Пункт 4</li>
                        <li>Пункт 5</li>
                    </ul>
                    <ul class="menu">
                        <h1>Меню разделов 1</h1>
                        <li>Пункт 1</li>
                        <li>Пункт 2</li>
                        <li>Пункт 3</li>
                        <li>Пункт 4</li>
                        <li>Пункт 5</li>
                    </ul>
                </div>
                <div class="right">
                    <h1>Редактируемый раздел сайта: </h1>
                    <div class="work">
                        <table>
                            <thead>
                                <tr>
                                    <td>дата</td>
                                    <td>название</td>
                                    <td>описание</td>
                                    <td>характеристика</td>
                                    <td>действие</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>f</td>
                                    <td>gf</td>
                                    <td>g</td>
                                    <td>f</td>
                                    <td><input type="submit" name="save" class="button del" title="удалить"></td>
                                </tr>
                                <tr>
                                    <td>f</td>
                                    <td>gf</td>
                                    <td>g</td>
                                    <td>f</td>
                                    <td><input type="submit" name="save" class="button edit" title="редактировать"></td>
                                </tr>
                                <tr>
                                    <td>f</td>
                                    <td>gf</td>
                                    <td>g</td>
                                    <td>f</td>
                                    <td><input type="submit" name="save" class="button add" title="добавить"></td>
                                </tr>
                                <tr>
                                    <td><input size="7"></td>
                                    <td><input size="7"></td>
                                    <td><input size="7"></td>
                                    <td><input size="7"></td>
                                    <td><input type="submit" name="save" class="button save" title="сохранить"></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <form>
                            <h2 class="addTitle">Добавление Новой Записи!</h2>
                            <h2 class="editTitle">Редактирование Записи!</h2>
                            <input type="text" value="" placeholder="описание"><pre></pre>
                            <input type="date" value="" placeholder="описание"><pre></pre>
                            <input type="radio" value="" placeholder="описание"><pre></pre>
                            <input type="checkbox" value="" placeholder="описание"><pre></pre>
                            <input type="search" value="" placeholder="описание"><pre></pre>
                            <input type="file" value="" placeholder="описание">
                            <textarea class="ckeditor" id="editor1" name="" placeholder="описание"></textarea>
                            <input type="submit" name="save" value="сохранить" placeholder="описание">
                        </form>
                    </div>
                </div>
            </content>
            <footer></footer>
        </contentainer>
    </body>
</html>