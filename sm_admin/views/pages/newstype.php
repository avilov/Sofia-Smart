<?php $sql = "SELECT * FROM newstype ORDER BY id DESC"; $data = getData($sql); ?>
                    <h1>Управление Типом Новостей</h1>
                    <table class="list">
                        <thead>
                            <tr>
                                <td>тип</td>
                                <td>заголовок</td>
                                <td>публикация</td>
                                <td>действие</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $item): ?>
                            <tr>
                                <td><?=$item['url']?></td>
                                <td><?=$item['title_ru']?></td>
                                <td style="width: 50px;"><?if($item['public'] == 'no') {echo '<img src="images/public_no.png">';} else {echo '<img src="images/public_yes.png">';}?></td>
                                <td>
                                    <a href="newstype-edit/<?=$item['id']?>" class="button edit" title="редактировать"></a>
                                    <a href="newstype/<?=$item['type']?>/<?=$item['id']?>/delete" class="button del" title="удалить"></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>