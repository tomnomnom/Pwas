<?php
namespace Pwas\Http;

class Response {
  protected $server;

  protected $status = 200;
  protected $headersSent = false;
  protected $headers = array(
    'Content-Type' => 'text/html'
  );

  protected $statusStrings = array(
    100 => 'Continue',
    101 => 'Switching Protocols',
    200 => 'OK',
    201 => 'Created',
    202 => 'Accepted',
    203 => 'Non-Authoritative Information',
    204 => 'No Content',
    205 => 'Reset Content',
    206 => 'Partial Content',
    300 => 'Multiple Choices',
    301 => 'Moved Permanently',
    302 => 'Found',
    303 => 'See Other',
    304 => 'Not Modified',
    305 => 'Use Proxy',
    307 => 'Temporary Redirect',
    400 => 'Bad Request',
    401 => 'Unauthorized',
    402 => 'Payment Required',
    403 => 'Forbidden',
    404 => 'Not Found',
    405 => 'Method Not Allowed',
    406 => 'Not Acceptable',
    407 => 'Proxy Authentication Required',
    408 => 'Request Timeout',
    409 => 'Conflict',
    410 => 'Gone',
    411 => 'Length Required',
    412 => 'Precondition Failed',
    413 => 'Request Entity Too Large',
    414 => 'Request-URI Too Long',
    415 => 'Unsupported Media Type',
    416 => 'Requested Range Not Satisfiable',
    417 => 'Expectation Failed',
    500 => 'Internal Server Error',
    501 => 'Not Implemented',
    502 => 'Bad Gateway',
    503 => 'Service Unavailable',
    504 => 'Gateway Timeout',
    505 => 'HTTP Version Not Supported'
  );

  public function __construct(Server $server){
    $this->server = $server;
  }

  public function write($data){
    if ($this->headersSent === false){
      $this->sendHeaders();
    }
    return $this->server->write($data);
  }

  public function setStatus($code){
    if (!isSet($this->statusStrings[$code])){
      throw new Exception("[{$code}] is not a recognised HTTP status code");
    }
    $this->status = $code;
    return $this;
  }

  public function setHeader($name, $value){
    $this->headers[$name] = $value;
    return $this;
  }

  public function setHeaders(array $headers){
    foreach ($headers as $name => $value){
      $this->setHeader($name, $value);
    }
    return $this;
  }

  public function sendHeaders(array $headers = array()){
    if ($this->headersSent) return false;
    $this->setHeaders($headers);

    $statusText = $this->statusStrings[$this->status];
    $headerText = "HTTP/1.1 {$this->status} {$statusText}\r\n";

    foreach ($this->headers as $name => $value){
      $headerText .= "{$name}: {$value}\r\n";
    }
    $headerText .= "\r\n";
    $this->headersSent = true;

    // Can not call $this->write; it will recurse
    return $this->server->write($headerText);
  }

  public function setCookie($name, $value){
    throw new Exception("Setting of cookies is not implemented yet");
  }
}
