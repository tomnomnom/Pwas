<?php
require __DIR__.'/../Pwas/Init.php';

$app = new \Pwas\Http\Server('127.0.0.1', 9090);

$app->accept(function($request, $response){
  $response->setStatus(200)
           ->addHeader('Content-Type: text/html');

  $response->write("Hello, world!");
});
