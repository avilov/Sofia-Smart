<?php $sql = "SELECT * FROM video ORDER BY id DESC"; $data = getData($sql); ?>
                    <h1>Управление разделом [ Видео ]</h1>
                    <table class="list">
                        <thead>
                            <tr>
                                <td>Название</td>
                                <td>Текст</td>
                                <td>публикация</td>
                                <td>действие</td>
                            </tr>
                        </thead>
                        <tbody id="sortContainer">
                            <?php foreach ($data as $item): ?>
                            <tr id="<?=$item['id'];?>">
                                <td><?=$item['title']?></td>
                                <td><?=$item['text']?></td>
                                <td style="width: 50px;"><?if($item['public'] == 'no') {echo '<img src="images/public_no.png">';} else {echo '<img src="images/public_yes.png">';}?></td>
                                <td>
                                    <a href="video-edit/<?=$item['id']?>" class="button edit" title="редактировать"></a>
                                    <a href="video/<?=$item['id']?>/delete" class="button del" title="удалить"></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <input class="saveOrder" type="button" table="video" value="сохранить порядок" style="width: 200px;">
                    <style>
                        .emptySpace {display: block; background-color: #eee; width: 100%; height: 80px; margin: 5px 0; border: 1px dashed #555;}
                        .saveOrder {padding: 10px;}
                    </style>