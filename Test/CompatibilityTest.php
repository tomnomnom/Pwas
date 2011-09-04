<?php
namespace Test;

class CompatibilityTest extends \PHPUnit_Framework_TestCase {
  public function testSockets(){
    $this->assertTrue(
      is_callable('socket_create'), 
      "socket_create is not callable. PHP must be configured with --enable-sockets"
    ); 
  }

  public function testPcntl(){
    $this->assertTrue(
      is_callable('pcntl_fork'),
      "pcntl_fork is not callable. PHP must be configured with --enable-pcntl"
    ); 
  }
}
