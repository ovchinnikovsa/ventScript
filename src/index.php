<?php

declare(strict_types=1);
session_start();

require_once __DIR__ . '/initErrorHandler.php';
require_once __DIR__ . '/vendor/autoload.php';

use Module\Core\View;
use Module\Core\Handler;

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];
try {
    $undefined->method(); // Генерируем ошибку для теста

    if ($requestMethod === 'GET' && $requestUri === '/') {
        View::page('index');
    } elseif ($requestMethod === 'POST' && ($requestUri === '/compile' || $requestUri === '/exec')) {
        $handler = new Handler($requestUri);
    } else {
        http_response_code(404);
        header('Content-Type: application/json');
        echo 'Страница не найдена';
    }
} catch (Throwable $e) {
    error_log("Caught Exception: " . $e->getMessage());
    exit("Caught Exception: " . $e->getMessage());
}
