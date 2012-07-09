<?php
$db = require '_db.php';
$db['connectionString'] = preg_replace('|:../protected/|', ':$1', $db['connectionString']);
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'WIU CLI',

	'components'=>array(
		'db'=> $db,
		'cache' => require '_cache.php',
	),
);