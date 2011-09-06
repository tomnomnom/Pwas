# Pwas

A small and naive web application server written in PHP. Do *not* use this in production; or on 
any public facing server - it is intended to be used for educational purposes only.


## Requirements
* PHP 5.3.\* 
  * pcntl
  * sockets
* PHPUnit (if you care to run the tests)


## Examples

### Running
You can run the examples like so:

    php Examples/Hello.php

### [Hello.php](https://github.com/TomNomNom/Pwas/blob/master/Examples/Hello.php)
The most basic of examples.

### [Json.php](https://github.com/TomNomNom/Pwas/blob/master/Examples/Json.php)
Examples of setting a header, and reacting to the requested path.


## Tests
Simply running "phpunit" in the root directory should be all you need to do.

There is a very basic [compatibility test](https://github.com/TomNomNom/Pwas/blob/master/Test/CompatibilityTest.php) file. 
Running it should give you a good idea of whether or not you will be able to run the server.

