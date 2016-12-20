<?php $table = 'video'; $data = pageData($idRow,$table); ?>
<div class="work editWindow">
                        <form action="" enctype="multipart/form-data" method="post">
                            <h2 class="editTitle">Редактирование Видео [ <?=$data['title'];?> ]</h2>
                            <label>Публикация:</label>
                            <div class="box"><input type="radio" name="public" value="yes" <?if($data['public'] == 'yes') echo 'checked';?>>Да</div>
                            <div class="box"><input type="radio" name="public" value="no" <?if($data['public'] == 'no') echo 'checked';?>>Нет</div>
                            <pre></pre>
                            <label>Заголовок RU</label><input type="text" name='title' value='<?=$data['title'];?>' placeholder="заголовок ру"><pre></pre>
                            <label>Текст RU</label><input type="text" name='text' value='<?=$data['text'];?>' placeholder="текст ру"><pre></pre>
                            <label>Url</label><input type="text" name='url' value='<?=$data['url'];?>' placeholder="ссылка"><pre></pre>
                            <input type="hidden" name='table' value='<?=$table;?>'>
                            <input type="hidden" name='id' value='<?=$data['id'];?>'>
                            <input type="submit" name="edit" value="сохранить изменения!" style="width: 200px;">
                        </form>
                    </div>