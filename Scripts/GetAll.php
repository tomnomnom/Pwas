#!/usr/local/bin/php
<?php
require('./Core/Init.php');
$db = \Core\PdoFactory::getDb();

$r = $db->query('select * from links');
print_r($r->fetchAll(PDO::FETCH_OBJ));

