<?php
$table = 'pages';
$idRow = $_POST['id'];
require __DIR__.'/../../../core/connectDb.php';
require __DIR__.'/../../core/adminFns.php';
// =====================================================================================================================
$data = pageData($idRow,$table);
?>
<h2 class="editTitle">Редактирование данных SEO по странице [ <?=$data['menu_ru'];?> ]</h2>
                            <label>Title_RU</label><input type="text" name='title_ru' value='<?=$data['title_ru'];?>' placeholder="титул ру"><pre></pre>
                            <label>Title_UA</label><input type="text" name='title_ua' value='<?=$data['title_ua'];?>' placeholder="титул уа"><pre></pre>
                            <label>Descrition_RU</label><input type="text" name='descript_ru' value='<?=$data['descript_ru'];?>' placeholder="описание ру"><pre></pre>
                            <label>Descrition_UA</label><input type="text" name='descript_ua' value='<?=$data['descript_ua'];?>' placeholder="описание уа"><pre></pre>
                            <label>Keywords_RU</label><input type="text" name='keywords_ru' value='<?=$data['keywords_ru'];?>' placeholder="клучевые слова ру"><pre></pre>
                            <label>Keywords_UA</label><input type="text" name='keywords_ua' value='<?=$data['keywords_ua'];?>' placeholder="клучевые слова уа"><pre></pre>
                            <input type="hidden" name='table' value='pages'>
                            <input type="hidden" name='id' value='<?=$data['id'];?>'>
                            <input type="submit" name="edit" value="сохранить">