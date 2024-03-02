<?php

namespace Module\UltraHightLanguage\Variables;

class Heat
{
    private float $state = 0;
    public readonly string $name;

    public function __construct()
    {
        $this->name = __CLASS__;
    }

    public function setState(float $state): void
    {
        $this->state = $state;
    }
}
