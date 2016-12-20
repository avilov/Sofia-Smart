<?php $table = 'events'; $data = pageData($idRow,$table); ?>
<div class="work editWindow">
                <form action="" enctype="multipart/form-data" method="post">
                    <h2 class="editTitle">Редактирование События <?=$data['title'];?> </h2>
                    <label>Публикация:</label>
                    <div class="box"><input type="radio" name="public" value="yes" <?if($data['public'] == 'yes') echo 'checked';?>>Да</div>
                    <div class="box"><input type="radio" name="public" value="no" <?if($data['public'] == 'no') echo 'checked';?>>Нет</div>
                    <pre></pre>
                    <label>Дата</label><input type="date" name='date' value='<?=$data['date'];?>'><pre></pre>
                    <label>Заголовок RU</label><input type="text" name='title' value='<?=$data['title'];?>' placeholder="заголовок ру"><pre></pre>
                    <label>Описание</label><input type="text" name='description' value='<?=$data['description'];?>' placeholder="описание"><pre></pre>
                    <textarea class="ckeditor" id="editor1" name="text"><?=$data['text'];?></textarea><pre></pre>
                    <input type="hidden" name='table' value='<?=$table;?>'>
                    <input type="hidden" name='id' value='<?=$data['id'];?>'>
                    <input type="submit" name="edit" value="сохранить изменения!" style="width: 200px;">
                </form>
            </div>