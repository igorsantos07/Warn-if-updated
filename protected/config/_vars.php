<?php
$env = getenv('ENV');
define('ENV', $env? $env : 'prod');
define('PRODUCTION', ENV == 'prod');