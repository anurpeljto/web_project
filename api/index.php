<?php 

require '../vendor/autoload.php';
require 'Controller.php';

// Flight::route('/', function() {
    
// });


Flight::route('POST /add_task', function() {
    $data = Flight::request()->getBody();
    $jsonData = json_encode($data);
    $controller = new Controller;
    $controller->addTask($data);
});

Flight::route('POST /login', function() {
    $body = Flight::request()->getBody();
    $controller = new Controller;
    $res = $controller->login($body);
    echo $res;
});

Flight::route('POST /register', function() {
    $body = Flight::request()->getBody();
    $controller = new Controller;
    $res = $controller->register($body);
    echo $res;
});


Flight::route('GET /dashboard', function() {

});

Flight::start();