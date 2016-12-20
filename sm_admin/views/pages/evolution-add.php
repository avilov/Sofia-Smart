<div class="work editWindow">
                        <form action="" enctype="multipart/form-data" method="post">
                            <h2 class="editTitle">Добавление [ Эволюции комплекса ]</h2>
                            <label>Публикация:</label>
                            <div class="box"><input type="radio" name="public" value="yes">Да</div>
                            <div class="box"><input type="radio" name="public" value="no" checked>Нет</div>
                            <pre></pre>
                            <label>Год</label><input type="text" name='year' value='' style="width: auto;"><pre></pre>
                            <label>Заголовок RU</label><input type="text" name='title_ru' value='' placeholder="заголовок ру"><pre></pre>
                            <label>Текст RU</label><input type="text" name='text_ru' value='' placeholder="текст ру"><pre></pre>
                            <label>Заголовок УА</label><input type="text" name='title_ua' value='' placeholder="заголовок уа"><pre></pre>
                            <label>Текст УА</label><input type="text" name='text_ua' value='' placeholder="текст уа"><pre></pre>
                            <input type="file" name="filename"> * файл не более 2мб.!<pre></pre>
                            <input type="hidden" name='table' value='evolution'>
                            <input type="submit" name="add" value="сохранить изменения!" style="width: 200px;">
                        </form>
                    </div>