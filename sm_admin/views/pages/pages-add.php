<div class="work editWindow">
                        <form action="" method="post">
                            <div class="langButton">
                                <div id="ru" class="ru active">РУ</div>
                                <div id="ua" class="ua">УА</div>
                            </div>
                            <h2 class="editTitle">Добавление cтраницы</h2>
                            <div id="lang_ru" class="language">
                                <label>Menu_RU</label><input type="text" name='menu_ru' value='<?=$data['menu_ru'];?>' placeholder="меню ру" style="width: 500px;"> * обязательно к заполнению<pre></pre>
                                <label>Title_RU</label><input type="text" name='title_ru' value='<?=$data['title_ru'];?>' placeholder="титул ру"><pre></pre>
                                <label>Descrition_RU</label><input type="text" name='descript_ru' value='<?=$data['descript_ru'];?>' placeholder="описание ру"><pre></pre>
                                <label>Keywords_RU</label><input type="text" name='keywords_ru' value='<?=$data['keywords_ru'];?>' placeholder="клучевые слова ру"><pre></pre>
                                <textarea class="ckeditor" id="editor1" name="text_ru"></textarea><pre></pre>
                            </div>
                            <div id="lang_ua" class="language">
                                <label>Menu_UA</label><input type="text" name='menu_ua' value='<?=$data['menu_ua'];?>' placeholder="меню уа" style="width: 500px;"> * обязательно к заполнению<pre></pre>
                                <label>Title_UA</label><input type="text" name='title_ua' value='<?=$data['title_ua'];?>' placeholder="титул уа"><pre></pre>
                                <label>Descrition_UA</label><input type="text" name='descript_ua' value='<?=$data['descript_ua'];?>' placeholder="описание уа"><pre></pre>
                                <label>Keywords_UA</label><input type="text" name='keywords_ua' value='<?=$data['keywords_ua'];?>' placeholder="клучевые слова уа"><pre></pre>
                                <textarea class="ckeditor" id="editor1" name="text_ua"></textarea><pre></pre>
                            </div>
                            <label>View:</label><input type="text" name='view' value='' style="width: 500px;"><pre></pre>
                            <label>Page:</label><input type="text" name='page' value='' style="width: 500px;"><pre></pre>
                            <label>Мaterial:</label><input type="text" name='material' value='' style="width: 500px;"><pre></pre>
                            <h1>Подключаемые секции к страницам</h1><pre></pre>
                            <? $i=1; while ($i <= 10) {?> 
                            <label>Секция <?=$i;?>:</label><select size="1" name="section<?=$i;?>" <? if($i == 1) {?>required<?}?>>
                                <option value=""></option>
                                <? $sql = "SELECT * FROM pagesection"; $section = getData($sql); foreach ($section as $item) {?>
                                <option value="<?=$item['url'];?>"><?=$item['title'];?></option>
                                <?}?>
                                <option value="vishnevoe">Вишневое</option>
                            </select> <? if($i == 1) {?>* следует обязательно указать первую секцию!<?}?><pre></pre>
                            <? $i++; }?>
                            <input type="hidden" name='table' value='pages'>
                            <input type="submit" name="add" value="сохранить">
                        </form>
                    </div>