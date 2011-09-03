<?php
require __DIR__.'/../Pwas/Init.php';

$app = new \Pwas\Http\Server('127.0.0.1', 9090);

$app->accept(function($server) {
  $server->sendHeaders(200, array(
    'Content-Type' => 'text/html'
  ));
  $server->write("Hello, world!");
});
