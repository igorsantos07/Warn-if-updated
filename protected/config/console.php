<?php

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'WIU CLI',

	'components'=>array(
		'db'=> require '_db.php',
		'cache' => require '_cache.php',
	),
);