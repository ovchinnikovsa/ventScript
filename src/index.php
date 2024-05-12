<?php

declare(strict_types=1);
session_start();

require_once __DIR__ . '/vendor/autoload.php';

use Module\Core\View;
use Module\Core\Handler;


$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];

if ($requestMethod === 'GET' && $requestUri === '/') {
    View::page('index');
} elseif ($requestMethod === 'POST' && ($requestUri === '/compile' || $requestUri === '/exec')) {
    $handler = new Handler($requestUri);
} else {
    http_response_code(404);
    header('Content-Type: application/json');
    echo 'Страница не найдена';
}
