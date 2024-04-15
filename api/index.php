<?php 

require '../vendor/autoload.php';
require 'Controller.php';

Flight::route('/', function() {
    echo 'Home';
});

Flight::route('POST /add_task', function() {
    $data = Flight::request()->getBody();
    $jsonData = json_encode($data);
    $controller = new Controller;
    $controller->addTask($data);
});

Flight::start();