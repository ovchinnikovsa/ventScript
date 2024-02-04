<?php

namespace Module\UltraHightLanguage\Variables;

class Sensor
{
    protected float $state = 0;
    public readonly string $name;
    private bool $is_external = false;

    public function __construct()
    {
        $this->name = __CLASS__;
    }

    function is_external(): bool {
        return $this->is_external;
    }
}
