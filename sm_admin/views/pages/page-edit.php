<?php $table = 'pages'; $data = pageData($idRow,$table); ?>
<div class="work editWindow">
                        <form action="" method="post">
                            <div class="langButton">
                                <div id="ru" class="ru active">РУ</div>
                                <div id="ua" class="ua">УА</div>
                            </div>
                            <h2 class="editTitle">Редактирование содержания cтраницы [ <?=$data['menu_ru'];?> ]</h2>
                            <div id="lang_ru" class="language">
                                <textarea class="ckeditor" id="editor1" name="text_ru"><?=$data['text_ru'];?></textarea><pre></pre>
                            </div>
                            <div id="lang_ua" class="language">
                                <textarea class="ckeditor" id="editor1" name="text_ua"><?=$data['text_ua'];?></textarea><pre></pre>
                            </div>
                            <? if(!empty($data['material'])) {?>
                            <label>url:</label><input type="text" name='material' value='<?=$data['material'];?>' style="width: 500px;"><pre></pre>
                            <?}?>
                            <input type="hidden" name='table' value='<?=$table;?>'>
                            <input type="hidden" name='id' value='<?=$data['id'];?>'>
                            <input type="submit" name="edit" value="сохранить">
                        </form>
                    </div>