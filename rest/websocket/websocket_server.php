<?php
require_once __DIR__ . '/../../vndr/autoload.php';
use Ratchet\Server\IoServer;
use \Chat;

$server = IoServer::factory(
    new Chat(),
    8080
);

$server->run();