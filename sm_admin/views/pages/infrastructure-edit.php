<?php $table = 'infrastructure'; $data = pageData($idRow,$table); ?>
<div class="work editWindow">
                        <form action="" enctype="multipart/form-data" method="post">
                            <div class="langButton">
                                <div id="ru" class="ru active">РУ</div>
                                <div id="ua" class="ua">УА</div>
                            </div>
                            <h2 class="editTitle">Редактирование объекта Инфраструктуры [ <?=$data['title_ru'];?> ]</h2>
                            <label>Публикация:</label>
                            <div class="box"><input type="radio" name="public" value="yes" <?if($data['public'] == 'yes') echo 'checked';?>>Да</div>
                            <div class="box"><input type="radio" name="public" value="no" <?if($data['public'] == 'no') echo 'checked';?>>Нет</div>
                            <pre></pre>
                            <label>Категория:</label><select size="1" name="class" required>
                                <option value="<?=$data['class'];?>"><?=$data['class'];?></option>
                                <option value="ready">ready</option>
                                <option value="soon">soon</option>
                                <option value="project">project</option>
                            </select> * определяет стадию объекта<pre></pre>
                            <div id="lang_ru" class="language">
                                <label>Заголовок RU</label><input type="text" name='title_ru' value='<?=$data['title_ru'];?>' placeholder="заголовок ру"><pre></pre>
                                <textarea class="ckeditor" id="editor1" name="text_ru"><?=$data['text_ru'];?></textarea><pre></pre>
                            </div>
                            <div id="lang_ua" class="language">
                                <label>Заголовок UA</label><input type="text" name='title_ua' value='<?=$data['title_ua'];?>' placeholder="заголовок уа"><pre></pre>
                                <textarea class="ckeditor" id="editor1" name="text_ua"><?=$data['text_ua'];?></textarea><pre></pre>
                            </div>
                            <label>Позиция X</label><input type="text" name='x' value='<?=$data['x'];?>' placeholder="горизонтальная позиция"><pre></pre>
                            <label>Позиция Y</label><input type="text" name='y' value='<?=$data['y'];?>' placeholder="вертикальная позиция"><pre></pre>
                            <input type="file" name="filename"> * файл не более 2мб.! <img class="newsEdit" src="../userfiles/<?=$table;?>/<?=$data['img'];?>" title="текущая обложка"><pre></pre>
                            <input type="hidden" name='table' value='<?=$table;?>'>
                            <input type="hidden" name='id' value='<?=$data['id'];?>'>
                            <input type="hidden" name='oldImg' value='<?=$data['img'];?>'>
                            <input type="submit" name="edit" value="сохранить изменения!" style="width: 200px;">
                        </form>
                        <?php $infraId = $data['id']; $sql = "SELECT * FROM infrafoto WHERE infra_id='$infraId' ORDER BY num"; $dataFoto = getData($sql); ?>
                        <?php if(!empty($dataFoto)) {?>
                        <div class="fotoNews">
                            <form action="" method="post">
                            <div id="sortContainer">
                            <?php $q=1; foreach ($dataFoto as $itemFoto) {?>
                                <div id="<?=$itemFoto['id']?>" class="newsFotos" style="background-image: url(../userfiles/infrastructure/infraAlbum/<?=$itemFoto['img'];?>);">
                                    <!--<a href="gallery-edit/<?=$itemFoto['id']?>/delete-foto-gallery" class="del" title="удалить"></a>-->
                                    <input type="checkbox" name="<?=$itemFoto['id']?>" value="<?=$itemFoto['img']?>" title="выбрать для удаления">
                                </div>
                                <? $q++; } ?>
                            </div>
                            <div style="clear: both;"></div><pre></pre>
                            <input type="hidden" name="table" value="infrafoto">
                            <input class="del" type="submit" name="delPhotos" value="удалить выбранные" style="width: 200px;">
                            <input class="saveOrder" type="button" name="changegallery" table="infrafoto" value="сохранить изменения" style="width: 200px;">
                            </form>
                        </div>
                        <?}?>
                        <form action="" enctype="multipart/form-data" method="post">
                            <input type="submit" name="addfotos" value="загрузить фотографии" style="width: 200px;">
                            <input type="file" name="filename[]" multiple="multiple"> * файл не более 2мб.!
                            <input type="hidden" name='date' value='<?=$data['date'];?>'>
                            <input type="hidden" name='table' value='<?=$table;?>'>
                            <input type="hidden" name='id' value='<?=$data['id'];?>'>
                        </form>
                    </div>