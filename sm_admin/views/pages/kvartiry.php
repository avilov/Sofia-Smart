<?php $sql = "SELECT * FROM kvartiry WHERE home='$idRow' ORDER BY num"; $data = getData($sql); ?>
                    <h1>Управление квартирами 
                        <? switch ($idRow) {
                            case('home-2g'): echo '[ дома 2Г ]'; break;
                            case('home-2v'): echo '[ дома 2В ]'; break;
                            case('home-2b'): echo '[ дома 2Б ]'; break;
                            case('home-2b'): echo '[ дома 2А ]'; break;
                            case('home-1d'): echo '[ дома 1Д ]'; break;
                            case('home-1g'): echo '[ дома 1Г ]'; break;
                            case('home-1v'): echo '[ дома 1В ]'; break;
                            case('home-1b'): echo '[ дома 1Б ]'; break;
                            case('home-1a'): echo '[ дома 1А ]'; break;
                        }?>
                    </h1>
                    <table class="list">
                        <thead>
                            <tr>
                                <td>№</td>
                                <td>код</td>
                                <td>комнаты</td>
                                <td>публикация</td>
                                <td>наличие</td>
                                <td>фото</td>
                                <td>заголовок</td>
                                <td>действие</td>
                            </tr>
                        </thead>
                        <tbody id="sortContainer">
                            <?php foreach ($data as $item): ?>
                            <tr id="<?=$item['id'];?>">
                                <td><?=$item['num']?></td>
                                <td><?=$item['code']?></td>
                                <td><?=$item['roomcount']?></td>
                                <td><?if($item['public'] == 'no') {echo 'Нет';} else {echo 'Да';}?></td>
                                <td><?if($item['sales'] == 'no') {echo 'Есть';} else {echo 'Нет';}?></td>
                                <td style="height: 70px; width: 70px; background-image: url(../userfiles/kvartiry/<?=$item['img0']?>);"></td>
                                <td><?=$item['title_ru']?></td>
                                <td>
                                    <a href="kvartiry-edit/<?=$item['id']?>" class="button edit" title="редактировать"></a>
                                    <a href="kvartiry/<?=$idRow?>/<?=$item['id']?>/delete" class="button del" title="удалить"></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <input class="saveOrder" type="button" table="kvartiry" value="сохранить порядок" style="width: 200px;">
                    <style>
                        .emptySpace {display: block; background-color: #eee; width: 100%; height: 80px; margin: 5px 0; border: 1px dashed #555;}
                        .saveOrder {padding: 10px;}
                    </style>