<?php $table = 'requisites'; $idRow = 1; $data = pageData($idRow,$table); ?>
<div class="work editWindow">
    <form action="" enctype="multipart/form-data" method="post">
        <div class="langButton">
            <div id="ru" class="ru active">РУ</div>
            <div id="ua" class="ua">УА</div>
        </div>
        <h2 class="editTitle">Редактирование контактной информации</h2>
        <label>AdSaver:</label>
        <div class="box"><input type="radio" name="public" value="yes" <?if($data['public'] == 'yes') echo 'checked';?>>Да</div>
        <div class="box"><input type="radio" name="public" value="no" <?if($data['public'] == 'no') echo 'checked';?>>Нет</div>
        <pre></pre>
        <label>Телефон:</label><input type="text" name='phone' value='<?=$data['phone'];?>' placeholder="телефон"><pre></pre>
        <label>Tel link:</label><input type="text" name='tel' value='<?=$data['tel'];?>' placeholder="ссылка номер для звонка"><pre></pre>
        <label>Mail:</label><input type="text" name='mail' value='<?=$data['mail'];?>' placeholder="почта"><pre></pre>
        <div id="lang_ru" class="language">
            <label>Адрес RU</label><input type="text" name='addr_ru' value='<?=$data['addr_ru'];?>' placeholder="адрес"><pre></pre>
            <label>График RU</label><input type="text" name='graph_ru' value='<?=$data['graph_ru'];?>' placeholder="график"><pre></pre>
        </div>
        <div id="lang_ua" class="language">
            <label>Адрес UA</label><input type="text" name='addr_ua' value='<?=$data['addr_ua'];?>' placeholder="адрес"><pre></pre>
            <label>График UA</label><input type="text" name='graph_ua' value='<?=$data['graph_ua'];?>' placeholder="график"><pre></pre>
        </div>
        <input type="hidden" name='table' value='<?=$table;?>'>
        <input type="hidden" name='id' value='<?=$data['id'];?>'>
        <input type="submit" name="edit" value="сохранить изменения!" style="width: 200px;">
    </form>
</div>
