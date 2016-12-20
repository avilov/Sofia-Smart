<section id="video" class="video">
    <div class="container">
        <h3><i class="fa fa-youtube" aria-hidden="true"></i>Видео</h3>
        <figcaption>
            <?
            $sql = "SELECT * FROM video ORDER BY id DESC"; $video = getData($sql);
            foreach ($video as $item) {?>
                <figure>
                    <iframe src="<?=$item['url'];?>" frameborder="0" allowfullscreen></iframe>
                    <h6><?=$item['title'];?></h6>
                    <article><?=$item['text'];?></article>
                </figure>
            <?}?>
        </figcaption>
    </div>
</section>