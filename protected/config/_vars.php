<?php
$env = getenv('ENV');
define('ENV', $env? $env : 'pagoda');
define('PRODUCTION', ENV == 'pagoda');