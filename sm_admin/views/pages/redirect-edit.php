<?php $sql = "SELECT * FROM redirect ORDER BY id"; $data = getData($sql); ?>
                    <h1>Настройка редиректов</h1>
                    <table class="list">
                        <thead>
                            <tr>
                                <td>дата</td>
                                <td>старый url</td>
                                <td>новый url</td>
                                <td>действие</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $item): ?>
                            <tr>
                                <form action="" enctype="multipart/form-data" method="post">
                                <td>evromisto.com.ua</td>
                                <td><input type="text" name="oldurl" value="<?=$item['oldurl']?>" style="width: 250px;"></td>
                                <td><input type="text" name="newurl" value="<?=$item['newurl']?>" style="width: 250px;"></td>
                                <td>
                                    <input type="hidden" name='id' value='<?=$item['id']?>'>
                                    <input type="hidden" name='table' value='redirect'>
                                    <input type="submit" name="edit" class="button save" value="" style="width: 32px; height: 32px; padding: 5px; float: left;">
                                    <a href="redirect/<?=$item['id']?>/delete" class="button del" title="удалить"></a>
                                </td>
                                </form>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="work editWindow">
                        <form action="" enctype="multipart/form-data" method="post">
                            <h1>Добавление нового редиректа</h1>
                            <label>Текущий:</label><input type="text" name="oldurl" value="" placeholder="/example/link" style="width: 350px;"><pre></pre>
                            <label>Новый:</label><input type="text" name="newurl" value="" placeholder="/example/link" style="width: 350px;"><pre></pre>
                            <input type="hidden" name='table' value='redirect'>
                            <input type="submit" name="add" value="добавить">
                        </form>
                    </div>