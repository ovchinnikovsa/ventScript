<?php

namespace Module\UltraHightLanguage\Compiler\Validator;

interface Validator
{
    /**
     * @return void
     * @throws InvalidArgumentException
     */
    public function validate(): void;
}
