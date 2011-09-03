<?php
function __autoload($class){
	$class = ltrim($class, '\\');
	$class = str_replace('\\', '/', $class);
	require("./{$class}.class.php");
}

$settings = parse_ini_file('./Settings.ini', true);

//Database settings
\Core\PdoFactory::setConfig(array(
	'driver' 	 => $settings['database']['driver'],
	'filename' => $settings['database']['filename']
));

//Locale settings
date_default_timezone_set($settings['locale']['timezone']);

//Server settings
define('SERVER_IP', $settings['server']['ip']);
define('SERVER_PORT', $settings['server']['port']);
