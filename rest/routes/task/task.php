<?php

require __DIR__ . '/../../services/TaskService.php';
use Firebase\JWT\JWT;


$taskService = new TaskService();

/**
 * @OA\Get(
 *     path="/tasks",
 *     summary="Get all tasks",
 *     tags={"Tasks"},
 *     security={{"ApiAuthKey": {}}},
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *     )
 * )
 */
Flight::route('GET /tasks', function() use ($taskService) {
    $tasks = $taskService->getTasks();
    Flight::response($tasks);
});

/**
 * @OA\Get(
 *     path="/upcoming",
 *     summary="Get all upcoming tasks",
 *     tags={"Tasks"},
 *     security={{"ApiAuthKey": {}}},
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *     )
 * )
 */

Flight::route('GET /upcoming', function() use ($taskService) {
    $tasks = $taskService->getUpcoming();
    Flight::response($tasks);
});

/**
 * @OA\Post(
 *     path="/add_task",
 *     security={{"ApiKeyAuth": {}}},
 *     description="Add task",
 *     tags={"Tasks"},
 *     security={{"ApiAuthKey": {}}},
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
    $result = $taskService->addTask($data, $user_id);
    if(!$result){
        Flight::halt(500, 'Failed to add task');
    } else {
        Flight::response()->status(200);
    }
});

/** 
 * @OA\Post(
 *  path="/mark-done",
 *  security={{"ApiKeyAuth": {}}},
 *  description="Mark task as done",
 *  tags={"Tasks"},
 *  security={{"ApiAuthKey": {}}},
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
    $body = Flight::request()->getBody();
    $body = json_decode($body, true);
    $result = $taskService->markDone($task_id);
    if(!$result){
        Flight::halt(500, 'Error');
    }
    else {
        Flight::response()->status(200);
    }
});

// Flight::start();