<?php $sql = "SELECT * FROM userlog ORDER BY id DESC"; $data = getData($sql); ?>
                    <h1>Действия администраторов</h1>
                    <table class="list">
                        <thead>
                            <tr>
                                <td>дата</td>
                                <td>время</td>
                                <td>действие</td>
                                <td>раздел</td>
                                <td>пользователь</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $item): ?>
                            <tr <?if($item['action'] == 'delete') {?>style='background: #febcc4;'<?}
                                  if($item['action'] == 'edit') {?>style='background: #fefad3;'<?}
                                  if($item['action'] == 'insert') {?>style='background: #d7ffe3;'<?}?>
                                  >
                                <td><?=$item['date']?></td>
                                <td><?=$item['time']?></td>
                                <td><?=$item['action']?></td>
                                <td><?=$item['table']?></td>
                                <td><?=$item['user']?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>