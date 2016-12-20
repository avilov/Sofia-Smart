<?php $sql = "SELECT id,menu_ru FROM pages"; $data = getData($sql); ?>
                    <h1>Управление SEO [ title, description, keywords  ]</h1>
                    <?php foreach ($data as $item): ?>
                    <a link="pages_seo" id='<?=$item['id']?>' class="selection"><?=$item['menu_ru']?></a>
                    <?php endforeach; ?>
                    <div class="edit work seo editWindow">
                        <div class="close">закрыть</div>
                        <form action="" method="post">
                            
                        </form>
                    </div>