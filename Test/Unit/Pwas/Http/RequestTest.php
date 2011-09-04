<?php
namespace Test\Unit\Pwas\Http;

class RequestTest extends \PHPUnit_Framework_TestCase {
  public function testGetVars(){
    $request = new \Pwas\Http\Request();
    $request->parseHeaders("GET /somefile?foo=bar&arr[]=one&arr[]=two HTTP/1.0");

    $this->assertEquals($request->getVar('foo'), 'bar');
    $this->assertEquals($request->getVar('arr'), array('one', 'two'));
    $this->assertEquals($request->getVars(), array(
      'foo' => 'bar',
      'arr' => array(
        'one', 'two'
      )
    ));
  }

  public function testPostVars(){
    $request = new \Pwas\Http\Request();
    $request->parseHeaders("POST / HTTP/1.0\r\n\r\nfoo=bar&bin=beb");

    $this->assertEquals($request->postVar('foo'), 'bar');
    $this->assertEquals($request->postVar('bin'), 'beb');
    $this->assertEquals($request->postVars(), array(
      'foo' => 'bar', 
      'bin' => 'beb'
    ));
  }
}
