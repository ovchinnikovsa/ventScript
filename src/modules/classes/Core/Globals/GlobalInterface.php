<?php

namespace Module\Core\Globals;

interface GlobalInterface
{
    public static function get(string $key);
    public static function set(string $key, mixed $value);
    public static function clear(string $key);
}
