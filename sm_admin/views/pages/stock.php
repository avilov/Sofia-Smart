<?php $table = 'stock'; $idRow = 1; $data = pageData($idRow,$table); ?>
<div class="work editWindow">
    <form action="" enctype="multipart/form-data" method="post">
        <div class="langButton">
            <div id="ru" class="ru active">РУ</div>
            <div id="ua" class="ua">УА</div>
        </div>
        <h2 class="editTitle">Редактирование информации в шапке сайта</h2>
        <label>Публикация:</label>
        <div class="box"><input type="radio" name="public" value="yes" <?if($data['public'] == 'yes') echo 'checked';?>>Да</div>
        <div class="box"><input type="radio" name="public" value="no" <?if($data['public'] == 'no') echo 'checked';?>>Нет</div>
        <pre></pre>
        <div id="lang_ru" class="language">
            <label>Цена RU</label><input type="text" name='price_ru' value='<?=$data['price_ru'];?>' placeholder="описание"><pre></pre>
            <label>Текст RU</label><input type="text" name='short_ru' value='<?=$data['short_ru'];?>' placeholder="тект в круге"><pre></pre>
            <label>Заголовок RU</label><input type="text" name='title_ru' value='<?=$data['title_ru'];?>' placeholder="заголовок"><pre></pre>
            <label>Описание RU</label><input type="text" name='descript_ru' value='<?=$data['descript_ru'];?>' placeholder="описание"><pre></pre>
            <label>Текст ссылки RU</label><input type="text" name='link_ru' value='<?=$data['link_ru'];?>' placeholder="описание"><pre></pre>
        </div>
        <div id="lang_ua" class="language">
            <label>Цена UA</label><input type="text" name='price_ua' value='<?=$data['price_ua'];?>' placeholder="описание"><pre></pre>
            <label>Текст UA</label><input type="text" name='short_ua' value='<?=$data['short_ua'];?>' placeholder="тект в круге"><pre></pre>
            <label>Заголовок UA</label><input type="text" name='title_ua' value='<?=$data['title_ua'];?>' placeholder="заголовок"><pre></pre>
            <label>Описание UA</label><input type="text" name='descript_ua' value='<?=$data['descript_ua'];?>' placeholder="описание"><pre></pre>
            <label>Текст ссылки UA</label><input type="text" name='link_ua' value='<?=$data['link_ua'];?>' placeholder="описание"><pre></pre>
        </div>
        <label>Ссылка</label><input type="text" name='url' value='<?=$data['url'];?>' placeholder="ссылка на страницу"><pre></pre>
        <!--<input type="file" name="filename"> * файл не более 2мб.! <img class="newsEdit" src="../userfiles/<?=$table;?>/<?=$data['img'];?>" title="текущая обложка"><pre></pre>-->
        <input type="hidden" name='table' value='<?=$table;?>'>
        <input type="hidden" name='id' value='<?=$data['id'];?>'>
        <input type="hidden" name='oldImg' value='<?=$data['img'];?>'>
        <input type="submit" name="edit" value="сохранить изменения!" style="width: 200px;">
    </form>
</div>
