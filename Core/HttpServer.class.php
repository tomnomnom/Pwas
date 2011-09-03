<?php
namespace Core;
class HttpServer extends TcpServer {
	protected $headers_sent = false;	
	protected $get_vars = array();
	protected $post_vars = array();
	protected $server_vars = array();
	protected $cookie_vars = array();

	protected $static_files_path = null;

	public function callUserFunction($fn){
		//Parse the request headers BEFORE the user function is called
		$this->parseRequestHeaders($this->read());
		if (!$this->serveStaticFiles()){
			parent::callUserFunction($fn);
		}
	}

	public function serveStaticFilesFrom($path){
		$this->static_files_path = $path;	
	}

	protected function serveStaticFiles(){
		if (!$this->static_files_path) return false;
		$path = $this->static_files_path . '/' . $this->serverVar('path');
		if (!file_exists($path)) return false;
		if($this->write(file_get_contents($path))) return true;
		return false;
	}

	public function serveStaticFile($file){
		$file = "{$this->static_files_path}/{$file}";
		if($this->write(file_get_contents($file))) return true;
		return false;
	}

	public function sendHeaders($status, Array $headers = array()){
		if ($this->headers_sent) return false;
		$status = $this->getStatusString($status);
		$header = "HTTP/1.1 {$status}\n";
		foreach ($headers as $k => $v){
			$header .= "{$k}: {$v}\n";
		}
		$header .= "\n";
		return $this->write($header);
	}

	public function getStatusString($status){
		$status_strings = array(
			200 => '200 OK'
		);
		return isSet($status_strings[$status])? $status_strings[$status] : '';
	}

	public function getVar($key){
		return isSet($this->get_vars[$key])? $this->get_vars[$key] : null;
	}
	public function getVars(){
		return $this->get_vars;
	}

	public function postVar($key){
		return isSet($this->post_vars[$key])? $this->post_vars[$key] : null;
	}
	public function postVars(){
		return $this->post_vars;
	}

	public function serverVar($key){
		return isSet($this->server_vars[$key])? $this->server_vars[$key] : null;
	}
	public function serverVars(){
		return $this->server_vars;
	}

	public function cookieVar($name){
		return isSet($this->cookie_vars[$key])? $this->cookie_vars[$key] : null;
	}
	public function cookieVars(){
		return $this->cookie_vars;
	}
	public function setCookie($name, $value){
		//Stub
	}

	private function parseRequestHeaders($headers){
		$headers = explode("\n", trim($headers));

		//The request is always the first thing, thankfully
		$request = array_shift($headers);
		list($method, $path) = explode(' ', $request);
		list($this->server_vars['path']) = explode('?', $path, 2);

		$this->debug("Request: {$path}");
		
		//Parse any get variables
		$path_parts = parse_url($path);
		if (isSet($path_parts['query'])){
			$this->get_vars = $this->parseVariableString($path_parts['query']);
		}

		//Parse any post data
		if ($method === 'POST'){
			$this->post_vars = $this->parseVariableString(array_pop($headers));
		}

		//Store the remaining headers in the server_vars
		foreach ($headers as $header){
			$header = explode(':', trim($header));
			$key = trim($header[0]);
			$value = trim($header[1]);
			$this->server_vars[$key] = $value;

			if (strToLower($key) === 'cookie'){
				$this->cookie_vars = $this->parseVariableString($value);
			}
		}

	}

	//Parse a string in the form var1=val1&var2=val2
	private function parseVariableString($variable_string){
		//TODO: Handle arrays in the string
		$return_data = array();
		$variables = explode('&', $variable_string);
		foreach ($variables as $variable){
			$variable = explode('=', $variable);
			if (sizeOf($variable) != 2) continue;
			$return_data[$variable[0]] = urldecode($variable[1]);
		}
		return $return_data;
	}

}



