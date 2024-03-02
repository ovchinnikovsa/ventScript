<?php

namespace Module\UltraHightLanguage\Variables;

class Filter extends UltraVariables
{
    public function __construct(string $object_name): void
    {
        $this->objectName = $object_name;
        $this->state = false;
        $this->stateType = 'bool';
    }

}
