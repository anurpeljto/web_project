<?php

require __DIR__ . '/../../../vendor/autoload.php';
define ('BASE_URL', 'http:localhost:8888/web_project/rest/routes/');


$openapi = \OpenApi\Generator::scan(['../../../rest/routes/', './']);
// $openapi->openapi = "3.0.0";
header('Content-Type: application/x-yaml');
echo $openapi->toYaml();
?>
