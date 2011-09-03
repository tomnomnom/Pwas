<?php
namespace Pwas\Tcp;
class Server {
  protected $host;
  protected $port;
  protected $socket;
  protected $client;

  public function __construct($host, $port) {
    if (!$this->portIsValid($port)){
      throw new Exception("Invalid port specified");
    }

    $this->port = $port;
    $this->host = $host;
    
    $this->createSocket();
  }

  // Wait for a client to connect, and then run the user defined function
  public function accept($fn) {
    while (true) {
      $this->client = socket_accept($this->socket); 
      if ($this->client === false) continue;
      $this->debug('Client connected');

      $pid = pcntl_fork();
      if ($pid === -1){
        throw new Exception("Could not fork");
      }

      if ($pid) {
        pcntl_waitpid(-1, $status, WNOHANG);
        continue;
      } else break;
    }
    
    //In the child process
    $this->callUserFunction($fn);
    $this->closeSocket(); 
    $this->debug('Client disconnected');
  }
  
  public function read($length = 1024) {
    return socket_read($this->client, $length, PHP_BINARY_READ);
  }

  public function write($data) {
    return socket_write($this->client, $data);
  }
  
  protected function callUserFunction($fn){
    return call_user_func($fn, $this);
  }

  protected function createSocket() {
    $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    if ($this->socket === false) {
      throw new Exception("Socket could not be created");
    }

    if (socket_set_option($this->socket, SOL_SOCKET, SO_REUSEADDR, 1) === false) {
      throw new Exception('Could not set reusable sockets');
    }

    if (socket_bind($this->socket, $this->host, $this->port) === false) {
      throw new Exception("Could not bind socket [{$this->host}:{$this->port}]");
    }

    if (socket_listen($this->socket) === false) {
      throw new Exception('Could not start listening');
    }
  }

  protected function closeSocket() {
    socket_shutdown($this->client);
    socket_close($this->client);
  }

  public function debug($message) {
    if (is_array($message) || is_object($message)){
      $message = var_dump($message, true);
    }
    echo "\nDEBUG: {$message}\n";
  }

  protected function portIsValid($port) {
    if (!is_numeric($port)) return false;
    if ($port <= 0) return false;
    if ($port >= 65535) return false;
    return true;
  }
}
