<?php
/**
 * A really simple API for listing books and films
 */
require __DIR__.'/../Pwas/Init.php';


// Let's just pretend this came from a database
$database = array(
  'lists' => array(
    array('name' => 'Books', 'url' => '/books'),
    array('name' => 'Films', 'url' => '/films')
  ),
  'books' => array(
    array('author' => 'Stephen Hawking', 'title' => 'A Brief History of Time'),
    array('author' => 'Simon Singh',     'title' => 'The Code Book'),
    array('author' => 'Simon Singh',     'title' => 'Fermat\'s Last Theorem')
  ),
  'films' => array(
    array('director' => 'Stanley Kubrick', 'title' => 'A Clockwork Orange'),
    array('director' => 'James McTeigue',  'title' => 'V for Vendetta')
  )
);

$app = new \Pwas\Http\Server('127.0.0.1', 9090);

$app->accept(function($request, $response) use($database){
  // We're serving JSON, so it makes sense to have an appropriate Content-Type
  $response->setHeader('Content-Type', 'application/json');
  
  switch ($request->getPath()){
    case '/books':
      $data = $database['books'];
      break;
    case '/films':
      $data = $database['films'];
      break;
    default:
      $data = $database['lists'];
      break;
  }

  $response->write(json_encode($data));
});
