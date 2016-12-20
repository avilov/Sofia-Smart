<div class="work editWindow">
                        <form action="" enctype="multipart/form-data" method="post">
                            <div class="langButton">
                                <div id="ru" class="ru active">РУ</div>
                                <div id="ua" class="ua">УА</div>
                            </div>
                            <h2 class="editTitle">Добавление объекта [ Инфраструктуры ]</h2>
                            <label>Публикация:</label>
                            <div class="box"><input type="radio" name="public" value="yes">Да</div>
                            <div class="box"><input type="radio" name="public" value="no" checked>Нет</div>
                            <pre></pre>
                            <label>Категория:</label><select size="1" name="class" required>
                                <option value="ready">ready</option>
                                <option value="soon">soon</option>
                                <option value="project">project</option>
                            </select> * определяет стадию объекта<pre></pre>
                            <div id="lang_ru" class="language">
                                <label>Название RU</label><input type="text" name='title_ru' value='' placeholder=""><pre></pre>
                                <textarea class="ckeditor" id="editor1" name="text_ru"></textarea><pre></pre>
                            </div>
                            <div id="lang_ua" class="language">
                                <label>Название UA</label><input type="text" name='title_ua' value='' placeholder=""><pre></pre>
                                <textarea class="ckeditor" id="editor1" name="text_ua"></textarea><pre></pre>
                            </div>
                            <label>Позиция X</label><input type="text" name='x' value='' placeholder="горизонтальная позиция"><pre></pre>
                            <label>Позиция Y</label><input type="text" name='y' value='' placeholder="вертикальная позиция"><pre></pre>
                            <input type="file" name="filename"> * файл не более 2мб.! <pre></pre>
                            <input type="hidden" name='table' value='infrastructure'>
                            <input type="submit" name="add" value="сохранить">
                        </form>
                        
                    </div>