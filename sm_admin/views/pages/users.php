<?php $sql = "SELECT * FROM users ORDER BY id"; $data = getData($sql); ?>
                    <h1>Управление разделом [ Администраторы ]</h1>
                    <table class="list">
                        <thead>
                            <tr>
                                <td>фото</td>
                                <td>Имя</td>
                                <td>Фамилия</td>
                                <td>Логин</td>
                                <td>действие</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $item): ?>
                            <tr>
                                <td <? if($item['img']) {?>style="height: 110px; width: 100px; background-image: url(upload/users/<?=$item['img']?>);"<?} else {?>style="height: 110px; width: 100px; background-image: url(images/avatar.jpg);"<?}?>></td>
                                <td><?=$item['firstname']?></td>
                                <td><?=$item['lastname']?></td>
                                <td><?=$item['username']?></td>
                                <td>
                                    <a href="users-edit/<?=$item['id']?>" class="button edit" title="редактировать"></a>
                                    <a href="users/<?=$item['id']?>/delete" class="button del" title="удалить"></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>