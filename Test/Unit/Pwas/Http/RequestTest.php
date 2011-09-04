<?php
namespace Test\Unit\Pwas\Http;

class RequestTest extends \PHPUnit_Framework_TestCase {
  public function testGetVars(){
    $request = new \Pwas\Http\Request();
    
    // on GET
    $request->parseHeaders("GET /somefile?foo=bar&arr[]=one&arr[]=two HTTP/1.0");

    $this->assertEquals($request->getVar('foo'), 'bar');
    $this->assertEquals($request->getVar('arr'), array('one', 'two'));
    $this->assertEquals($request->getVars(), array(
      'foo' => 'bar',
      'arr' => array(
        'one', 'two'
      )
    ));

    // on POST
    $request->parseHeaders("POST /somefile?foo=bar&arr[]=one&arr[]=two HTTP/1.0");

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

  public function testCookieVars(){
    $request = new \Pwas\Http\Request();

    // GET
    $request->parseHeaders("GET / HTTP/1.0\r\nCookie: foo=bar; bin=beb");

    $this->assertEquals($request->cookieVar('foo'), 'bar');
    $this->assertEquals($request->cookieVar('bin'), 'beb');
    $this->assertEquals($request->cookieVars(), array(
      'foo' => 'bar', 
      'bin' => 'beb'
    ));

    // POST
    $request->parseHeaders("POST / HTTP/1.0\r\nCookie: bar=foo; beb=bin");

    // Fails. See https://github.com/TomNomNom/Pwas/issues/3
    $this->assertEquals($request->cookieVar('bar'), 'foo');
    $this->assertEquals($request->cookieVar('beb'), 'bin');
    $this->assertEquals($request->cookieVars(), array(
      'bar' => 'foo', 
      'beb' => 'bin'
    ));
  }
}
