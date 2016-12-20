<div class="work editWindow">
                        <form action="" enctype="multipart/form-data" method="post">
                            <h2 class="editTitle">Добавление Типа Новости</h2>
                            <label>Публикация:</label>
                            <div class="box"><input type="radio" name="public" value="yes">Да</div>
                            <div class="box"><input type="radio" name="public" value="no" checked>Нет</div>
                            <pre></pre>
                            <label>Раздел</label><select size="1" name="type" required>
                                <option value="">раздел</option>
                                <option value="news">Новости</option>
                                <option value="progress">Ход строительства</option>
                            </select> * следует обязательно указать тип новости!<pre></pre>
                            <label>Заголовок RU</label><input type="text" name='title_ru' value='' placeholder="заголовок ру"><pre></pre>
                            <label>Заголовок UA</label><input type="text" name='title_ua' value='' placeholder="заголовок уа"><pre></pre>
                            <input type="hidden" name='table' value='newstype'>
                            <input type="submit" name="add" value="сохранить">
                        </form>
                    </div>