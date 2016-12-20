<?php $table = 'evolution'; $data = pageData($idRow,$table); ?>
<div class="work editWindow">
                        <form action="" enctype="multipart/form-data" method="post">
                            <h2 class="editTitle">Редактирование Эволюции комплекса [ <?=$data['title_ru'];?> ]</h2>
                            <label>Публикация:</label>
                            <div class="box"><input type="radio" name="public" value="yes" <?if($data['public'] == 'yes') echo 'checked';?>>Да</div>
                            <div class="box"><input type="radio" name="public" value="no" <?if($data['public'] == 'no') echo 'checked';?>>Нет</div>
                            <pre></pre>
                            <label>Год</label><input type="text" name='year' value='<?=$data['year'];?>' style="width: auto;"><pre></pre>
                            <label>Заголовок RU</label><input type="text" name='title_ru' value='<?=$data['title_ru'];?>' placeholder="заголовок ру"><pre></pre>
                            <label>Текст RU</label><input type="text" name='text_ru' value='<?=$data['text_ru'];?>' placeholder="текст ру"><pre></pre>
                            <label>Заголовок УА</label><input type="text" name='title_ua' value='<?=$data['title_ua'];?>' placeholder="заголовок уа"><pre></pre>
                            <label>Текст УА</label><input type="text" name='text_ua' value='<?=$data['text_ua'];?>' placeholder="текст уа"><pre></pre>
                            <input type="file" name="filename"> * файл не более 2мб.! <img class="newsEdit" src="../userfiles/<?=$table;?>/<?=$data['img'];?>" title="текущая обложка"><pre></pre>
                            <input type="hidden" name='table' value='<?=$table;?>'>
                            <input type="hidden" name='id' value='<?=$data['id'];?>'>
                            <input type="hidden" name='oldImg' value='<?=$data['img'];?>'>
                            <input type="submit" name="edit" value="сохранить изменения!" style="width: 200px;">
                        </form>
                    </div>