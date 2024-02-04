<?php

namespace Module\Core\Globals;

use Module\Core\Globals\GlobalInterface;

class Session implements GlobalInterface
{
    public static function get(string $key): mixed
    {
        return $_SESSION[$key] ?? null;
    }

    public static function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function clear(string $key): void
    {
        unset($_SESSION[$key]);
    }
}
