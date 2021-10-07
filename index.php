#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

use Yashry\Cart\ActionInvoker;
use Yashry\Cart\Dispatchers\ApiDispatcher;
use \Yashry\Cart\Parsers\CommandLineParser;

// $command = new Comm
$command = '';
$parameters = '';

if (php_sapi_name() == 'cli') {
    $parser = new CommandLineParser;
    list($command, $parameters) = $parser->parse($argc, $argv);
    print $command;
    print_r($parameters);
}
else {
    $parser = new ApiRequestParser;
    // list($command, $parameters) = $parser->parse();
}

// $actionInvoker = new ActionInvoker;
// $response = $actionInvoker->invoke($command, $parameters);

// if (php_sapi_name() == 'cli') {
//     $dispatcher = new CommandLineDispatcher;
//     $dispatcher->dispatch($response);
// } else {
//     $dispatcher = new ApiDispatcher;
//     $dispatcher->dispatch($response);
// }

