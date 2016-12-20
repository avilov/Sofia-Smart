<?php $sql = "SELECT * FROM scripts"; $data = getData($sql); ?>
                    <h1>Управление Страницами сайта [ контент, блоки ]</h1>
                    <?php foreach ($data as $item): ?>
                    <a href="script-edit/<?=$item['id']?>" class="selection"><?=$item['title']?></a>
                    <?php endforeach; ?>