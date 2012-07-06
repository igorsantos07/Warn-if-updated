<?php
return array(
	'admin/' => 'admin/default/index',

	'<action:(login|logout)>' => 'site/<action>',

	'admin/<controller:\w+>/<id:\d+>' => 'admin/<controller>/view',
	'admin/<controller:\w+>/<action:\w+>/<id:\d+>' => 'admin/<controller>/<action>',
	'admin/<controller:\w+>/<action:\w+>' => 'admin/<controller>/<action>',

	'<controller:\w+>/<id:\d+>' => '<controller>/view',
	'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
	'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
);
