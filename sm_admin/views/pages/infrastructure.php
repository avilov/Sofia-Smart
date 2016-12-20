<?php $sql = "SELECT * FROM infrastructure ORDER BY id"; $data = getData($sql); ?>
                    <h1>Управление разделом [ Инфраструктура комплекса ]</h1>
                    <table class="list">
                        <thead>
                            <tr>
                                <td>фото</td>
                                <td>Название объекта</td>
                                <td>публикация</td>
                                <td>действие</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $item): ?>
                            <tr>
                                <td style="height: 70px; width: 70px; background-image: url(../userfiles/infrastructure/<?=$item['img']?>);"></td>
                                <td><?=$item['title_ru']?></td>
                                <td style="width: 50px;"><?if($item['public'] == 'no') {echo '<img src="images/public_no.png">';} else {echo '<img src="images/public_yes.png">';}?></td>
                                <td>
                                    <a href="infrastructure-edit/<?=$item['id']?>" class="button edit" title="редактировать"></a>
                                    <a href="infrastructure/<?=$item['id']?>/delete" class="button del" title="удалить"></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>