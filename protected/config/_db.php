<?php
require_once '_vars.php';

if (ENV == 'pagoda') {
	return array(
		'connectionString' => "mysql:host={$_SERVER['DB1_HOST']};mysql:port={$_SERVER['DB1_PORT']};dbname={$_SERVER['DB1_NAME']}",
		'emulatePrepare' => true,
		'username' => $_SERVER['DB1_USER'],
		'password' => $_SERVER['DB1_PASS'],
		'charset' => 'utf8',
		'schemaCachingDuration' => 60*60*24*365, //eternal caching. if there's a need to clean this cache, use a method for it
	);
}
else {
	return array(
		'connectionString' => "sqlite:../protected/data/development.db",
		'emulatePrepare' => true,
		'charset' => 'utf8',
		'schemaCachingDuration' => 60*60*24*365, //eternal caching. if there's a need to clean this cache, use a method for it
	);
}