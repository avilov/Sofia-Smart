<?php $table = 'reviews'; $data = pageData($idRow,$table); ?>
<div class="work editWindow">
                        <form action="" enctype="multipart/form-data" method="post">
                            <h2 class="editTitle">Редактирование Отзывы жильцов [ <?=$data['name'];?> ]</h2>
                            <label>Публикация:</label>
                            <div class="box"><input type="radio" name="public" value="yes" <?if($data['public'] == 'yes') echo 'checked';?>>Да</div>
                            <div class="box"><input type="radio" name="public" value="no" <?if($data['public'] == 'no') echo 'checked';?>>Нет</div>
                            <pre></pre>
                            <label>Имя</label><input type="text" name='home' value='<?=$data['home'];?>' style="width: auto;"><pre></pre>
                            <label>Имя</label><input type="text" name='name' value='<?=$data['name'];?>' placeholder="имя жителя"><pre></pre>
                            <label>Текст отзыва</label><input type="text" name='text' value='<?=$data['text'];?>' placeholder="текст отзыва"><pre></pre>
                            <label>С нами</label><input type="text" name='time' value='<?=$data['time'];?>' placeholder="например 2 года"><pre></pre>
                            <input type="file" name="filename"> * файл не более 2мб.! <img class="newsEdit" src="../userfiles/<?=$table;?>/<?=$data['img'];?>" title="текущая обложка"><pre></pre>
                            <input type="hidden" name='table' value='<?=$table;?>'>
                            <input type="hidden" name='id' value='<?=$data['id'];?>'>
                            <input type="hidden" name='oldImg' value='<?=$data['img'];?>'>
                            <input type="submit" name="edit" value="сохранить изменения!" style="width: 200px;">
                        </form>
                    </div>