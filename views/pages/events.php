<section id="events" class="calendar">
	<div class="container">
		<h3>История событий</h3>
		<div class="">
			<div class="carousel"> 
				<div class="carousel-button-left"><a href="#"></a></div> 
				<div class="carousel-button-right"><a href="#"></a></div> 
				<div class="carousel-wrapper"> 
					<? 
					$date = date('Y-m-d'); $sql = "SELECT * FROM events WHERE public='yes' ORDER BY date DESC";
					$events = getData($sql);
					foreach ($events as $item) { $newDate = ChangeDate($item['date'],$word);?>
					<div class="carousel-items"> 
						<div class="carousel-block">
							<events>
								<time><p><?=$newDate['m'];?><br><span><?=$newDate['d'];?></span></p></time>
								<div class="description">
									<span><?=$item['title'];?></span>
									<article><?=$item['description'];?></article>
									<links><p>Подробнее</p></links>
									<description><?=$item['text'];?></description>
								</div>
							</events>
						</div>
					</div>
					<?}?>	

				</div>
			</div>
		</div>	
<link rel="stylesheet" type="text/css" href="style/css/styles-carousel.css"> <!-- подключаем стилевой файл -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> <!-- подключаем последнюю версию jQuery -->
<script type="text/javascript" src="js/carousel.js"></script>  <!-- подключаем наш скрипт -->
	</div>
</section>

<div class="window-history">
	<close class="fa fa-times"></close>
	<p></p>
</div>


