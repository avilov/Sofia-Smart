<?php $sql = "SELECT * FROM evolution ORDER BY year DESC"; $data = getData($sql); ?>
                    <h1>Управление разделом [ Эволюция комплекса ]</h1>
                    <table class="list">
                        <thead>
                            <tr>
                                <td>год</td>
                                <td>фото</td>
                                <td>заголовок</td>
                                <td>текст</td>
                                <td>публикация</td>
                                <td>действие</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $item): ?>
                            <tr>
                                <td><?=$item['year']?></td>
                                <td style="height: 70px; width: 70px; background-image: url(../userfiles/evolution/<?=$item['img']?>);"></td>
                                <td><?=$item['title_ru']?></td>
                                <td><?=$item['text_ru']?></td>
                                <td style="width: 50px;"><?if($item['public'] == 'no') {echo '<img src="images/public_no.png">';} else {echo '<img src="images/public_yes.png">';}?></td>
                                <td>
                                    <a href="evolution-edit/<?=$item['id']?>" class="button edit" title="редактировать"></a>
                                    <a href="evolution/<?=$item['id']?>/delete" class="button del" title="удалить"></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>