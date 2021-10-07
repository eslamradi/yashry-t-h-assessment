#!/usr/bin/env php
<?php 

require __DIR__ . '/vendor/autoload.php';

// $command = new Comm

if (php_sapi_name() !== 'cli') {
    exit;
}

$availableActions = include('config/actions.php');

foreach ($availableActions as $action => $callable) {
    if($argv[1] == $action){
        print 'found';
        $c = new $callable;
        $c->run();
    } else {
        print 'not';
    }
}