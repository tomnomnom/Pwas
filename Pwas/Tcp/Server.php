<?php
namespace Pwas\Tcp;
class Server {
	protected $host;
	protected $port;
	protected $socket;
	protected $client;

	public function __construct($host, $port) {
		if (!$this->portIsValid($port)) $this->fail('Invalid port specified');

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
			if ($pid === -1) $this->fail('Could not fork');

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
		//You may be wondering why this is abstracted into a method...
		//Answer: so its behaviour can be changed by child classes. Woohoo!
		return $fn($this);
	}

	protected function createSocket() {
		$this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($this->socket === false) {
			$this->fail('Socket could not be created');
		}

		if (socket_set_option($this->socket, SOL_SOCKET, SO_REUSEADDR, 1) === false) {
			$this->fail('Could not set reusable sockets');
		}

		if (socket_bind($this->socket, $this->host, $this->port) === false) {
			$this->fail('Could not bind socket');
		}

		if (socket_listen($this->socket) === false) {
			$this->fail('Could not start listening');
		}
	}

	protected function closeSocket() {
		socket_shutdown($this->client);
		socket_close($this->client);
	}

	public function debug($message) {
		if (is_array($message) || is_object($message)){
			$message = print_r($message, true);
		}
		echo "\nDEBUG: {$message}\n";
	}

	protected function fail($message) {
		$this->closeSocket();
		Throw new Exception($message);
	}

	protected function portIsValid($port) {
		if (!is_numeric($port)) return false;
		if ($port <= 0) return false;
		if ($port >= 65535) return false;
		return true;
	}
}
