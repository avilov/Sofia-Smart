<?php $table = 'kvartiry'; $data = pageData($idRow,$table); ?>
<div class="work any">
                        <form action="" enctype="multipart/form-data" method="post">
                            <h2 class="editTitle">Редактирование квартиры [ код:<?=$data['code'];?> ]</h2>
                            <label style="display: block; padding: 10px; float: left;">Публикация:</label>
                            <div class="box"><input type="radio" name="public" value="yes" <?if($data['public'] == 'yes') echo 'checked';?>>Да</div>
                            <div class="box"><input type="radio" name="public" value="no" <?if($data['public'] == 'no') echo 'checked';?>>Нет</div>
                            <pre></pre>
                            <label style="display: block; padding: 10px; float: left;">Наличие:</label>
                            <div class="box"><input type="radio" name="sales" value="no" <?if($data['sales'] == 'no') echo 'checked';?>>Есть</div>
                            <div class="box"><input type="radio" name="sales" value="yes" <?if($data['sales'] == 'yes') echo 'checked';?>>Нет</div>
                            <pre></pre>
                            <label>Номер дома:</label><select size="1" name="home" required>
                                <option value="<?=$data['home'];?>"><?=$data['home'];?></option>
                                <? $sql = "SELECT * FROM newstype WHERE type='progress' ORDER BY id DESC"; $news = getData($sql); foreach ($news as $item) {?>
                                <option value="<?=$item['url'];?>"><?=$item['title_ru'];?></option>
                                <?}?>
                            </select> * следует обязательно указать дом!<pre></pre>
                            <label>Заголовок РУ:</label><input type="text" name='title_ru' value='<?=$data['title_ru'];?>' placeholder="заголовок ру" size="100"><pre></pre>
                            <label>Заголовок УА:</label><input type="text" name='title_ua' value='<?=$data['title_ua'];?>' placeholder="заголовок уа" size="100"><pre></pre>
                            <label>Описание РУ:</label><input type="text" name='descript_ru' value='<?=$data['descript_ru'];?>' placeholder="описание ру" size="120"><pre></pre>
                            <label>Описание РУ:</label><input type="text" name='descript_ua' value='<?=$data['descript_ua'];?>' placeholder="описание уа" size="120"><pre></pre>
                            <span><label>Код:</label><input type="text" name='code' value='<?=$data['code'];?>' size="4" placeholder="-"></span>
                            <span><label>Секция:</label><input type="text" name='type' value='<?=$data['type'];?>' size="4" placeholder="-"></span>
                            <span><label>Количество комнат:</label><input type="text" name='roomcount' value='<?=$data['roomcount'];?>' size="4" placeholder="-"></span>
                            <span><label>Уровней:</label><input type="text" name='levels' value='<?=$data['levels'];?>' size="3" placeholder="-"></span>
                            <span><label>Готовность дома:</label><input type="text" name='ready' value='<?=$data['ready'];?>' size="10" placeholder="-"></span>
                            <span><label>Готовность:</label><input type="text" name='percent' value='<?=$data['percent'];?>' size="10" placeholder="-"></span>
                            <span><label>Ключи сегодня:</label><input type="text" name='keys' value='<?=$data['keys'];?>' size="10" placeholder="-"></span>
                            <span><label>Общая площадь:</label><input type="text" name='space' value='<?=$data['space'];?>' size="5" placeholder="-"> м²</span>
                            <span><label>Этаж:</label><input type="text" name='level' value='<?=$data['level'];?>' size="10" placeholder="-"></span>
                            <span><label>Цена:</label><input type="text" name='price' value='<?=$data['price'];?>' size="10" placeholder="-"> грн./м²</span>
                            <span><label>Комната 1:</label><input type="text" name='room1' value='<?=$data['room1'];?>' size="3" placeholder="-"> м²</span>
                            <span><label>Комната 2:</label><input type="text" name='room2' value='<?=$data['room2'];?>' size="3" placeholder="-"> м²</span>
                            <span><label>Комната 3:</label><input type="text" name='room3' value='<?=$data['room3'];?>' size="3" placeholder="-"> м²</span>
                            <span><label>Комната 4:</label><input type="text" name='room4' value='<?=$data['room4'];?>' size="3" placeholder="-"> м²</span>
                            <span><label>Комната 5:</label><input type="text" name='room5' value='<?=$data['room5'];?>' size="3" placeholder="-"> м²</span>
                            <span><label>Прихожая / коридор:</label><input type="text" name='hall' value='<?=$data['hall'];?>' size="6" placeholder="-"> м²</span>
                            <span><label>Кухня:</label><input type="text" name='kitch' value='<?=$data['kitch'];?>' size="3" placeholder="-"> м²</span>
                            <span><label>Ванна 1:</label><input type="text" name='bath1' value='<?=$data['bath1'];?>' size="3" placeholder="-"> м²</span>
                            <span><label>Ванна 2:</label><input type="text" name='bath2' value='<?=$data['bath2'];?>' size="3" placeholder="-"> м²</span>
                            <span><label>Санузел:</label><input type="text" name='toilet' value='<?=$data['toilet'];?>' size="3" placeholder="-"> м²</span>
                            <span><label>Кладовка:</label><input type="text" name='stock' value='<?=$data['stock'];?>' size="3" placeholder="-"> м²</span>
                            <span><label>Гардероб:</label><input type="text" name='dress' value='<?=$data['dress'];?>' size="3" placeholder="-"> м²</span>
                            <span><label>Улица РУ:</label><input type="text" name='street_ru' value='<?=$data['street_ru'];?>' size="16" placeholder="-"></span>
                            <span><label>Улица УА:</label><input type="text" name='street_ua' value='<?=$data['street_ua'];?>' size="16" placeholder="-"></span>
                            <span><label>Всего квартир:</label><input type="text" name='all' value='<?=$data['all'];?>' size="10" placeholder="-"></span>
                            <span><label>Продано квартир:</label><input type="text" name='sold' value='<?=$data['sold'];?>' size="10" placeholder="-"></span>
                            <pre></pre>
                            <label style="display: block; padding: 10px; float: left;">3D sequence:</label>
                            <div class="box"><input type="radio" name="3d" value="yes" <?if($data['3d'] == 'yes') echo 'checked';?>>Да</div>
                            <div class="box"><input type="radio" name="3d" value="no" <?if($data['3d'] == 'no') echo 'checked';?>>Нет</div>
                            <pre></pre>
                            <label>3D sequence url:</label><input type="text" name='3dlink' value='<?=$data['3dlink'];?>' size="10" placeholder="-"> * для разработчика<pre></pre>
                            <span><label>2D:</label><input type="text" name='img1' value='<?=$data['img1'];?>' size="10" placeholder="-"></span> <img class="kvartEdit" src="../userfiles/<?=$table;?>/<?=$data['img1'];?>" title="текущая обложка"><pre></pre>
                            <input class="load" type="file" name="filename"> * файл PNG не более 2мб.! Не больше чем 800х600 px! <img class="kvartEdit" src="../userfiles/<?=$table;?>/<?=$data['img0'];?>" title="текущая обложка"><pre></pre>
<!--                            <input class="load" type="file" name="img1"> * файл не более 2мб.! <pre></pre>
                            <input class="load" type="file" name="img2"> * файл не более 2мб.! <pre></pre>
                            <input class="load" type="file" name="img3"> * файл не более 2мб.! <pre></pre>-->
                            <input type="hidden" name='oldImg' value='<?=$data['img0'];?>'>
                            <input type="hidden" name='table' value='<?=$table;?>'>
                            <input type="hidden" name='id' value='<?=$data['id'];?>'>
                            <input type="submit" name="edit" value="сохранить">
                        </form>
                    </div>
<script>
    $('input[type="file"]').on('change', function (event, files, label) {
    var file_name = this.value.replace(/\\/g, '/').replace(/.*\//, '')
    alert(file_name);
});
</script>