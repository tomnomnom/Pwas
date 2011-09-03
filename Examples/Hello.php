<?php
require __DIR__.'/../Core/Init.php';

$app = new \Core\HttpServer('127.0.0.1', 9090);

$app->accept(function($server) {
	$server->sendHeaders(200, array(
		'Content-Type' => 'text/html'
	));
  $server->write("Hello, world!");
});
