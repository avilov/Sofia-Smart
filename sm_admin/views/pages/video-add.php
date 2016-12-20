<div class="work editWindow">
                        <form action="" enctype="multipart/form-data" method="post">
                            <h2 class="editTitle">Добавление материала [ Видео ]</h2>
                            <label>Публикация:</label>
                            <div class="box"><input type="radio" name="public" value="yes">Да</div>
                            <div class="box"><input type="radio" name="public" value="no" checked>Нет</div>
                            <pre></pre>
                            <label>Заголовок RU</label><input type="text" name='title' value='' placeholder="заголовок"><pre></pre>
                            <label>Текст RU</label><input type="text" name='text' value='' placeholder="текст ру"><pre></pre>
                            <label>Url</label><input type="text" name='url' value='' placeholder="ссылка на видео"><pre></pre>
                            <input type="hidden" name='table' value='video'>
                            <input type="submit" name="add" value="сохранить изменения!" style="width: 200px;">
                        </form>
                    </div>