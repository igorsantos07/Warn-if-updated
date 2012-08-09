<?php
require_once '_vars.php';

if (ENV == 'pagoda') {
		$host = $_SERVER['DB1_HOST'];
		$port = $_SERVER['DB1_PORT'];
		$name = $_SERVER['DB1_NAME'];
		$user = $_SERVER['DB1_USER'];
		$pass = $_SERVER['DB1_PASS'];
}
else {
	$host = 'localhost';
	$port = 3306;
	$name = $user = $pass = 'wiu';
}

return array(
	'connectionString' => "mysql:host=$host;mysql:port=$port;dbname=$name",
	'username' => $user,
	'password' => $pass,
	'emulatePrepare' => true,
	'charset' => 'utf8',
	'schemaCachingDuration' => 60*60*24*365, //eternal caching. if you need to clean this cache, use a method
);