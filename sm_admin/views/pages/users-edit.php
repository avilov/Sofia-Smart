<?php $table = 'users'; $data = pageData($idRow,$table); ?>
<div class="work editWindow">
                        <form action="" enctype="multipart/form-data" method="post">
                            <h2 class="editTitle">Редактирование Пользователя [ <?=$data['username'];?> ]</h2>
                            <label>Имя</label><input type="text" name='firstname' value='<?=$data['firstname'];?>' placeholder="Имя"><pre></pre>
                            <label>Фамилия</label><input type="text" name='lastname' value='<?=$data['lastname'];?>' placeholder="Фамилия"><pre></pre>
                            <label>Логин</label><input type="text" name='username' value='<?=$data['username'];?>' placeholder="Логин"><pre></pre>
                            <label>Пароль</label><input type="password" name='password' value='<?=$data['password'];?>' placeholder="Пароль"><pre></pre>
                            <label>E-mail</label><input type="text" name='email' value='<?=$data['email'];?>' placeholder=""><pre></pre>
                            <input type="file" name="filename"> * файл не более 2мб.! <img class="newsEdit" <? if($data['img']) {?>src="upload/users/<?=$data['img'];?>"<?} else {?>src="images/avatar.jpg"<?}?> title="текущая обложка"><pre></pre>
                            <input type="hidden" name='table' value='<?=$table;?>'>
                            <input type="hidden" name='id' value='<?=$data['id'];?>'>
                            <input type="hidden" name='oldImg' value='<?=$data['img'];?>'>
                            <input type="submit" name="edit" value="сохранить изменения!" style="width: 200px;">
                        </form>
                    </div>
<?php $admin = $data['username']; $sql = "SELECT * FROM userlog WHERE user='$admin' ORDER BY id DESC"; $data = getData($sql); ?>
                    <h1>Действия данного администратора</h1>
                    <table class="list">
                        <thead>
                            <tr>
                                <td>дата</td>
                                <td>время</td>
                                <td>действие</td>
                                <td>раздел</td>
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
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>