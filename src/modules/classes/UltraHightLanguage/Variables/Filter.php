<?php

namespace Module\UltraHightLanguage\Variables;

class Filter
{
    private bool $state = true;
    public readonly string $name;
    protected bool $is_external = true;

    public function __construct() {
        $this->name = __CLASS__;
    }

    public function setState(bool $value): void {
        $this->state = $value;
    }
}
