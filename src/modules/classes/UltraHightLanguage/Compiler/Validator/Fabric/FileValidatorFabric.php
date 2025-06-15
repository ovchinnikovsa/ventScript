<?php

namespace Module\UltraHightLanguage\Compiler\Validator\Fabric;

use Module\UltraHightLanguage\Compiler\Validator\Validator;
use Module\UltraHightLanguage\Compiler\Validator\FileValidator;

class FileValidatorFabric implements ValidatorFabric
{
    public function create(): Validator
    {
        return new FileValidator();
    }
}
