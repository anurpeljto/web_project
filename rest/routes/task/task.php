<?php

require __DIR__ . '/../../services/TaskService.php';


$taskService = new TaskService();

Flight::route('GET /tasks', function() use ($taskService) {
    $user_id = $_SESSION["user_id"];
    $tasks = $taskService->getTasks($user_id);
    echo json_encode(['tasks'=>$tasks]);
});

Flight::route('GET /upcoming', function() use ($taskService) {
    $user_id = $_SESSION['user_id'];
    $tasks = $taskService->getUpcoming($user_id);
    echo json_encode(['tasks'=>$tasks]);
});

Flight::route('POST /add_task', function() use ($taskService) {
    $data = Flight::request()->getBody();
    $user_id = $_SESSION['user_id'];
    $result = $taskService->addTask($data, $user_id);
    echo json_encode(["success" => $result]);
});

Flight::route('POST /mark-done', function() use ($taskService) {
    $user_id = $_SESSION['user_id'];
    $body = Flight::request()->getBody();
    $body = json_decode($body, true);
    $task_id = $body['task_id'];
    $result = $taskService->markDone($user_id, $task_id);
    echo json_encode(["success"=> $result]);
});

// Flight::start();