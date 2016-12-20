<?php $table = 'scripts'; $data = pageData($idRow,$table); ?>
<div class="work editWindow">
                        <form action="" method="post">
                            <h2 class="editTitle">Редактирование скрипта [ <?=$data['title'];?> ]</h2>
                            <label>Активирован:</label>
                            <div class="box"><input type="radio" name="public" value="yes" <?if($data['public'] == 'yes') echo 'checked';?>>Да</div>
                            <div class="box"><input type="radio" name="public" value="no" <?if($data['public'] == 'no') echo 'checked';?>>Нет</div>
                            <pre></pre>
                            <textarea name="code" rows="20"><?=$data['code'];?></textarea><pre></pre>
                            <input type="hidden" name='table' value='<?=$table;?>'>
                            <input type="hidden" name='id' value='<?=$data['id'];?>'>
                            <input type="submit" name="edit" value="сохранить">
                        </form>
                    </div>