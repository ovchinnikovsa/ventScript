<?php

namespace Module\UltraHightLanguage\Variables;

class Heat
{
    private float $power = 0;
    public readonly string $name;

    public function __construct()
    {
        $this->name = __CLASS__;
    }

    public function setPower(float $speed): void
    {
        $this->power = $speed;
    }
}
