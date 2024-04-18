<?php 

require '../vendor/autoload.php';
require 'Controller.php';
require 'checkLoggedIn.php';

// Flight::route('/', function() {
    
// });


Flight::before('start', function() {
    checkLoggedIn();
});

Flight::route('GET /userDetails', function() {
    session_start();
    if(isset($_SESSION['user_id'])){
        $userID = $_SESSION['user_id'];
        $controller = new Controller;
        $userDetails = $controller->getUserDetails($userID);
        if($userDetails){
            echo json_encode($userDetails);
        } else {
            Flight::halt(500, "Failed to fetch user details");
        }
    } else {
        Flight::halt(401, 'Not logged in');
    }
});


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


Flight::route('*', function() {
    Flight::halt(404, "Page not found");
});


Flight::start();