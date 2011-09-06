<?php
namespace Test\Unit\Pwas\Http;

class ResponseTest extends \PHPUnit_Framework_TestCase {
  protected function getMockServer(){
    // The host and port do not actually matter
    return new \Test\Mock\Pwas\Http\Server('127.0.0.1', 9090);
  }

  public function testDefaults(){
    $server = $this->getMockServer();
    $response = new \Pwas\Http\Response($server);

    $response->write('hello');

    $this->assertContains(
      '200 OK', $server->getWrittenData(), 
      "[200 OK] not found in response"
    );

    $this->assertContains(
      'Content-Type: text/html', $server->getWrittenData(), 
      "[Content-Type: text/html] not found in response"
    );
  }

  public function testSetContentType(){
    $server = $this->getMockServer();
    $response = new \Pwas\Http\Response($server);
    $response->setHeader('Content-Type', 'application/javascript');
    $response->write('hello');

    $this->assertContains(
      'Content-Type: application/javascript', $server->getWrittenData(),
      "Could not override default Content-Type"
    );
  }

  public function testSetStatus(){
    $server = $this->getMockServer();
    $response = new \Pwas\Http\Response($server);
    $response->setStatus(404);
    $response->write('hello');

    $this->assertContains(
      '404 Not Found', $server->getWrittenData(),
      "Could not set HTTP status"
    );
  }

  public function testSetHeaders(){
    $server = $this->getMockServer();
    $response = new \Pwas\Http\Response($server);
    $response->setHeaders(array(
      'Content-Type' => 'application/javascript',
      'Location'     => 'http://example.com'
    ));
    $response->write('hello');

    $this->assertContains(
      'Content-Type: application/javascript', $server->getWrittenData(),
      "Failed to set first of two headers"
    );

    $this->assertContains(
      'Location: http://example.com', $server->getWrittenData(),
      "Failed to set second of two headers"
    );
  }


}
