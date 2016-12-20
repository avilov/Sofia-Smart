<div class="work editWindow">
                        <form action="" enctype="multipart/form-data" method="post">
                            <h2 class="editTitle">Добавление [ Отзывы жильцов ]</h2>
                            <label>Публикация:</label>
                            <div class="box"><input type="radio" name="public" value="yes">Да</div>
                            <div class="box"><input type="radio" name="public" value="no" checked>Нет</div>
                            <pre></pre>
                            <label>Дом</label><input type="text" name='home' value='' style="width: auto;"><pre></pre>
                            <label>Имя</label><input type="text" name='name' value='' placeholder="имя жильца"><pre></pre>
                            <label>Текст</label><input type="text" name='text' value='' placeholder="текст отзыва"><pre></pre>
                            <label>C нами</label><input type="text" name='time' value='' placeholder="например 2 года"><pre></pre>
                            <input type="file" name="filename"> * файл не более 2мб.!<pre></pre>
                            <input type="hidden" name='table' value='reviews'>
                            <input type="submit" name="add" value="сохранить изменения!" style="width: 200px;">
                        </form>
                    </div>