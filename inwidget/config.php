<?php

// ONLY FOR OPTIONS: LOGIN, ACCESS_TOKEN, HASHTAG:
// IF CACHE FILE EXIST, DELETE IT OR WAIT "CACHE EXPIRATION TIME" TO APPLY CHANGES! 

$CONFIG = array(

	// Instagram login
	'LOGIN' => 'leocraft_test',

	// ACCESS TOKEN granted to you by some Instagram app.
	// Follow this link: http://inwidget.ru/getAccessToken.php
	// to get your own ACCESS TOKEN by inWidget app.
	'ACCESS_TOKEN' => '1690021902.479bfa4.d1777f753ab44d06bfee28245c42bb2a',

	// Get pictures from WORLDWIDE by tag name. 
	// Use this options only if you want show pictures of other users. 
	// Profile avatar and statistic will be hidden.
	'HASHTAG' => '',

	// Random order of pictures [ true / false ]
	'imgRandom' => false,

	// How many pictures widget will get from Instagram?
	'imgCount' => 5,

	// Cache expiration time (hours)
	'cacheExpiration' => 0.1,

	// Default language [ ru / en ] or something else from lang directory.
	'langDefault' => 'ru',

	// Language auto-detection [ true / false ]
	// This option may no effect if you set language by $_GET variable
	'langAuto' => false,

);