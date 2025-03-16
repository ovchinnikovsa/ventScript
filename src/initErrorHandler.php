<?php

error_reporting(-1);
ini_set('log_errors', '1');
ini_set('error_log', __DIR__ . '/logs/application.log');

$log_dir = __DIR__ . '/logs';
$log_file = $log_dir . '/application.log';

function rotate_log($file, $max_size = 10485760) { // 10MB = 10*1024*1024
    if (file_exists($file) && filesize($file) >= $max_size) {
        $backup_file = $file . '.' . date('Y-m-d_His');
        rename($file, $backup_file);
    }
}

// Создание директории и ротация перед запуском
if (!is_dir($log_dir)) {
    mkdir($log_dir, 0777, true);
}
rotate_log($log_file);
ini_set('error_log', $log_file);

set_exception_handler(function (Throwable $exception): void {
    error_log(
        sprintf(
            'Uncaught %s: %s in %s on line %d',
            get_class($exception),
            $exception->getMessage(),
            $exception->getFile(),
            $exception->getLine()
        )
    );
    http_response_code(500);
    exit('An error occurred. Please check the logs for details.');
});

set_error_handler(function (int $errno, string $errstr, string $errfile, int $errline): bool {
    error_log(
        sprintf(
            '[%d] %s in %s on line %d',
            $errno,
            $errstr,
            $errfile,
            $errline
        )
    );
    return false;
});

register_shutdown_function(function (): void {
    $error = error_get_last();
    if ($error && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        error_log(
            sprintf(
                'Fatal Error: [%d] %s in %s on line %d',
                $error['type'],
                $error['message'],
                $error['file'],
                $error['line']
            )
        );
    }
});

