<?php
namespace Pwas\Tcp;
class Server {
  protected $host;
  protected $port;
  protected $socket;
  protected $client;

  const SOCKET_DOMAIN   = AF_INET;
  const SOCKET_TYPE     = SOCK_STREAM;
  const SOCKET_PROTOCOL = SOL_TCP;

  public function __construct($host, $port){
    if ($this->portIsValid($port) === false){
      throw new Exception("Invalid port specified");
    }

    $this->port = $port;
    $this->host = $host;
  }

  // Wait for a client to connect, and then run the user defined function
  public function accept($fn){
    $this->createSocket();

    while (true){
      $this->client = socket_accept($this->socket); 
      if ($this->client === false){
        continue;
      }

      $pid = pcntl_fork();
      if ($pid === -1){
        throw new Exception("Could not fork");
      }

      if ($pid){
        pcntl_waitpid(-1, $status, WNOHANG);
        continue;
      } else {
        break;
      }
    }
    
    //In the child process
    $this->callUserFunction($fn);
    $this->closeSocket(); 
  }
  
  public function read($length = 1024){
    return socket_read($this->client, $length, PHP_BINARY_READ);
  }

  public function write($data){
    return socket_write($this->client, $data);
  }
  
  protected function callUserFunction($fn){
    return call_user_func($fn, $this);
  }

  protected function createSocket(){
    $this->socket = socket_create(
      static::SOCKET_DOMAIN,
      static::SOCKET_TYPE,
      static::SOCKET_PROTOCOL
    );

    if ($this->socket === false){
      throw new Exception("Socket could not be created");
    }

    if (socket_set_option($this->socket, SOL_SOCKET, SO_REUSEADDR, 1) === false){
      throw new Exception('Could not set reusable sockets');
    }

    if (socket_bind($this->socket, $this->host, $this->port) === false){
      throw new Exception("Could not bind socket [{$this->host}:{$this->port}]");
    }

    if (socket_listen($this->socket) === false){
      throw new Exception('Could not start listening');
    }
  }

  protected function closeSocket(){
    socket_shutdown($this->client);
    socket_close($this->client);
  }

  protected function portIsValid($port){
    if (!is_numeric($port)) return false;
    if ($port <= 0) return false;
    if ($port >= 65535) return false;
    return true;
  }
}
