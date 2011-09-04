<?php
namespace Pwas\Http;
class Server extends \Pwas\Tcp\Server {
  protected $request;
  protected $response;

  protected $static_files_path = null;

  public function callUserFunction($fn){
    $this->request = new Request();
    $this->request->parseHeaders($this->read());

    $this->response = new Response($this);

    if (!$this->serveStaticFiles()){
      parent::callUserFunction($fn);
    }
  }

  public function getResponse(){
    return $this->response;
  }
  public function getRequest(){
    return $this->request;
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

}



