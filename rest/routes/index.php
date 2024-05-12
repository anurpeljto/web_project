<?php
session_start();
require '../../vendor/autoload.php';
use OpenApi\Annotations as OA;


// require __DIR__ . '/../../services/TaskService.php';
// require __DIR__ . '/../../services/UserService.php';

require __DIR__ . '/user/user.php';
require __DIR__ . '/task/task.php';

// Flight::route('GET /test', function() {
//     echo "Test route";
// });


Flight::route('*', function() {
    Flight::halt(404, "Pagasdae not found");
});

Flight::start();
