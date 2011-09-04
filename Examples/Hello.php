<?php
require __DIR__.'/../Pwas/Init.php';

$app = new \Pwas\Http\Server('127.0.0.1', 9090);

$app->accept(function($server){
  $response = $server->getResponse();
  $response->sendHeaders(200, array(
    'Content-Type' => 'text/html'
  ));

  $response->write("Hello, world!");
});
