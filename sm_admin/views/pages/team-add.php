<div class="work editWindow">
                        <form action="" enctype="multipart/form-data" method="post">
                            <h2 class="editTitle">Добавление материала в [ Наша команда ]</h2>
                            <label>Публикация:</label>
                            <div class="box"><input type="radio" name="public" value="yes">Да</div>
                            <div class="box"><input type="radio" name="public" value="no" checked>Нет</div>
                            <pre></pre>
                            <label>Имя Фамилия РУ</label><input type="text" name='title_ru' value='' placeholder=""><pre></pre>
                            <label>Имя Фамилия УА</label><input type="text" name='title_ua' value='' placeholder=""><pre></pre>
                            <input type="file" name="filename"> * файл не более 2мб.!<pre></pre>
                            <input type="hidden" name='table' value='team'>
                            <input type="submit" name="add" value="сохранить изменения!" style="width: 200px;">
                        </form>
                    </div>