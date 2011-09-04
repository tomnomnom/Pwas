<?php
namespace Pwas\Http;
class Server extends \Pwas\Tcp\Server {

  public function callUserFunction($fn){
    $request = new Request();
    $request->parseHeaders($this->read());

    $response = new Response($this);

    call_user_func_array($fn, array(
      $request, $response
    ));
  }
}



