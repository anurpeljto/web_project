<?php

require __DIR__ . '/../../services/TaskService.php';

$taskService = new TaskService();

/**
 * @OA\Get(
 *     path="/tasks",
 *     summary="Get all tasks",
 *     tags={"Tasks"},
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *     )
 * )
 */
Flight::route('GET /tasks', function() use ($taskService) {
    $user_id = $_SESSION["user_id"];
    $tasks = $taskService->getTasks($user_id);
    echo json_encode(['tasks'=>$tasks]);
});

/**
 * @OA\Get(
 *     path="/upcoming",
 *     summary="Get all upcoming tasks",
 *     tags={"upcoming"},
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *     )
 * )
 */

Flight::route('GET /upcoming', function() use ($taskService) {
    $user_id = $_SESSION['user_id'];
    $tasks = $taskService->getUpcoming($user_id);
    echo json_encode(['tasks'=>$tasks]);
});

/**
 * @OA\Post(
 *     path="/add_task",
 *     security={{"ApiKeyAuth": {}}},
 *     description="Add task",
 *     tags={"insert"},
 *     @OA\RequestBody(
 *         description="Add new task",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="title",
 *                     type="string",
 *                     example="Example title",
 *                     description="Task title"
 *                 ),
 *                 @OA\Property(
 *                     property="due",
 *                     type="date",
 *                     example="20-09-24",
 *                     description="Due date"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Task has been added"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error"
 *     )
 * )
 */


Flight::route('POST /add_task', function() use ($taskService) {
    $data = Flight::request()->getBody();
    $user_id = $_SESSION['user_id'];
    $result = $taskService->addTask($data, $user_id);
    echo json_encode(["success" => $result]);
});

/** 
 * @OA\Post(
 *  path="/mark-done",
 *  security={{"ApiKeyAuth": {}}},
 *  description="Mark task as done",
 *  tags={"done"},
 *  @OA\RequestBody(
 *      description="Mark task done",
 *      required=true,
 *      @OA\MediaType(
 *          mediaType="application/json",
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="user_id",
 *                  type="integer",
 *                  example="1",
 *                  description="User id"),
 *              @OA\Property(
 *                  property="task_id",
 *                  type="integer",
 *                  example="14",
 *                  description="Task id")
 * ))),
 *  @OA\Response(
 *      response=200,
 *      description="Successfully marked task done and removed from database")
 * ),
 * @OA\Response(
 *      response=500,
 *      description="Error")
 */

Flight::route('POST /mark-done', function() use ($taskService) {
    $user_id = $_SESSION['user_id'];
    $body = Flight::request()->getBody();
    $body = json_decode($body, true);
    $task_id = $body['task_id'];
    $result = $taskService->markDone($user_id, $task_id);
    echo json_encode(["success"=> $result]);
});

// Flight::start();