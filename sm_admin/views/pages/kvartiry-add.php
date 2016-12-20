<div class="work any">
                        <form action="" enctype="multipart/form-data" method="post">
                            <h2 class="editTitle">Добавление квартиры</h2>
                            <label style="display: block; padding: 10px; float: left;">Публикация:</label>
                            <div class="box"><input type="radio" name="public" value="yes">Да</div>
                            <div class="box"><input type="radio" name="public" value="no" checked>Нет</div>
                            <pre></pre>
                            <label style="display: block; padding: 10px; float: left;">Наличие:</label>
                            <div class="box"><input type="radio" name="sales" value="no" checked>Есть</div>
                            <div class="box"><input type="radio" name="sales" value="yes">Нет</div>
                            <pre></pre>
                            <label>Номер дома:</label><select size="1" name="home" required>
                                <? $sql = "SELECT * FROM newstype WHERE type='progress' ORDER BY id DESC"; $news = getData($sql); foreach ($news as $item) {?>
                                <option value="<?=$item['url'];?>"><?=$item['title_ru'];?></option>
                                <?}?>
                            </select> * следует обязательно указать дом!<pre></pre>
                            <label>Заголовок РУ:</label><input type="text" name='title_ru' value='' placeholder="заголовок ру" size="100"><pre></pre>
                            <label>Заголовок УА:</label><input type="text" name='title_ua' value='' placeholder="заголовок уа" size="100"><pre></pre>
                            <label>Описание РУ:</label><input type="text" name='descript_ru' value='' placeholder="описание ру" size="120"><pre></pre>
                            <label>Описание РУ:</label><input type="text" name='descript_ua' value='' placeholder="описание уа" size="120"><pre></pre>
                            <span><label>Код:</label><input type="text" name='code' value='' size="4" placeholder="-"></span>
                            <span><label>Секция:</label><select size="1" name="type" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select></span>
                            <span><label>Количество комнат:</label><select size="1" name="roomcount" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select></span>
                            <span><label>Уровней:</label><select size="1" name="levels" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select></span>
                            <span><label>Готовность дома:</label><select size="1" name="ready" required>
                                <option value="ready">Да</option>
                                <option value="nearly">Нет</option>
                            </select></span>
                            <span><label>Готовность:</label><select size="1" name="percent" required>
                                <option value="50%">50%</option>
                                <option value="60%">60%</option>
                                <option value="70%">70%</option>
                                <option value="80%">80%</option>
                                <option value="90%">90%</option>
                                <option value="100%">100%</option>
                            </select></span>
                            <!--<span><label>Ключи сегодня:</label><input type="text" name='keys' value='' size="10" placeholder="-"></span>-->
                            <span><label>Общая площадь:</label><input type="text" name='space' value='' size="5" placeholder="-" style="height: 20px;"> м²</span>
                            <span><label>Этаж:</label><input type="text" name='level' value='' size="10" placeholder="-" style="height: 20px;"></span>
                            <span><label>Цена:</label><input type="text" name='price' value='' size="10" placeholder="-"> грн./м²</span>
                            <span><label>Комната 1:</label><input type="text" name='room1' value='' size="3" placeholder="-"> м²</span>
                            <span><label>Комната 2:</label><input type="text" name='room2' value='' size="3" placeholder="-"> м²</span>
                            <span><label>Комната 3:</label><input type="text" name='room3' value='' size="3" placeholder="-"> м²</span>
                            <span><label>Комната 4:</label><input type="text" name='room4' value='' size="3" placeholder="-"> м²</span>
                            <span><label>Комната 5:</label><input type="text" name='room5' value='' size="3" placeholder="-"> м²</span>
                            <span><label>Прихожая / коридор:</label><input type="text" name='hall' value='' size="6" placeholder="-"> м²</span>
                            <span><label>Кухня:</label><input type="text" name='kitch' value='' size="3" placeholder="-"> м²</span>
                            <span><label>Ванна 1:</label><input type="text" name='bath1' value='' size="3" placeholder="-"> м²</span>
                            <span><label>Ванна 2:</label><input type="text" name='bath2' value='' size="3" placeholder="-"> м²</span>
                            <span><label>Санузел:</label><input type="text" name='toilet' value='' size="3" placeholder="-"> м²</span>
                            <span><label>Кладовка:</label><input type="text" name='stock' value='' size="3" placeholder="-"> м²</span>
                            <span><label>Гардероб:</label><input type="text" name='dress' value='' size="3" placeholder="-"> м²</span>
                            <span><label>Улица РУ:</label><input type="text" name='street_ru' value='' size="16" placeholder="-"></span>
                            <span><label>Улица УА:</label><input type="text" name='street_ua' value='' size="16" placeholder="-"></span>
                            <!--<span><label>Всего квартир:</label><input type="text" name='all' value='' size="10" placeholder="-"></span>-->
<!--                            <span><label>Продано квартир:</label><input type="text" name='sold' value='' size="10" placeholder="-"></span>-->
                            <pre></pre>
                            <label style="display: block; padding: 10px; float: left;">3D sequence:</label>
                            <div class="box"><input type="radio" name="3d" value="no" checked>Нет</div>
                            <div class="box"><input type="radio" name="3d" value="yes">Да</div>
                            <pre></pre>
                            <label>3D sequence url:</label><input type="text" name='3dlink' value='' size="10" placeholder="-"> * для разработчика<pre></pre>
                            <input class="load" type="file" name="filename"> * файл PNG не более 2мб.! Не больше чем 800х600 px!<pre></pre>
<!--                            <input class="load" type="file" name="img1"> * файл не более 2мб.! <pre></pre>
                            <input class="load" type="file" name="img2"> * файл не более 2мб.! <pre></pre>
                            <input class="load" type="file" name="img3"> * файл не более 2мб.! <pre></pre>-->
                            <input type="hidden" name='table' value='kvartiry'>
                            <input type="submit" name="add" value="сохранить">
                        </form>
                    </div>