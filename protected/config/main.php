<?php
require_once '_vars.php';

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
$config = array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'WIU',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading some classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.helpers.*',
		'ext.TurbineCSS.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array('class'=>'system.gii.GiiModule', 'password'=>'gii', 'ipFilters'=>array('127.0.0.1','::1')),
		'admin',
	),

	// application components
	'components'=>array(
		'db'			=> require '_db.php',
		'cache'			=> require '_cache.php',
		'errorHandler'	=> array('errorAction'=>'/site/error'),
		'authManager'	=> array('class' => 'CPhpAuthManager'),

		'clientScript'	=> array(
			'class' => 'ext.TurbineCSS.TurbineClientScript',
			'excludeFromCompiling' => array(
				'/menu_white.css$/',
				'/jquery-ui/',
				'/gridview\/styles.css$/',
				'/7db3dc83\/style.css$/' //developer toolbar
			),
		),

		'user'=>array(
			'allowAutoLogin'=>true,
			'loginUrl' => '/site/login',
		),

		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
			'rules' => require '_routes.php',
		),

		'mail' => array(
			'class' => 'ext.mail.YiiMail',
			'logging' => true,
			'dryRun' => !PRODUCTION,
			'transportType' => 'smtp',
			'transportOptions' => require '_email.php',
		),

		'log' => array('class'=>'CLogRouter',
			'routes'=>array(
				array('class'=>'CFileLogRoute',
					'logFile' => 'error.log',
					'levels'=>'error, warning',
				),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => require '_params.php',
);

if (!PRODUCTION) {
	$config['components']['log']['routes'][] = array(
		'class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
		'openLastPanel'=>true,
	);
}

return $config;