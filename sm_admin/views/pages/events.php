<?php $sql = "SELECT * FROM events ORDER BY id DESC"; $data = getData($sql); ?>
                    <h1>Управление разделом [ Собыитя ]</h1>
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
                                    <a href="events-edit/<?=$item['id']?>" class="button edit" title="редактировать"></a>
                                    <a href="events/<?=$item['id']?>/delete" class="button del" title="удалить"></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <input class="saveOrder" type="button" table="events" value="сохранить порядок" style="width: 200px;">
                    <style>
                        .emptySpace {display: block; background-color: #eee; width: 100%; height: 80px; margin: 5px 0; border: 1px dashed #555;}
                        .saveOrder {padding: 10px;}
                    </style>