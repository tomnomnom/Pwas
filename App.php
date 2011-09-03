<?php
require('./Core/Init.php');

$app = new \Core\HttpServer(SERVER_IP, SERVER_PORT);
$app->serveStaticFilesFrom('./Public');

$app->accept(function($server) {
	$server->sendHeaders(200, array(
		'Content-Type' => 'text/html'
	));
	$links = new \App\Links($server);

	$db = \Core\PdoFactory::getDb();
	switch ($server->serverVar('path')){
		case '/delete':
			$server->write($links->delete($db));
      break;
		case '/add':
			$server->write($links->add($db));
			break;
		case '/getall':
			$server->write($links->getAll($db));
			break;
		default:
			$server->serveStaticFile('index.html');
			break;
	}
});
