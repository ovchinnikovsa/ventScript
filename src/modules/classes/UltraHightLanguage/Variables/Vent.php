<?php

namespace Module\UltraHightLanguage\Variables;

class Vent
{
    private float $speed = 0;
    public readonly string $name;

    public function __construct()
    {
        $this->name = __CLASS__;
    }

    public function setSpeed(float $speed): void
    {
        $this->speed = $speed;
    }

    // TODO mb not need
    public function stop(): void
    {
        $this->speed = 0;
    }

    public function setMaxSpeed(): void
    {
        $this->speed = 100;
    }
}
