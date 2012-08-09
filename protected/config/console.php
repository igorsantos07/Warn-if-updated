<?php
require_once '_vars.php';

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'WIU CLI',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading some classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.helpers.*',
		'ext.TurbineCSS.*',
		'ext.pear.*',
	),

	'components'=>array(
		'db'=> require '_db.php',
		'cache' => require '_cache.php',

		'mail' => array(
			'class' => 'ext.mail.YiiMail',
			'logging' => true,
			'dryRun' => PRODUCTION,
			'transportType' => 'smtp',
			'transportOptions' => require '_email.php',
		),
	),

	'params' => require '_params.php',
);