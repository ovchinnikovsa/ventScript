<?php

namespace Module\Core\Globals;

use Module\Core\Globals\GlobalInterface;

class Post implements GlobalInterface
{
    public static function get(string $key): mixed
    {
        return $_POST[$key] ?? null;
    }

    public static function getAll(): array
    {
        return $_POST;
    }

    public static function getJson(): mixed
    {
        $_POST = file_get_contents('php://input');
        return $_POST;
    }

    public static function set(string $key, mixed $value): void
    {
        $_POST[$key] = $value;
    }

    public static function clear(string $key): void
    {
        unset($_POST[$key]);
    }
}
