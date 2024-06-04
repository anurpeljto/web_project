<?php

require __DIR__ . '/../../services/UserService.php';
require_once __DIR__ . '/../middleware/checkAuth.php';


$userService = new UserService();
$authClass = new AuthenticationMiddleware();

/**
 * @OA\GET(
 *     path="/userDetails",
 *     description="Get user details",
 *     tags={"User"},
 *     security={{"ApiAuthKey": {}}},
 *     @OA\Response(
 *         response=200,
 *         description="User details retrieved successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="user_id",
 *                 type="integer",
 *                 example="1",
 *                 description="User ID"
 *             ),
 *             @OA\Property(
 *                 property="first_name",
 *                 type="string",
 *                 example="John",
 *                 description="User's first name"
 *             ),
 *             @OA\Property(
 *                 property="last_name",
 *                 type="string",
 *                 example="Doe",
 *                 description="User's last name"
 *             ),
 *             @OA\Property(
 *                 property="email",
 *                 type="string",
 *                 example="john@example.com",
 *                 description="User's email address"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="User not found"
 *     )
 * )
 */

Flight::route('POST /userDetails', function() use ($userService) {
    $body = Flight::request()->getBody();
    $body_dec = json_decode($body, true);
    $userDetails = $userService->getUserDetails();
    echo json_encode($userDetails);
});



Flight::route('GET /userDetails', function() use ($userService) {
    $userDetails = $userService->getUserDetails();
    if($userDetails){
        echo json_encode($userDetails);
    } else {
        echo 'Not logged in';
    }
})->addMiddleware($authClass);

/**
 * @OA\Post(
 *     path="/login",
 *     description="User login",
 *     tags={"User"},
 *     @OA\RequestBody(
 *         description="User credentials",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="email",
 *                     type="string",
 *                     example="anurpeljto@gmail.com",
 *                     description="User's email address"
 *                 ),
 *                 @OA\Property(
 *                     property="password",
 *                     type="string",
 *                     example="anurpeljto",
 *                     description="User's password"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful login",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="success",
 *                 type="boolean",
 *                 example=true,
 *                 description="Indicates whether login was successful"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="success",
 *                 type="boolean",
 *                 example=false,
 *                 description="Indicates unsuccessful login attempt"
 *             ),
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Wrong password",
 *                 description="Reason for unsuccessful login"
 *             )
 *         )
 *     )
 * )
 */

Flight::route('POST /login', function() use ($userService) {
    $body = Flight::request()->getBody();
    $token = $userService->login($body);
    if($token) {
        Flight::json(["success" => true, "token" => $token]);
    } else {
        Flight::halt(401, 'Failed to log in');
    }
});

/**
 * @OA\Post(
 *     path="/register",
 *     description="User registration",
 *     tags={"User"},
 *     @OA\RequestBody(
 *         description="User registration details",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="email",
 *                     type="string",
 *                     example="newtest4swaggerr@example.com",
 *                     description="User's email address"
 *                 ),
 *                 @OA\Property(
 *                     property="password",
 *                     type="string",
 *                     example="password123",
 *                     description="User's password"
 *                 ),
 *                 @OA\Property(
 *                     property="first_name",
 *                     type="string",
 *                     example="John",
 *                     description="User's first name"
 *                 ),
 *                 @OA\Property(
 *                     property="last_name",
 *                     type="string",
 *                     example="Doe",
 *                     description="User's last name"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful registration",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="success",
 *                 type="boolean",
 *                 example=true,
 *                 description="Indicates whether registration was successful"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Bad request",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="success",
 *                 type="boolean",
 *                 example=false,
 *                 description="Indicates unsuccessful registration attempt"
 *             ),
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Email already exists",
 *                 description="Reason for unsuccessful registration"
 *             )
 *         )
 *     )
 * )
 */

Flight::route('POST /register', function() use ($userService) {
    $body = Flight::request()->getBody();
    $res = $userService->register($body);
    echo json_encode(["success" => $res]);
});

/**
 * @OA\Get(
 *     path="/logout",
 *     description="Logout user",
 *     tags={"User"},
 *     security={{"ApiAuthKey": {}}},
 *     @OA\Response(
 *         response=200,
 *         description="Logout successful"
 *     )
 * )
 */

Flight::route('GET /logout', function() {
    $token = Flight::request()->getHeader('Token');
    if(!$token){
        Flight::response(404, 'User not logged in');
    }
    $token = null;
    Flight::response(200, 'User logged out');
})->addMiddleware($authClass);

/**
 * @OA\Post(
 *     path="/changeDetails",
 *     description="Change user details",
 *     tags={"User"},
 *     security={{"ApiAuthKey": {}}},
 *     @OA\RequestBody(
 *         description="New user details",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="first_name",
 *                     type="string",
 *                     example="John",
 *                     description="User's new first name"
 *                 ),
 *                 @OA\Property(
 *                     property="last_name",
 *                     type="string",
 *                     example="Doe",
 *                     description="User's new last name"
 *                 ),
 *                 @OA\Property(
 *                     property="phone_number",
 *                     type="string",
 *                     example="123456789",
 *                     description="User's new phone number"
 *                 ),
 *                 @OA\Property(
 *                     property="address",
 *                     type="string",
 *                     example="123 Main St",
 *                     description="User's new address"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Details changed successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="success",
 *                 type="boolean",
 *                 example=true,
 *                 description="Indicates whether details were changed successfully"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="success",
 *                 type="boolean",
 *                 example=false,
 *                 description="Indicates unsuccessful attempt to change details"
 *             ),
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Authentication required",
 *                 description="Reason for unsuccessful attempt"
 *             )
 *         )
 *     )
 * )
 */





Flight::route('POST /changeDetails', function() use ($userService) {
    $data = Flight::request()->getBody();
    $result = $userService->changeDetails($data);
    echo json_encode(["success" => $result]);
})->addMiddleware($authClass);

// eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjozNn0.bshGK3WYOLKL1gucju_Ap1aTmemiiXlULU0oB9ggbTY
