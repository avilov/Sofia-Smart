<?php $sql = "SELECT * FROM mail ORDER BY id DESC"; $data = getData($sql); ?>
                    <h1>Логи заявок с форм сайта</h1>
                    <table class="list">
                        <thead>
                            <tr>
                                <td>дата</td>
                                <td>вход<br>отправка</td>
                                <td>источник / страница</td>
                                <td>тип формы</td>
                                <td>имя</td>
                                <td>телефон / e-mail</td>
                                <td>комментарий</td>
                                <td>код квартиры</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $item): ?>
                            <tr>
                                <td><?=$item['date']?></td>
                                <td><?=$item['visited']?><br><?=$item['send']?></td>
                                <td><div><?=$item['referer']?></div><div><?=$item['page']?></div></td>
                                <td><?=$item['typeform']?></td>
                                <td><?=$item['name']?></td>
                                <td><?=$item['phone']?><br><?=$item['mail']?></td>
                                <td><?=$item['comment']?></td>
                                <td><?=$item['code']?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <style>
                        td div {width: 200px; height: 30px; margin: 0 auto 5px; overflow: hidden; overflow-y: scroll; background: #fff;}
                    </style>