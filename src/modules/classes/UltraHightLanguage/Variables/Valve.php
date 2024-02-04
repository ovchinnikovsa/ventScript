<?php

namespace Module\UltraHightLanguage\Variables;

class Valve
{
    private bool $state = true;
    public readonly string $name;

    public function __construct() {
        $this->name = __CLASS__;
    }

    public function open(): void {
        $this->state = true;
    }

    public function close(): void {
        $this->state = false;
    }
}
