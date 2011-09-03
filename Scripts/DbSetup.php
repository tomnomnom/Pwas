#!/usr/local/bin/php
<?php
require('./Core/Init.php');
$db = \Core\PdoFactory::getDb();

$db->query("
	create table if not exists links (
		id integer primary key autoincrement,
		title text,
		url text unique,
    date numeric
	)
");

$r = $db->query('select * from links');

print_r($r->fetchAll(PDO::FETCH_OBJ));

