<?php

namespace Module\UltraHightLanguage\Variables;

use Module\Core\CommonMessage;

abstract class UltraVariables
{
    use CommonMessage;

    private string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }
}
