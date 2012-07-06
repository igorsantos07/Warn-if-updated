<? return array(
	'connectionString' => "sqlite:protected/data/development.db",
	'emulatePrepare' => true,
	'charset' => 'utf8',
	'schemaCachingDuration' => 60*60*24*365, //eternal caching. if there's a need to clean this cache, use a method for it
);