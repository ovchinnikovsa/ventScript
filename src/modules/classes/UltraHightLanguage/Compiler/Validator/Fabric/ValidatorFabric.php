<?php

namespace Module\UltraHightLanguage\Compiler\Validator\Fabric;

use Module\UltraHightLanguage\Compiler\Validator\Validator;

interface ValidatorFabric
{
    public function create(): Validator;
}
