<?php
require_once '_vars.php';

if (ENV == 'pagoda') {
	$db_config = array(
		'connectionString' => "mysql:host={$_SERVER['DB1_HOST']};mysql:port={$_SERVER['DB1_PORT']};dbname={$_SERVER['DB1_NAME']}",
		'username' => $_SERVER['DB1_USER'],
		'password' => $_SERVER['DB1_PASS'],
	);
}
else {
	$db_config = array(
		'connectionString' => "sqlite:../protected/data/development.db",
	);
}

return array_merge(
	array(
		'emulatePrepare' => true,
		'charset' => 'utf8',
		'schemaCachingDuration' => 60*60*24*365, //eternal caching. if you need to clean this cache, use a method
	),
	$db_config
);