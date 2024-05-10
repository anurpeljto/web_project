<?php

require __DIR__ . '/../../services/UserService.php';



$userService = new UserService();

Flight::route('POST /userDetails', function() use ($userService) {
    $body = Flight::request()->getBody();
    $userDetails = $userService->getUserDetails($body);
    echo json_encode($userDetails);
});

Flight::route('GET /userDetails', function() {
    $details = array(
        "user_id" => $_SESSION['user_id'],
        "first_name" => $_SESSION['first_name'],
        "last_name" => $_SESSION['last_name'],
        "email" => $_SESSION['email']
    );
    if(isset($_SESSION['user_details'])){
        echo json_encode($details);
    } else {
        echo 'Not logged in';
    }
});

Flight::route('POST /login', function() use ($userService) {
    $body = Flight::request()->getBody();
    $res = $userService->login($body);
    if($res) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "Wrong password"]);
    }
});

Flight::route('POST /register', function() use ($userService) {
    $body = Flight::request()->getBody();
    $res = $userService->register($body);
    echo json_encode(["success" => $res]);
});

Flight::route('GET /logout', function() {
    session_destroy();
});

Flight::route('POST /changeDetails', function() use ($userService) {
    $data = Flight::request()->getBody();
    $result = $userService->changeDetails($data);
    echo json_encode(["success" => $result]);
});


