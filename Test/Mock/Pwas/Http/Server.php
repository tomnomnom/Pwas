<?php
namespace Test\Mock\Pwas\Http;

class Server extends \Pwas\Http\Server {
  protected $writtenData = '';

  public function accept($fn){

  }
  
  public function read(){

  }

  public function write($data){
    $this->writtenData .= $data;
  }

  public function getWrittenData(){
    return $this->writtenData; 
  }

  public function getAndClearWrittenData(){
    $writtenData = $this->writtenData;
    $this->writtenData = '';
    return $writtenData;
  }
}
