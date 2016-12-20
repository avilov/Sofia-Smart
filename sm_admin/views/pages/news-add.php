<div class="work editWindow">
                        <form action="" enctype="multipart/form-data" method="post">
                            <div class="langButton">
                                <div id="ru" class="ru active">РУ</div>
                                <div id="ua" class="ua">УА</div>
                            </div>
                            <h2 class="editTitle">Добавление новости [ события, новости ]</h2>
                            <label>Публикация:</label>
                            <div class="box"><input type="radio" name="public" value="yes">Да</div>
                            <div class="box"><input type="radio" name="public" value="no" checked>Нет</div>
                            <pre></pre>
                            <label>Дата</label><input type="date" name='date' value='<?=date('Y-m-d');?>' style="width: auto;"><pre></pre>
                            <label>Раздел новости</label><select size="1" name="path" required>
                                <option value="news">Новости</option>
                                <option value="progress">Ход строительства</option>
                            </select> * следует обязательно указать раздел новости!<pre></pre>
                            <label>Тип новости</label><select size="1" name="type" required>
                                <? $sql = "SELECT * FROM newstype ORDER BY id DESC"; $news = getData($sql); foreach ($news as $item) {?>
                                <option value="<?=$item['url'];?>"><?=$item['title_ru'];?></option>
                                <?}?>
                                <option value="vishnevoe">Вишневое</option>
                            </select> * следует обязательно указать тип новости!<pre></pre>
                            <div id="lang_ru" class="language">
                                <label>Заголовок RU</label><input type="text" name='title_ru' value='' placeholder="заголовок (используется в теге TITLE)"><pre></pre>
                                <label>Описание RU</label><textarea name="descript_ru" style="width: 715px;" placeholder="описание (используется в теге DESCRIPTION)"></textarea><pre></pre>
                                <textarea class="ckeditor" id="editor1" name="text_ru"></textarea><pre></pre>
                            </div>
                            <div id="lang_ua" class="language">
                                <label>Заголовок UA</label><input type="text" name='title_ua' value='' placeholder="заголовок (используется в теге TITLE)"><pre></pre>
                                <label>Описание UA</label><textarea name="descript_ua" style="width: 715px;" placeholder="описание (используется в теге DESCRIPTION)"></textarea><pre></pre>
                                <textarea class="ckeditor" id="editor1" name="text_ua"></textarea><pre></pre>
                            </div>
                            <input type="file" name="filename"> * файл не более 2мб.! <pre></pre>
                            <input type="hidden" name='table' value='news'>
                            <input type="submit" name="add" value="сохранить">
                        </form>
                        
                    </div>