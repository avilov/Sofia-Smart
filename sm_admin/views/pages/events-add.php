<div class="work editWindow">
        <form action="" enctype="multipart/form-data" method="post">
            <h2 class="editTitle">Добавление материала [ Видео ]</h2>
            <label>Публикация:</label>
            <div class="box"><input type="radio" name="public" value="yes">Да</div>
            <div class="box"><input type="radio" name="public" value="no" checked>Нет</div><pre></pre>
            <label>Дата</label><input type="date" name='date' value=''><pre></pre>
            <label>Заголовок RU</label><input type="text" name='title' value='' placeholder="заголовок"><pre></pre>
            <label>Описание</label><input type="text" name='description' value='' placeholder="описание"><pre></pre>
            <textarea class="ckeditor" id="editor1" name="text"></textarea><pre></pre>
            <input type="hidden" name='table' value='events'>
            <input type="submit" name="add" value="сохранить изменения!" style="width: 200px;">
        </form>
    </div>