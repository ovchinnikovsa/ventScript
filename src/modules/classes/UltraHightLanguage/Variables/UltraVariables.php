<?php

namespace Module\UltraHightLanguage\Variables;

use Module\Core\CommonMessage;

abstract class UltraVariables // TODO: create a abstract fabric to create prototype variables from users
{
    use CommonMessage;

    protected string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }
}
