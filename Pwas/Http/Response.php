<?php
namespace Pwas\Http;

class Response {
  protected $headersSent = false;
  protected $server;

  protected $statusStrings = array(
    200 => '200 OK'
  );

  public function __construct(Server $server){
    $this->server = $server;
  }

  public function write($data){
    return $this->server->write($data);
  }

  public function sendHeaders($status, Array $headers = array()){
    if ($this->headersSent) return false;
    $status = $this->getStatusString($status);
    $header = "HTTP/1.1 {$status}\n";
    foreach ($headers as $k => $v){
      $header .= "{$k}: {$v}\n";
    }
    $header .= "\n";
    $this->headersSent = true;
    return $this->write($header);
  }

  public function getStatusString($status){
    return isSet($this->statusStrings[$status])? 
      $this->statusStrings[$status] : '';
  }

  public function setCookie($name, $value){
    throw new Exception("Setting of cookies is not implemented yet");
  }
}
