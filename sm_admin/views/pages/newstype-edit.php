<?php $table = 'newstype'; $data = pageData($idRow,$table); ?>
<div class="work editWindow">
                        <form action="" enctype="multipart/form-data" method="post">
                            <h2 class="editTitle">Редактирование Типа Новости [ <?=$data['title_ru'];?> ]</h2>
                            <label>Публикация:</label>
                            <div class="box"><input type="radio" name="public" value="yes" <?if($data['public'] == 'yes') echo 'checked';?>>Да</div>
                            <div class="box"><input type="radio" name="public" value="no" <?if($data['public'] == 'no') echo 'checked';?>>Нет</div>
                            <pre></pre>
                            <label>Раздел</label><select size="1" name="type" required>
                                <option value="<?=$data['type'];?>"><?=$word[$data['type']];?></option>
                                <option value="news">Новости</option>
                                <option value="progress">Ход Строительства</option>
                            </select> * следует обязательно указать тип новости!<pre></pre>
                            <label>Заголовок RU</label><input type="text" name='title_ru' value='<?=$data['title_ru'];?>' placeholder="заголовок ру"><pre></pre>
                            <label>Заголовок UA</label><input type="text" name='title_ua' value='<?=$data['title_ua'];?>' placeholder="заголовок уа"><pre></pre>
                            <label>Link:</label><input type="text" name='url' value='<?=$data['url'];?>' style="width: 500px;"><pre></pre>
                            <input type="hidden" name='table' value='<?=$table;?>'>
                            <input type="hidden" name='id' value='<?=$data['id'];?>'>
                            <input type="submit" name="edit" value="сохранить изменения!" style="width: 200px;">
                        </form>
                    </div>