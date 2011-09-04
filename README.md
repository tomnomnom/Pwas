Pwas
====

A small and naive web application server written in PHP. Do *not* use this in production; or on any public facing server - 
that would be a very bad idea. I wrote this a couple of years ago to improve my understanding of HTTP and I've decided to 
work on it some more for fun.

Requirements
------------
* PHP 5.3.\* 
  * pcntl
  * sockets
* PHPUnit (if you want to run the tests)

Examples
--------
You can run Examples/Hello.php like so:

    php Examples/Hello.php

Notes
-----
This whole thing is in a state of flux; I'm refactoring and changing things like mad.

The server can only handle GET and POST requests at the moment. 



