<?php

namespace Module\UltraHightLanguage\Variables;

class Filter extends UltraVariables
{
    public function __construct(string $object_name)
    {
        $this->objectName = $object_name;
        $this->state = false;
        $this->stateType = 'bool';
    }

}
