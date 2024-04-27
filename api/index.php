<?php 

require '../vendor/autoload.php';
require 'Controller.php';

// Flight::route('/', function() {
    
// });

session_start();


Flight::route('POST /userDetails', function() {
    $controller = new Controller;
    $body = Flight::request()->getBody();
    $userDetails = $controller->getUserDetails($body);
    echo $userDetails;
});

Flight::route('GET /userDetails', function() {
    $controller = new Controller;
    $details = array(
        "user_id" => $_SESSION['user_id'],
        "first_name" => $_SESSION['first_name'],
        "last_name" => $_SESSION['last_name'],
        "email" => $_SESSION['email']
    );
    if(isset($_SESSION['user_details'])){
        echo json_encode($details);
    }else {
        echo 'Not logged in';
    }
});

Flight::route('GET /tasks', function() {
    $controller = new Controller;
    $user_id = $_SESSION["user_id"];
    $controller->getTasks($user_id);
});

Flight::route('GET /upcoming', function() {
    $controller = new Controller;
    $user_id = $_SESSION['user_id'];
    $controller->getUpcoming($user_id);
});


Flight::route('POST /add_task', function() {
    $data = Flight::request()->getBody();
    $jsonData = json_encode($data);
    $user_id = $_SESSION['user_id'];
    $controller = new Controller;
    $controller->addTask($data, $user_id);
});

Flight::route('POST /login', function() {
    $body = Flight::request()->getBody();
    $controller = new Controller;
    $res = $controller->login($body);
    if($res) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "Wrong password"]);
    }
});

Flight::route('POST /register', function() {
    $body = Flight::request()->getBody();
    $controller = new Controller;
    $res = $controller->register($body);
    echo $res;
});

Flight::route('GET /logout', function() {
    session_destroy();
});

Flight::route('POST /changeDetails', function() {
    $controller = new Controller;
    $data = Flight::request()->getBody();
    $controller->changeDetails($data);
});

Flight::route('POST /mark-done', function() {
    $controller = new Controller;
    $user_id = $_SESSION['user_id'];
    $body = Flight::request()->getBody();
    $body = json_decode($body, true);
    $task_id = $body['task_id'];
    $controller->markDone($user_id, $task_id);
});


Flight::route('*', function() {
    Flight::halt(404, "Page not found");
});


Flight::start();