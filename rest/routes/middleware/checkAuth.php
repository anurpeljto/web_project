<?php
require_once __DIR__ . '/../../dao/config.php';
require_once __DIR__ . '/../../../vndr/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthenticationMiddleware{
    public function before(){
        $token = Flight::request()->getHeader('Token');
        if(!$token){
            Flight::halt(401, 'Unauthorized');
            
        }
        $decoded = JWT::decode($token, new Key(JWT_SECRET, 'HS256'));
    }
}




