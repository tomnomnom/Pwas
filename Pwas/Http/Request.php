<?php
namespace Pwas\Http;

class Request {
  protected $getVars    = array();
  protected $postVars   = array();
  protected $serverVars = array();
  protected $cookieVars = array();

  protected $method = '';
  
  public function parseHeaders($headers) {
    $headers = explode("\n", trim($headers));

    //The request is always the first thing, thankfully
    $request = array_shift($headers);
    list($this->method, $path) = explode(' ', $request);
    list($this->serverVars['path']) = explode('?', $path, 2);

    //Parse any get variables
    $pathParts = parse_url($path);
    if (isSet($pathParts['query'])){
      $this->getVars = $this->parseVariableString($pathParts['query']);
    }

    //Store the remaining headers in the serverVars
    $hitLastHeader = false;
    foreach ($headers as $header){
      $header = trim($header);
      if ($header === '') {
        // whitespace seperating headers and postdata
        $hitLastHeader = true;
        continue;
      }
      if ($hitLastHeader){
        // assume postdata
        $this->postVars = $this->parseVariableString($header);
        break;
      }

      $header = explode(':', $header, 2);
      if (sizeOf($header) !== 2){
        // cannot handle non k/v pairs
        continue;
      } 

      $key = trim($header[0]);
      $value = trim($header[1]);

      if (strToLower($key) === 'cookie'){
        $this->cookieVars = $this->parseCookieString($value);
        continue;
      }

      // treat anything remaining as a server var
      $this->serverVars[$key] = $value;
    }
  }

  //Parse a string in the form var1=val1&var2=val2
  protected function parseVariableString($variableString){
    $data = array();
    parse_str($variableString, $data);
    return $data;
  }

  protected function parseCookieString($cookieString){
    $cookies = array();
    foreach (explode(';', $cookieString) as $cookie){
      list($key, $value) = explode('=', $cookie, 2);
      $cookies[trim($key)] = urldecode(trim($value));
    }
    return $cookies;
  }

  public function getVar($key){
    return isSet($this->getVars[$key])? $this->getVars[$key] : null;
  }
  public function getVars(){
    return $this->getVars;
  }

  public function postVar($key){
    return isSet($this->postVars[$key])? $this->postVars[$key] : null;
  }
  public function postVars(){
    return $this->postVars;
  }

  public function serverVar($key){
    return isSet($this->serverVars[$key])? $this->serverVars[$key] : null;
  }
  public function serverVars(){
    return $this->serverVars;
  }

  public function cookieVar($key){
    return isSet($this->cookieVars[$key])? $this->cookieVars[$key] : null;
  }
  public function cookieVars(){
    return $this->cookieVars;
  }

  public function getMethod(){
    return $this->method;
  }

  public function getPath(){
    return $this->serverVar('path');
  }
}
