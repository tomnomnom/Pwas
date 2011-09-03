<?php
spl_autoload_register(function($class){
	$class = ltrim($class, '\\');
	$class = str_replace('\\', '/', $class);
	require __DIR__."/../{$class}.php";
});

$settings = parse_ini_file(__DIR__.'/../Settings.ini', true);

date_default_timezone_set($settings['locale']['timezone']);

