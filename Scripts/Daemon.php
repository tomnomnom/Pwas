#!/usr/local/bin/php
<?php
$mode = $argv[1];

switch ($mode){
  case 'start':
    @shell_exec('./App.php &> /dev/null &');
    break;
  case 'stop':
    @shell_exec('kill -9 `ps ax | grep App.php | grep -v grep | awk \'{print $1}\'`');
    break;
  case 'restart':
    @shell_exec("{$argv[0]} stop");
    @shell_exec("{$argv[0]} start");
    break;
  default: 
    echo "Usage: {$argv[0]} <mode>\n"; 
    echo "Modes: \n  start\n  stop\n  restart\n";
    break;
}
