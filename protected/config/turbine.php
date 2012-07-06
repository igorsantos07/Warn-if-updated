<?php
require '_vars.php';

/**
 * This file is part of Turbine
 * http://github.com/igorsantos07/Turbine
 *
 * Copyright Peter Kröner
 * Licensed under GNU LGPL 3, see license.txt or http://www.gnu.org/licenses/
 */


$config = array(
	// Sets debugging off (0), on (1), or in developer mode (2)
	// Mode 0 hides all error messages
	// Mode 1 displays error messages related to the style sheets (like elements trying to inherit properties that don't exist)
	// Mode 2 additionally displays php developer messages and sets error_reporting to E_ALL
	'debug_level' => PRODUCTION? 0 : 2,

	// Minify regular css files (true) oder include them completely unchanged (false)
	'minify_css' => true,

	// Base path to cssp and css files relative to css.php
	'css_base_dir' => '',

	// Base path of 'turbine' folder
	'turbine_base_dir' => '../../protected/extensions/TurbineCSS/turbine/',

	// Cache path relative to css.php
	'cache_dir' => '../../protected/runtime/',

	// dirs where other css files could be, outside the base dir
	'allowed_dirs' =>  array('../assets/'),
);