<div class="work editWindow">
                        <form action="" enctype="multipart/form-data" method="post">
                            <div class="langButton">
                                <div id="ru" class="ru active">РУ</div>
                                <div id="ua" class="ua">УА</div>
                            </div>
                            <h2 class="editTitle">Добавление новости [ Новости Недвижимости ]</h2>
                            <label>Публикация:</label>
                            <div class="box"><input type="radio" name="public" value="yes">Да</div>
                            <div class="box"><input type="radio" name="public" value="no" checked>Нет</div>
                            <pre></pre>
                            <label>Дата</label><input type="date" name='date' value='<?=date('Y-m-d');?>' style="width: auto;"><pre></pre>
                            <div id="lang_ru" class="language">
                                <label>Заголовок RU</label><input type="text" name='title_ru' value='' placeholder="заголовок ру"><pre></pre>
                                <textarea class="ckeditor" id="editor1" name="descript_ru"></textarea><pre></pre>
                            </div>
                            <div id="lang_ua" class="language">
                                <label>Заголовок UA</label><input type="text" name='title_ua' value='' placeholder="заголовок уа"><pre></pre>
                                <textarea class="ckeditor" id="editor1" name="descript_ua"></textarea><pre></pre>
                            </div>
                            <input type="file" name="filename"> * файл не более 2мб.! <pre></pre>
                            <input type="hidden" name='type2' value='estate'>
                            <input type="hidden" name='table' value='news'>
                            <input type="submit" name="add" value="сохранить">
                        </form>
                        
                    </div>