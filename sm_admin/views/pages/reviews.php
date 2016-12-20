<?php $sql = "SELECT * FROM reviews ORDER BY id DESC"; $data = getData($sql); ?>
                    <h1>Управление разделом [ Эволюция комплекса ]</h1>
                    <table class="list">
                        <thead>
                            <tr>
                                <td>дом</td>
                                <td>имя</td>
                                <td>фото</td>
                                <td>текст</td>
                                <td>публикация</td>
                                <td>действие</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $item): ?>
                            <tr>
                                <td><?=$item['home']?></td>
                                <td><?=$item['name']?></td>
                                <td style="height: 70px; width: 70px; background-image: url(../userfiles/reviews/<?=$item['img']?>);"></td>
                                <td><?=$item['text']?></td>
                                <td style="width: 50px;"><?if($item['public'] == 'no') {echo '<img src="images/public_no.png">';} else {echo '<img src="images/public_yes.png">';}?></td>
                                <td>
                                    <a href="reviews-edit/<?=$item['id']?>" class="button edit" title="редактировать"></a>
                                    <a href="reviews/<?=$item['id']?>/delete" class="button del" title="удалить"></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>