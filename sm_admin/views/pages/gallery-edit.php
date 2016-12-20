<?php $sql = "SELECT * FROM gallery ORDER BY num"; $dataFoto = getData($sql); ?>
<div class="work editWindow">
                        <form>
                            <h2 class="editTitle">Редактирование [ Галереи ]</h2>
                        </form>
                        <?php if(!empty($dataFoto)) {?>
                        <div class="fotoNews">
                            <form action="" method="post">
                            <div id="sortContainer">
                            <?php $q=1; foreach ($dataFoto as $itemFoto) {?>
                                <div id="<?=$itemFoto['id']?>" class="newsFotos" style="background-image: url(../userfiles/gallery/<?=$itemFoto['img'];?>);">
                                    <!--<a href="gallery-edit/<?=$itemFoto['id']?>/delete-foto-gallery" class="del" title="удалить"></a>-->
                                    <input type="checkbox" name="<?=$itemFoto['id']?>" value="<?=$itemFoto['img']?>" title="выбрать для удаления">
                                </div>
                                <? $q++; } ?>
                            </div>
                            <div style="clear: both;"></div><pre></pre>
                            <input type="hidden" name="table" value="gallery">
                            <input class="del" type="submit" name="delPhotos" value="удалить выбранные" style="width: 200px;">
                            <input class="saveOrder" type="button" name="changegallery" table="gallery" value="сохранить изменения" style="width: 200px;">
                            </form>
                        </div>
                        <?}?>
                        <form action="" enctype="multipart/form-data" method="post">
                            <input type="submit" name="addgallery" value="загрузить фотографии" style="width: 200px;">
                            <input type="file" name="filename[]" multiple="multiple"> * файл не более 2мб.!
                        </form>
                    </div>