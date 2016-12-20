<?php $sql = "SELECT id,menu_ru FROM pages"; $data = getData($sql); ?>
                    <h1>Управление Страницами сайта [ контент, блоки ]</h1>
                    <?php foreach ($data as $item): ?>
                    <a href="pages-edit/<?=$item['id']?>" class="selection"><?=$item['menu_ru']?></a>
                    <?php endforeach; ?>
                    