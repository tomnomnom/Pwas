<?php
/*
 * Constructs PDO objects - forming a DSN all over the place can be a pain
 */
namespace Core;
class PdoFactory {
	private static $driver;
	private static $filename;

	private function __construct(){}

	public static function setConfig(Array $config){
		if (isSet($config['driver'])) self::$driver = $config['driver'];
		if (isSet($config['filename'])) self::$filename = $config['filename'];
	}
	public function getDb(){
		$driver = self::$driver;
		$filename = self::$filename;
		return new \Pdo("{$driver}:{$filename}");
	}
}
