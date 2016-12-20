<?php $sql = "SELECT * FROM news WHERE type='$idRow' ORDER BY date DESC"; $data = getData($sql); ?>
                    <h1>Управление Новостями 
                        <? switch ($idRow) {
                            case('city'): echo '[ новости городка ]'; break;
                            case('events'): echo '[ события городка ]'; break;
                            case('estate'): echo '[ новости недвижимости ]'; break;
                            case('home-2g'): echo '[ ход строительства дома 2Г ]'; break;
                            case('home-2v'): echo '[ ход строительства дома 2В ]'; break;
                            case('home-2b'): echo '[ ход строительства дома 2Б ]'; break;
                            case('home-2a'): echo '[ ход строительства дома 2А ]'; break;
                            case('home-1d'): echo '[ ход строительства дома 1Д ]'; break;
                            case('home-1g'): echo '[ ход строительства дома 1Г ]'; break;
                            case('home-1v'): echo '[ ход строительства дома 1В ]'; break;
                            case('home-1b'): echo '[ ход строительства дома 1Б ]'; break;
                            case('home-1a'): echo '[ ход строительства дома 1А ]'; break;
                        }?>
                    </h1>
                    <table class="list">
                        <thead>
                            <tr>
                                <td>дата</td>
                                <td>тип</td>
                                <td>фото</td>
                                <td>заголовок</td>
                                <td>просмотры</td>
                                <td>публикация</td>
                                <td>действие</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $item): ?>
                            <tr>
                                <td><?=$item['date']?></td>
                                <td><?=$word[$item['type']]?></td>
                                <td style="height: 70px; width: 70px; background-image: url(../userfiles/news/<?=$item['img']?>);"></td>
                                <td><?=$item['title_ru']?></td>
                                <td><?=$item['views']?></td>
                                <td style="width: 50px;"><?if($item['public'] == 'no') {echo '<img src="images/public_no.png">';} else {echo '<img src="images/public_yes.png">';}?></td>
                                <td>
                                    <a href="news-edit/<?=$item['id']?>" class="button edit" title="редактировать"></a>
                                    <a href="news/<?=$item['type']?>/<?=$item['id']?>/delete" class="button del" title="удалить"></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>